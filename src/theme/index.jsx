import PropTypes from "prop-types";
import { useMemo } from "react";
import { useSelector } from "react-redux";
// material
import CssBaseline from "@mui/material/CssBaseline";
import {
  ThemeProvider as MUIThemeProvider,
  createTheme,
  StyledEngineProvider,
  responsiveFontSizes,
} from "@mui/material/styles";
import themeConfig from "./themeConfig";

// ---------------------------------------------------------------------
ThemeProvider.propTypes = {
  children: PropTypes.node,
};

export default function ThemeProvider({ children }) {
  const { themeMode } = useSelector((state) => state.lifeCircle);

  const themeOptions = useMemo(() => themeConfig(themeMode), [themeMode]);

  let theme = createTheme(themeOptions);
  theme = responsiveFontSizes(theme);

  return (
    <StyledEngineProvider injectFirst>
      <MUIThemeProvider theme={theme}>
        <CssBaseline />
        {children}
      </MUIThemeProvider>
    </StyledEngineProvider>
  );
}
