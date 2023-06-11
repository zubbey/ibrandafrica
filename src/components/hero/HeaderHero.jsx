import PropTypes from "prop-types";
import { useNavigate } from "react-router-dom";
import { SplitText } from "@cyriacbr/react-split-text";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import Button from "@mui/material/Button";
import Iconify from "../Iconify";

const StyledBox = styled(Box)(({ theme }) => ({
  // position: "relative",
  display: "flex",
  flexDirection: "column",
  alignItems: "center",
  padding: theme.spacing(8, 20),
  [theme.breakpoints.down("md")]: {
    padding: theme.spacing(4, 0),
  },
}));

const StyledTitle = styled(Typography)(({ theme }) => ({
  ...theme.typography.h2,
  fontWeight: "bolder",
  color: "white",
  textAlign: "center",
  textTransform: "capitalize",
  lineHeight: 1.2,
}));

const StyledDesc = styled(Typography)(({ theme }) => ({
  ...theme.typography.h6,
  color: "white",
  textAlign: "center",
  fontWeight: 100,
  padding: theme.spacing(2, 20),
  [theme.breakpoints.down("md")]: {
    fontSize: 16,
    padding: theme.spacing(5, 5),
  },
}));

const StyledButton = styled(Button)(({ theme }) => ({
  backgroundColor: theme.palette.common.white,
  color: theme.palette.common.black,
  padding: theme.spacing(2, 4),
  "&:hover": {
    backgroundColor: theme.palette.common.black,
    color: theme.palette.common.white,
  },
}));

const WordWrapper = ({ children, wordIndex }) => (
  <span
    data-aos="fade-up"
    data-aos-delay={`1${wordIndex}0`}
    data-aos-duration="1000"
    style={{ whiteSpace: "pre", display: "inline-block" }}
  >
    <StyledTitle>{children}</StyledTitle>
  </span>
);

function HeaderHero({ title, subtitle, overline, buttonText, buttonLink, isExternalLink, buttonAction }) {
  const navigate = useNavigate();

  const handleLink = () => {
    if (typeof buttonAction === "function") {
      buttonAction();
      return;
    }
    if (isExternalLink) {
      window.open(buttonLink, "_blank");
      return;
    }
    navigate(buttonLink, { replace: true });
  };

  return (
    <StyledBox>
      <SplitText WordWrapper={WordWrapper} style={{ textAlign: "center" }}>
        {title}
      </SplitText>
      <Typography variant="overline" color="neutral.main">
        {overline}
      </Typography>
      <StyledDesc data-aos="fade-up" data-aos-delay={150} data-aos-duration="1400">
        {subtitle}
      </StyledDesc>
      {buttonLink || buttonAction ? <StyledButton onClick={handleLink}>{buttonText}</StyledButton> : null}
    </StyledBox>
  );
}

HeaderHero.defaultProps = {
  isExternalLink: false,
};

HeaderHero.propTypes = {
  title: PropTypes.string,
  subtitle: PropTypes.string,
  overline: PropTypes.string,
  buttonText: PropTypes.string,
  buttonLink: PropTypes.string,
  isExternalLink: PropTypes.bool,
  buttonAction: PropTypes.func,
};

export default HeaderHero;
