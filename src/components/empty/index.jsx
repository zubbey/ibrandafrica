import PropTypes from "prop-types";
import Box from "@mui/material/Box";
import Stack from "@mui/material/Stack";
import Typography from "@mui/material/Typography";

Empty.propTypes = {
  text: PropTypes.string.isRequired,
  image: PropTypes.string,
  imgSx: PropTypes.object,
  textSx: PropTypes.object,
};

Empty.defaultProps = {
  imgSx: {},
  textSx: {},
};

export default function Empty({ text, image, imgSx, textSx }) {
  return (
    <Stack justifyContent="center" alignItems="center" width={1}>
      <Box
        component="img"
        src={image || "/images/empty.svg"}
        loading="lazy"
        sx={{ height: 150, mx: "auto", ...imgSx }}
      />

      <Typography variant="body1" fontWeight="bolder" sx={{ mt: { xs: 2, sm: 5 }, mb: 1, ...textSx }}>
        {text}
      </Typography>
    </Stack>
  );
}
