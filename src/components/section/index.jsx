import PropTypes from "prop-types";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Container from "@mui/material/Container";

const Overlay = styled("div")({
  position: "absolute",
  top: 0,
  bottom: 0,
  left: 0,
  right: 0,
  margin: "auto",
  background: "rgba(0,0,0, 0.4)",
});

function Section({ children, size, background, image, padding }) {
  return (
    <Box
      sx={{
        py: padding,
        background: image ? `url(${image}) no-repeat` : background,
        backgroundSize: "cover",
        position: "relative",
      }}
      component="section"
    >
      {image && <Overlay />}
      <Container maxWidth={size}>{children}</Container>
    </Box>
  );
}

Section.defaultProps = {
  background: "#FFF",
  size: "xl",
  padding: 20,
};

Section.propTypes = {
  children: PropTypes.node.isRequired,
  size: PropTypes.string,
  background: PropTypes.string,
  image: PropTypes.string,
  padding: PropTypes.number,
};

export default Section;
