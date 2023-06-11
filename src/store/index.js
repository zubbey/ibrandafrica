import { combineReducers } from "redux";
import { configureStore } from "@reduxjs/toolkit";
import storage from "redux-persist/lib/storage";
import { persistStore, persistReducer, FLUSH, REHYDRATE, PAUSE, PERSIST, PURGE, REGISTER } from "redux-persist";

import authReducer from "./reducers/auth";
import lifeCircleReducer from "./reducers/lifecircle";
import contentReducer from "./reducers/content";
import blogReducer from "./reducers/blogs";
import servicesReducer from "./reducers/services";
import galleryReducer from "./reducers/gallery";

const persistConfig = {
  key: "root",
  storage,
};

const reducers = combineReducers({
  auth: authReducer,
  content: contentReducer,
  lifeCircle: lifeCircleReducer,
  services: servicesReducer,
  gallery: galleryReducer,
  blogs: blogReducer,
});

const persistedReducer = persistReducer(persistConfig, reducers);

export const store = configureStore({
  reducer: persistedReducer,
  middleware: (getDefaultMiddleware) =>
    getDefaultMiddleware({
      serializableCheck: {
        ignoredActions: [FLUSH, REHYDRATE, PAUSE, PERSIST, PURGE, REGISTER],
      },
    }),
});
export const persistor = persistStore(store);
