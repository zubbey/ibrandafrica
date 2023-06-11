import PropTypes from "prop-types";
import { useLayoutEffect, useState } from "react";
import { styled } from "@mui/material/styles";
import Backdrop from "@mui/material/Backdrop";
import Modal from "@mui/material/Modal";
import Fade from "@mui/material/Fade";
import IconButton from "@mui/material/IconButton";
import CircularProgress from "@mui/material/CircularProgress";
import ReactPlayer from "react-player/youtube";
import Iconify from "../Iconify";

const StyledContent = styled("div")(({ theme }) => ({
  position: "absolute",
  top: "50%",
  left: "50%",
  transform: "translate(-50%, -50%)",
  boxShadow: 24,
  outline: 0,
  [theme.breakpoints.down("md")]: {
    width: "100%",
    padding: theme.spacing(1.5),
  },
}));

const StyledCircularProgress = styled(CircularProgress)({
  position: "absolute",
  top: "50%",
  left: "50%",
  transform: "translate(-50%, -50%)",
});

const Close = ({ onClick }) => (
  <IconButton
    onClick={onClick}
    sx={{
      position: "absolute",
      top: -20,
      right: -35,
    }}
  >
    <Iconify icon="material-symbols:close" size={50} sx={{ color: "white" }} />
  </IconButton>
);

function VideoModal({ url, open, isMd, onClose }) {
  const [loading, setLoading] = useState(true);

  useLayoutEffect(() => setLoading(true), []);

  const handleReady = () => {
    setLoading(false);
    console.log("Ready!!!");
  };

  return (
    <Modal
      aria-labelledby="transition-modal-title"
      aria-describedby="transition-modal-description"
      open={open}
      onClose={onClose}
      closeAfterTransition
      slots={{ backdrop: Backdrop }}
      slotProps={{
        backdrop: {
          timeout: 500,
          style: {
            backgroundColor: "rgba(0,0,0,.85)",
          },
        },
      }}
    >
      <Fade in={open}>
        <StyledContent>
          {loading ? <StyledCircularProgress color="neutral" size={50} /> : <Close onClick={onClose} />}
          <ReactPlayer
            url={url}
            onReady={handleReady}
            playing
            width={isMd ? 1000 : "100%"}
            height={isMd ? 600 : 300}
            style={{ borderRadius: 20 }}
          />
        </StyledContent>
      </Fade>
    </Modal>
  );
}

VideoModal.defaultProps = {
  open: false,
};

VideoModal.propTypes = {
  url: PropTypes.string,
  open: PropTypes.bool,
  onClose: PropTypes.func.isRequired,
};

export default VideoModal;
