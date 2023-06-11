import PropTypes from "prop-types";
import { styled } from "@mui/material/styles";
import Link from "@mui/material/Link";

const StyledLink = styled(Link)(({ theme }) => ({
  ...theme.typography.h3,
  padding: theme.spacing(1, 2),
  textAlign: "center",
  color: theme.palette.common.white,
  fontWeight: "600",
  "&:before": {
    content: '""',
    backgroundColor: "rgba(255,255,255, 0.2)",
    position: "absolute",
    left: 0,
    bottom: 3,
    width: "100%",
    height: 8,
    zIndex: -1,
    borderRadius: theme.spacing(1),
    transition: "all .3s ease-in-out",
  },
  "&:hover::before": {
    bottom: 0,
    height: "100%",
  },
}));

function CustomLink({ children, ...rest }) {
  return <StyledLink {...rest}>{children}</StyledLink>;
}

CustomLink.propTypes = {
  children: PropTypes.node.isRequired,
};

export default CustomLink;
