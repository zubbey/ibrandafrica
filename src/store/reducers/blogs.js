import { createSlice } from "@reduxjs/toolkit";

const blogSlice = createSlice({
  name: "blogs",
  initialState: [],
  reducers: {
    setBlogs: (_, action) => action.payload,
  },
});
// Action creators are generated for each case reducer function
export const { setBlogs } = blogSlice.actions;

export default blogSlice.reducer;
