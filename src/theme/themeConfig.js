/**
 *
 * @param {String} themeMode
 * @returns Object
 */

export default function themeConfig(themeMode) {
  return {
    palette: {
      mode: themeMode,
      contrastThreshold: 4.5,
      primary: {
        main: themeMode === "dark" ? "#364e95" : "#364E95",
        darker: "#1B264A",
      },
      secondary: {
        main: "#faa831",
        lighter: "#FDE5C1",
      },
      alternate: {
        main: "#f4f8fc",
      },
      accent: {
        main: "#95979a",
        light: "#adb1b5",
      },
      neutral: {
        main: "#FFF",
        darker: "#f4f8fc",
      },
      background: {
        default: themeMode === "dark" ? "#000000" : "#ebeaf1",
        paper: themeMode === "dark" ? "#292a2d" : "#FFFFFF",
      },
      chart: CHART_COLORS,
    },
    typography: {
      fontFamily: "inter",
    },
    shape: {
      borderRadius: 8,
    },
    components: {
      MuiAppBar: {
        defaultProps: {
          color: "transparent",
        },
        styleOverrides: {
          root: {
            boxShadow: "none",
          },
        },
      },
      MuiButton: {
        styleOverrides: {
          root: ({ ownerState }) => ({
            textTransform: "capitalize",
            fontWeight: "bolder",
            boxShadow: "none",
            paddingTop: 12,
            paddingBottom: 12,
            borderRadius: 100,
            "&hover": {
              boxShadow: "none",
            },
          }),
        },
      },
      MuiPaper: {
        styleOverrides: {
          root: {
            width: "auto",
            boxShadow: "rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;",
          },
        },
      },
      MuiLink: {
        styleOverrides: {
          root: {
            textDecoration: "none",
            transition: "400ms ease",
          },
        },
      },
      MuiInputBase: {
        styleOverrides: {
          root: {
            "&.MuiFilledInput-underline:before": {
              borderBottom: "none",
            },
            "&.MuiFilledInput-underline:after": {
              borderBottom: "none",
            },
            "&.MuiFilledInput-underline:hover:not(.Mui-disabled):before": {
              borderBottom: "none",
            },
          },
        },
      },
    },
  };
}

const CHART_COLORS = {
  violet: ["#826AF9", "#9E86FF", "#D0AEFF", "#F7D2FF"],
  blue: ["#2D99FF", "#83CFFF", "#A5F3FF", "#CCFAFF"],
  green: ["#2CD9C5", "#60F1C8", "#A4F7CC", "#C0F2DC"],
  yellow: ["#FFE700", "#FFEF5A", "#FFF7AE", "#FFF3D6"],
  red: ["#FF6C40", "#FF8F6D", "#FFBD98", "#FFF2D4"],
};
