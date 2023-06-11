import PropTypes from "prop-types";
import { Link as RouterLink } from "react-router-dom";
// @mui
import Box from "@mui/material/Box";

// ----------------------------------------------------------------------
const Logo = ({ dark, size, disabledLink, fullLogo, sx }) => {
  const logoTypeDark = fullLogo ? "/images/logo-dark.svg" : "/images/icon-light.svg";
  const logoTypeLight = fullLogo ? "/images/logo-dark.svg" : "/images/icon-dark.svg";

  const image = dark ? logoTypeDark : logoTypeLight;

  const logo = <Box component="img" src={image} height={size} sx={sx} alt="..." />;

  if (disabledLink) {
    return <>{logo}</>;
  }

  return (
    <RouterLink to="/" style={{ textDecoration: "none", height: size }}>
      {logo}
    </RouterLink>
  );
};

export default Logo;

Logo.propTypes = {
  disabledLink: PropTypes.bool,
  size: PropTypes.number,
  sx: PropTypes.object,
  dark: PropTypes.bool,
  fullLogo: PropTypes.bool,
};

Logo.defaultProps = {
  disabledLink: false,
  dark: false,
  fullLogo: true,
  size: 30,
};
