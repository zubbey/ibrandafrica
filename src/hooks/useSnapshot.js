import { useEffect, useState } from "react";
import { collection, onSnapshot } from "firebase/firestore";
import { db } from "../utils/firebase";

function useSnapshot(path) {
  const [isLoading, setIsLoading] = useState(false);
  const [data, setData] = useState(null);
  const arrays = ["gallery", "services"];

  let collectionPath;
  if (path.includes("/")) {
    collectionPath = path?.split("/");
  } else {
    collectionPath = [path];
  }

  useEffect(() => {
    setIsLoading(true);
    const unsubscribe = onSnapshot(collection(db, ...collectionPath), (snapshot) => {
      let content = {};
      const docs = [];
      if (!snapshot.empty) {
        snapshot.forEach((doc) => {
          if (doc.exists()) {
            const docData = doc.data();
            if (path === "content") {
              content = {
                ...content,
                [doc.id]: arrays.includes(doc.id) ? Object.values(docData) : docData,
              };
            } else {
              docs.push({
                ...docData,
                id: doc.id,
                createdAt: docData?.createdAt ? docData.createdAt?.toDate().toISOString() : new Date().toISOString(),
              });
            }
          }
        });
        if (path === "content") {
          setData(content);
        } else {
          setData(docs);
        }
        setIsLoading(false);
      }
    });

    return unsubscribe;
  }, []);

  return {
    data,
    isLoading,
  };
}

export default useSnapshot;
