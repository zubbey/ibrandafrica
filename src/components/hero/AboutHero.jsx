import PropTypes from "prop-types";
import { useState } from "react";
import { Link as RouterLink } from "react-router-dom";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import Button from "@mui/material/Button";
import IconButton from "@mui/material/IconButton";
import VideoModal from "../modal/VideoModal";
import Iconify from "../Iconify";

const StyledTitle = styled(Typography)(({ theme }) => ({
  fontSize: 132,
  fontWeight: "bolder",
  lineHeight: 1,
  [theme.breakpoints.down("md")]: {
    fontSize: 80,
  },
}));

const StyledButton = styled(Button)(({ theme }) => ({
  backgroundColor: theme.palette.common.black,
  color: "#FFF",
  padding: theme.spacing(2, 4),
  "&:hover": {
    backgroundColor: theme.palette.common.white,
    color: theme.palette.common.black,
  },
}));

const VideoButton = styled(Box)(({ theme }) => ({
  width: "100%",
  height: 400,
  backgroundImage: "url(/images/video-preview.jpg)",
  backgroundSize: "cover",
  borderRadius: 10,
  backgroundColor: "black",
  display: "flex",
  flexDirection: "column",
  justifyContent: "center",
  alignItems: "center",
  margin: theme.spacing(2, 0),
}));

function AboutHero({ layout, video, title, desc, overline, isMd, cursorEnter, cursorLeave }) {
  const titleSplit = title.split(" ");
  const [openVideo, setOpenVideo] = useState(false);

  return (
    <>
      <VideoModal isMd={isMd} url={video} open={openVideo} onClose={() => setOpenVideo(false)} />
      {layout === 1 ? (
        <Grid container spacing={2}>
          <Grid xs={12} sm={4} item>
            <Typography variant="overline" fontSize={18} data-aos="fade-up">
              {overline}
            </Typography>
            <StyledTitle data-aos="fade-up" data-aos-duration="100">
              {titleSplit[0]}
            </StyledTitle>
            <Typography variant="h2" fontWeight="bold" data-aos="fade-up" data-aos-duration="1000">
              {titleSplit[1]}
            </Typography>
          </Grid>
          <Grid xs={12} sm={8} item>
            <Typography variant="h4" sx={{ mb: 2 }} data-aos="fade-up" data-aos-duration="1000">
              {desc}
            </Typography>
            <VideoButton data-aos="fade-up" data-aos-delay="800">
              <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave}>
                <IconButton onClick={() => setOpenVideo(true)}>
                  <Iconify icon="gridicons:play" size={68} sx={{ color: "#FFF" }} />
                </IconButton>
              </div>
            </VideoButton>
            <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave} data-aos="fade-up" data-aos-delay="600">
              <StyledButton variant="contained" component={RouterLink} to="/about">
                Learn More
              </StyledButton>
            </div>
          </Grid>
        </Grid>
      ) : (
        <Grid container spacing={4}>
          <Grid xs={12} sm={6} item>
            <VideoButton data-aos="fade-up" data-aos-delay="800">
              <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave}>
                <IconButton onClick={() => setOpenVideo(true)}>
                  <Iconify icon="gridicons:play" size={68} sx={{ color: "#FFF" }} />
                </IconButton>
              </div>
            </VideoButton>
          </Grid>
          <Grid xs={12} sm={6} item>
            <Typography variant="h2" fontWeight="bold" data-aos="fade-up" data-aos-duration="1000">
              {title}
            </Typography>
            {desc.map((body, index) => (
              <Typography key={index} variant="body1" data-aos="fade-up" data-aos-duration="1000" sx={{ my: 2 }}>
                {body}
              </Typography>
            ))}
          </Grid>
        </Grid>
      )}
    </>
  );
}

AboutHero.defaultProps = {
  overline: "",
  layout: 1,
};

AboutHero.propTypes = {
  layout: PropTypes.number,
  title: PropTypes.string,
  desc: PropTypes.any,
  overline: PropTypes.string,
  cursorEnter: PropTypes.func,
  cursorLeave: PropTypes.func,
  isMd: PropTypes.bool,
};

export default AboutHero;
