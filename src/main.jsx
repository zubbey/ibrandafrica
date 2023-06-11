import React from "react";
import ReactDOM from "react-dom/client";
import { HelmetProvider } from "react-helmet-async";
import { Provider } from "react-redux";
import { PersistGate } from "redux-persist/integration/react";

import { MouseContextProvider } from "./context";
import { Preloader } from "./components/animation";
import { persistor, store } from "./store";
import App from "./App";

import "@fontsource/inter/300.css";
import "@fontsource/inter/400.css";
import "@fontsource/inter/500.css";
import "@fontsource/inter/700.css";

import "react-toastify/dist/ReactToastify.css";
import "aos/dist/aos.css";
import "./index.css";

ReactDOM.createRoot(document.getElementById("root")).render(
  <React.StrictMode>
    <HelmetProvider>
      <Provider store={store}>
        <PersistGate loading={<Preloader />} persistor={persistor}>
          <MouseContextProvider>
            <App />
          </MouseContextProvider>
        </PersistGate>
      </Provider>
    </HelmetProvider>
  </React.StrictMode>,
);
