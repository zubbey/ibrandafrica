import PropTypes from "prop-types";
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
  padding: theme.spacing(12, 20),
  [theme.breakpoints.down("md")]: {
    padding: theme.spacing(10, 0),
  },
}));

const StyledTitle = styled(Typography)(({ theme }) => ({
  fontWeight: "bolder",
  fontSize: 100,
  color: "white",
  textAlign: "center",
  textTransform: "capitalize",
  lineHeight: 1,
  [theme.breakpoints.down("md")]: {
    fontSize: 64,
  },
}));

const StyledDesc = styled(Typography)(({ theme }) => ({
  fontSize: 24,
  color: "white",
  textAlign: "center",
  fontWeight: 100,
  padding: theme.spacing(5, 20),
  [theme.breakpoints.down("md")]: {
    fontSize: 16,
    padding: theme.spacing(5, 5),
  },
}));

const StyledTool = styled(Box)(({ theme }) => ({
  position: "absolute",
  backgroundImage: "url(/images/tools.svg)",
  backgroundRepeat: "no-repeat",
  width: "100%",
  height: "100%",
  top: 150,
  [theme.breakpoints.down("md")]: {
    top: 25,
    backgroundImage: "url(/images/tools-mobile.svg)",
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
    data-aos-delay={`1${wordIndex}00`}
    data-aos-duration="1000"
    style={{ whiteSpace: "pre", display: "inline-block" }}
  >
    <StyledTitle>{children}</StyledTitle>
  </span>
);

function HomeHero({ title, desc, cursorEnter, cursorLeave, formRef }) {
  const scrollToBottm = () => formRef.current.scrollIntoView({ behavior: "smooth", block: "start" });

  return (
    <StyledBox>
      <StyledTool data-aos="zoom-in" data-aos-delay={1000} data-aos-duration="2200" />
      <SplitText WordWrapper={WordWrapper} style={{ textAlign: "center" }}>
        {title}
      </SplitText>
      {/* <StyledTitle data-aos="fade-up" data-aos-delay={1000} data-aos-duration="1000">
        {title}
      </StyledTitle> */}
      <StyledDesc data-aos="fade-up" data-aos-delay={1200} data-aos-duration="1400">
        {desc}
      </StyledDesc>
      <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave} data-aos="fade-up" data-aos-delay={1400}>
        <StyledButton
          onClick={scrollToBottm}
          variant="contained"
          endIcon={<Iconify icon="ph:hand-fill" color="inherit" />}
        >
          Let's Talk
        </StyledButton>
      </div>
    </StyledBox>
  );
}

HomeHero.propTypes = {
  title: PropTypes.string,
  desc: PropTypes.string,
  cursorEnter: PropTypes.func,
  cursorLeave: PropTypes.func,
};

export default HomeHero;
