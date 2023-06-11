import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  isAuth: false,
  profile: null,
};

const authSlice = createSlice({
  name: "auth",
  initialState,
  reducers: {
    setAuth: (state, action) => {
      state.isAuth = action.payload;
    },
    setProfile: (state, action) => {
      state.profile = action.payload;
    },
    updateAuthProfile: (state, action) => {
      state.profile[action.payload.key] = action.payload.value;
    },
  },
});
// Action creators are generated for each case reducer function
export const { setAuth, setProfile, updateAuthProfile } = authSlice.actions;

export default authSlice.reducer;
