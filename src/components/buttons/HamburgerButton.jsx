import PropTypes from "prop-types";
// import Hamburger from "hamburger-react"; //REMOVE
import IconButton from "@mui/material/IconButton";
import Typography from "@mui/material/Typography";
import Iconify from "../Iconify";

function HamburgerButton({ open, dark, onToggle }) {
  return (
    <IconButton onClick={onToggle} aria-label="Menu" color={dark ? "#FFF" : "#000"}>
      <Iconify
        icon={open ? "mdi:close" : "mdi:menu"}
        size={24}
        sx={{ color: dark ? "#FFF" : "#000", marginRight: 1 }}
      />
      <Typography color={dark ? "#FFF" : "#000"}>{open ? "Close" : "Menu"}</Typography>
    </IconButton>
  );
}

HamburgerButton.propTypes = {
  open: PropTypes.bool.isRequired,
  dark: PropTypes.bool.isRequired,
  onToggle: PropTypes.func.isRequired,
};

export default HamburgerButton;
