import PropTypes from "prop-types";
import { styled } from "@mui/material/styles";
import { Link } from "react-router-dom";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import Button from "@mui/material/Button";

const Image = styled("img")({
  width: "100%",
  height: 540,
  objectFit: "contain",
});

const StyledButton = styled(Button)(({ theme }) => ({
  backgroundColor: theme.palette.common.black,
  color: theme.palette.common.white,
  padding: theme.spacing(2, 4),
  margin: theme.spacing(2, 0),
  "&:hover": {
    backgroundColor: theme.palette.common.white,
    color: theme.palette.common.black,
  },
}));

function ImageHero({ title, subtitle, buttonText, buttonLink, image, dark, cursorEnter, cursorLeave }) {
  return (
    <Grid container spacing={2}>
      <Grid item xs={12} sm={6}>
        <Image src={image} data-aos="fade-up-right" data-aos-delay="110" data-aos-duration="1000" alt="..." />
      </Grid>
      <Grid item xs={12} sm={6}>
        <Typography
          variant="h4"
          fontWeight="bolder"
          data-aos="fade-up"
          data-aos-delay="110"
          data-aos-duration="1000"
          sx={{ my: 2, color: dark ? "neutral.main" : "textPrimary" }}
        >
          {title}
        </Typography>
        <Typography
          variant="body1"
          fontWeight="light"
          data-aos="fade-up"
          data-aos-delay="130"
          data-aos-duration="1000"
          sx={{ fontSize: { xs: 16, sm: 19 }, color: dark ? "neutral.darker" : "textSecondary" }}
        >
          {subtitle}
        </Typography>
        {buttonLink && (
          <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave}>
            <StyledButton
              component={Link}
              to={buttonLink}
              sx={{ bgcolor: dark ? "neutral.main" : "black", color: dark ? "black" : "neutral.main" }}
              data-aos="fade-up"
              data-aos-delay="150"
              data-aos-duration="1000"
            >
              {buttonText}
            </StyledButton>
          </div>
        )}
      </Grid>
    </Grid>
  );
}

ImageHero.defaultProps = {
  dark: false,
};

ImageHero.propTypes = {
  title: PropTypes.string,
  subtitle: PropTypes.string,
  image: PropTypes.string,
  cursorEnter: PropTypes.func,
  cursorLeave: PropTypes.func,
  dark: PropTypes.bool,
};

export default ImageHero;
