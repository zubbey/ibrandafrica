import { styled } from "@mui/material/styles";
import TextField from "@mui/material/TextField";

const WhiteTextField = styled(TextField)({
  margin: "20px 0",
  textTransform: "capitalize",
  "& .MuiInput-root": {
    color: "white",
  },
  "& .MuiInput-root::before": {
    borderBottomColor: "rgba(255,255,255,0.20)",
  },
  "& label.Mui-focused": {
    color: "white",
  },
  "& .MuiInput-underline:after": {
    borderBottomColor: "white",
  },
  "& .MuiInputLabel-root": {
    color: "white",
  },
  "& .MuiOutlinedInput-input": {
    color: "white",
  },
  "& .MuiOutlinedInput-root": {
    "& fieldset": {
      borderColor: "white",
    },
    "&:hover fieldset": {
      borderColor: "white",
    },
    "&.Mui-focused fieldset": {
      borderColor: "white",
    },
  },
});

export default WhiteTextField;
