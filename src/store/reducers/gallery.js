import { createSlice } from "@reduxjs/toolkit";

const gallerySlice = createSlice({
  name: "gallery",
  initialState: [
    {
      caption: "The worst enemy to creativity is self-doubt.",
      image:
        "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2F06.jpg?alt=media&token=821b3a26-79b6-4546-81c3-4c2a78d507af",
      id: "0RCZhTbmKXlTTmY9Pxd4",
    },
    {
      caption: "You can't use up creativity. The more you use, the more you have.",
      image:
        "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2F13.jpg?alt=media&token=bac7427d-0970-4a76-9e4e-1540762cb8c3",
      id: "3WUfMkjdbgJkxg1weslg",
    },
    {
      caption: "Create with the heart; build with the mind.",
      image:
        "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2F10.jpg?alt=media&token=8bc94c5a-59a9-48ce-9e91-6db67d0504b6",
      id: "41Wx0ggDjqufbZWnxHgC",
    },
  ],
  reducers: {
    setGallery: (_, action) => action.payload,
  },
});
// Action creators are generated for each case reducer function
export const { setGallery } = gallerySlice.actions;

export default gallerySlice.reducer;
