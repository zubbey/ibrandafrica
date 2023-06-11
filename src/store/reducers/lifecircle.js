import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  loading: false,
  themeMode: "light",
  notifyEmail: true,
  onBoarding: false,
  resendTimeout: 0,
};
// 10 * 60000;
const lifeCircleSlice = createSlice({
  name: "lifeCircle",
  initialState,
  reducers: {
    setLoading: (state, action) => {
      state.loading = action.payload;
    },
    setThemeMode: (state, action) => {
      state.themeMode = action.payload;
    },
    setOnBoarding: (state, action) => {
      state.onBoarding = action.payload;
    },
    setResendTimeout: (state, action) => {
      state.resendTimeout = action.payload;
    },
    toggleReceiveNotification: (state) => {
      state.notifyEmail = !state.notifyEmail;
    },
  },
});
// Action creators are generated for each case reducer function
export const { setThemeMode, setLoading, setOnBoarding, setResendTimeout, toggleReceiveNotification } =
  lifeCircleSlice.actions;

export default lifeCircleSlice.reducer;
