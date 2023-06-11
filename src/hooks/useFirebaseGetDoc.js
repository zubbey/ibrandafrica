import { collection, doc, getDoc, getDocs, query, where } from "firebase/firestore";
import { useEffect, useState } from "react";
import { db } from "../utils/firebase";

/**
 *
 * @param {String} path
 * @param {String} value
 * @param {String} field
 * @returns
 */

function useFirebaseGetDoc(path, value, field) {
  const [isLoading, setIsLoading] = useState(false);
  const [error, setError] = useState(null);
  const [data, setData] = useState(null);

  useEffect(() => {
    if (path) {
      fetchData();
    }
  }, [path, value]);

  const fetchData = async () => {
    setIsLoading(true);
    try {
      let docRef;
      if (field === "id") {
        docRef = doc(db, path, value);

        const docSnap = await getDoc(docRef);
        if (docSnap.exists()) {
          setData({
            ...docSnap.data(),
            id: docSnap.id,
            createdAt: docSnap.data().createdAt?.toDate().toISOString(),
          });
        }
        setIsLoading(false);
      } else {
        docRef = collection(db, path);
        const collectionRef = query(docRef, where(field, "==", value));
        const docsSnap = await getDocs(collectionRef);

        docsSnap.docs.forEach((doc) => {
          setData({
            ...doc.data(),
            id: doc.id,
            createdAt: doc.data().createdAt?.toDate().toISOString(),
          });
        });
        setIsLoading(false);
      }
    } catch (err) {
      setIsLoading(false);
      setData(null);
      setError(err);
    }
  };

  return {
    isLoading,
    data,
    error,
  };
}

export default useFirebaseGetDoc;
