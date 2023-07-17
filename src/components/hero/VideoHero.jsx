/* eslint-disable jsx-a11y/media-has-caption */
import { useEffect, useRef, useState } from "react";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import { keyframes } from "@mui/system";
// import { Player, ControlBar } from "video-react";
import "video-react/dist/video-react.css";
import { IconButton } from "@mui/material";
import Iconify from "../Iconify";

const spin = keyframes`
  0% {
    transform: translate(0px);
  }
  50% {
    transform: translate(0, 20px);
  }
  80% {
    transform: translate(0, -10px);
  },
  90% {
    transform: translate(0, 5px);
  }
  100% {
    transform: translate(0px);
  }
`;

const HoverArrow = styled(Box)(({ theme }) => ({
  position: "absolute",
  bottom: 100,
  width: "100%",
  margin: "auto",
  display: "flex",
  alignItems: "center",
  justifyContent: "center",
  animation: `${spin} 1s infinite ease-out`,
  [theme.breakpoints.down("md")]: {
    display: "none",
  },
}));

const StyledIconButton = styled(IconButton)(({ theme }) => ({
  position: "absolute",
  bottom: 100,
  right: 100,
  [theme.breakpoints.down("md")]: {
    display: "none",
  },
}));

function VideoHero({ video, handleClick }) {
  const ref = useRef(null);
  const [focus, setFocus] = useState(false);
  const [audio, setAudio] = useState(false);

  const loop = () => {
    ref.current.play();
  };

  const onEndedLoop = () => {
    if (focus) loop(); // when ended check if its focused then loop
  };

  useEffect(() => {
    if (focus) loop(); // when focused then loop
  }, [focus]);

  return (
    <div style={{ position: "relative" }}>
      <video
        id="video"
        ref={ref}
        style={{ width: "100%", position: "relative" }}
        autoPlay
        onMouseOver={() => setFocus(true)}
        onMouseOut={() => setFocus(false)}
        onFocus={() => setFocus(true)}
        onBlur={() => setFocus(true)}
        muted={!audio}
        src={video}
        onEnded={onEndedLoop}
      >
        <track id="track" />
      </video>
      <HoverArrow onClick={handleClick}>
        <Iconify icon="iconamoon:arrow-down-2-light" size={28} color="#FFFFFF" sx={{ position: "absolute" }} />
        <Iconify icon="iconoir:circle" size={42} color="#FFFFFF" sx={{ position: "absolute" }} />
      </HoverArrow>
      <StyledIconButton onClick={() => setAudio(!audio)}>
        <Iconify icon={audio ? "charm:sound-up" : "charm:sound-mute"} size={28} color="#FFFFFF" />
      </StyledIconButton>
    </div>
  );
}

export default VideoHero;
