import PropTypes from "prop-types";
// icons
import { Icon } from "@iconify/react";
// @mui
import Box from "@mui/material/Box";

// ----------------------------------------------------------------------

Iconify.propTypes = {
  icon: PropTypes.oneOfType([PropTypes.element, PropTypes.string]),
  size: PropTypes.number,
  sx: PropTypes.object,
};

Iconify.defaultProps = {
  size: 20,
};

export default function Iconify({ icon, size, sx, ...other }) {
  return <Box component={Icon} icon={icon} sx={{ width: size, height: size, ...sx }} {...other} />;
}
