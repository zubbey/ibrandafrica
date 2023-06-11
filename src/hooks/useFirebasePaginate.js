import { useEffect, useRef, useState } from "react";
import { collection, getDocs, limit, orderBy, query, startAfter, where, startAt, endAt } from "firebase/firestore";
import { db } from "../utils/firebase";
import sanitizeText from "../utils/sanitizeText";

/**
 *
 * @param {String} path
 * @param {String} 'public'
 * @param {Number} perPage
 * @returns {{
 * fetchRecords: Function
 * isLoading: Boolean,
 * results: Array,
 * setResults: Function,
 * onPaginate: Function,
 * onSearch: Function,
 * snap: any,
 * error: any,
 * }}
 */

const data = (doc) => ({
  ...doc.data(),
  id: doc.id,
  createdAt: doc.data().createdAt?.toDate().toISOString(),
});

const useFirebasePaginate = (path, perPage) => {
  const [isLoading, setIsLoading] = useState(false);
  const [search, setSearch] = useState({
    keyword: "",
    field: "",
  });
  const [results, setResults] = useState([]);
  const [snap, setSnap] = useState(null);
  const [error, setError] = useState(null);
  const collectionRef = useRef(null);
  const pathRef = collection(db, path);
  const isEmpty = snap?.size === 0;
  const [visible, setVisible] = useState(snap?.docs[snap?.docs?.length - 1]);

  useEffect(() => {
    collectionRef.current = query(pathRef, where("public", "==", true), orderBy("createdAt", "desc"), limit(perPage));
    setSearch({
      keyword: "",
      field: "",
    });
    fetchRecords(null);
  }, []);

  const fetchRecords = async (type) => {
    try {
      setIsLoading(true);
      let docs = [];
      if (collectionRef.current) {
        const docsSnap = await getDocs(collectionRef.current);
        if (type === "paginate" && !docsSnap.docs.length) {
          // console.log('type', type);
          console.log("docs", docsSnap.docs.length);
          setVisible(null);
        } else {
          docsSnap.docs.forEach((doc) => {
            docs.push(data(doc, path));
          });
          setSnap(docsSnap);
          setVisible(docsSnap?.docs[snap?.docs?.length - 1]);
          setResults(docs);
        }
        setIsLoading(false);
      }
    } catch (err) {
      setIsLoading(false);
      setResults([]);
      setError(err);
    }
  };

  const onPaginate = () => {
    // console.log('search', search);
    if (visible && !isEmpty) {
      if (search.keyword) {
        collectionRef.current = query(
          pathRef,
          orderBy(search.field),
          where("public", "==", true),
          startAt(search.keyword),
          endAt(`${search.keyword}\uf8ff`),
          startAfter(visible),
          limit(perPage),
        );
      } else {
        collectionRef.current = query(
          pathRef,
          where("public", "==", true),
          orderBy("createdAt", "desc"),
          startAfter(visible),
          limit(perPage),
        );
      }
    } else {
      setSearch({
        keyword: "",
        field: "",
      });
    }
    fetchRecords("paginate");
  };

  const onSearch = async (keyword, field) => {
    if (keyword) {
      const searchQuery = sanitizeText(keyword);
      // console.log('query', searchQuery);

      collectionRef.current = query(
        pathRef,
        orderBy(field),
        where("public", "==", true),
        where(field, ">=", searchQuery),
        where(field, "<=", `${searchQuery}\uf8ff`),
        limit(perPage),
      );

      setSearch({
        keyword: searchQuery,
        field,
      });
      fetchRecords(null);
    }
  };

  return {
    onSearch,
    onPaginate,
    isLoading,
    results,
    setResults,
    snap,
    error,
    hasNext: visible,
  };
};

export default useFirebasePaginate;
