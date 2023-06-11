import { useEffect, useState } from "react";
import { AnimatePresence } from "framer-motion";
import { BrowserRouter } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import Aos from "aos";

// COMPONENT
import Router from "./routes";
import ThemeProvider from "./theme";
import { useAuth, useSnapshot } from "./hooks";
import { setLoading } from "./store/reducers/lifecircle";
import { setServices } from "./store/reducers/services";
import { setGallery } from "./store/reducers/gallery";
// import { updateContent } from "./store/reducers/content";

function App() {
  const dispatch = useDispatch();
  const { isAuth, profile } = useSelector((state) => state.auth);
  const { loading } = useSelector((state) => state.lifeCircle);
  const [mountedComponent, setMountedComponent] = useState(false);
  const { data, isLoading } = useSnapshot("content");
  const { data: services } = useSnapshot("services");
  const { data: gallery } = useSnapshot("gallery");
  useAuth();

  useEffect(() => {
    setMountedComponent(true);
    Aos.init({
      delay: 0, // values from 0 to 3000, with step 50ms
      duration: 400, // values from 0 to 3000, with step 50ms
      easing: "ease", // default easing for AOS animations
      once: false,
    });
  }, []);

  useEffect(() => {
    Aos.refresh();
  }, [mountedComponent]);

  useEffect(() => {
    if (services?.length) {
      dispatch(setServices(services));
    }
  }, [services]);

  useEffect(() => {
    if (gallery?.length) {
      dispatch(setGallery(gallery));
    }
  }, [gallery]);

  // useEffect(() => {
  //   dispatch(setLoading(isLoading));
  //   if (data) {
  //     Object.keys(data).forEach((dataKey) => {
  //       dispatch(
  //         updateContent({
  //           key: dataKey,
  //           value: data[dataKey],
  //         }),
  //       );
  //     });
  //   }
  // }, [data, isLoading]);

  return (
    <ThemeProvider>
      <AnimatePresence>
        <BrowserRouter>
          <Router loading={loading} auth={isAuth} profile={profile} />
        </BrowserRouter>
      </AnimatePresence>
    </ThemeProvider>
  );
}

export default App;
