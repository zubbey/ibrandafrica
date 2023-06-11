import { doc, getDoc } from "firebase/firestore";
import { useEffect } from "react";
import { useDispatch } from "react-redux";
import { setAuth, setProfile } from "../store/reducers/auth";
import { setLoading } from "../store/reducers/lifecircle";
import { auth, db } from "../utils/firebase";

function useAuth() {
  const dispatch = useDispatch();

  useEffect(() => {
    const unsubscribe = auth.onAuthStateChanged((user) => {
      if (user) {
        // update auth
        console.log("auth-changed", user.uid);
        login(user);
      } else {
        // signed out auth
        logout();
      }
    });

    // Just return the unsubscribe function.  React will call it when it's
    // no longer needed.
    return unsubscribe;
  }, []);

  async function login(user) {
    try {
      let userRef = doc(db, "admins", user.uid);
      dispatch(setLoading(true));

      const userDoc = await getDoc(userRef);
      // CHECK USER EXISTENCE
      // console.log("claims", claims);
      if (userDoc.exists()) {
        const data = userDoc.data();

        // console.log("data", data);
        const payload = {
          ...data,
          displayName: user.displayName,
          emailVerified: user.emailVerified,
          photoUrl: user.photoURL,
          uid: user.uid,
          createdAt: new Date(data?.createdAt).toISOString(),
          updatedAt: new Date(data?.updatedAt).toISOString(),
        };
        dispatch(setProfile(payload));
        dispatch(setAuth(true));
        dispatch(setLoading(false));
      }
    } catch (error) {
      console.log("auth-error", error);
    }
  }

  async function logout() {
    dispatch(setLoading(true));
    await auth.signOut();
    dispatch(setAuth(false));
    dispatch(setProfile(null));
    dispatch(setLoading(false));
  }
}

export default useAuth;
