import PropTypes from "prop-types";
import { styled } from "@mui/material/styles";
import Backdrop from "@mui/material/Backdrop";
import Modal from "@mui/material/Modal";
import Fade from "@mui/material/Fade";
import IconButton from "@mui/material/IconButton";
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

const StyledImg = styled("img")(({ theme }) => ({
  width: 1000,
  objectFit: "contain",
  borderRadius: 10,
  [theme.breakpoints.down("md")]: {
    width: "100%",
  },
}));

const StyledCaption = styled("h4")(({ theme }) => ({
  ...theme.typography.h6,
  textAlign: "center",
  color: "#FFF",
  // [theme.breakpoints.down("md")]: {
  //   width: "100%",
  // },
}));

const Navigation = ({ icon, position, onClick }) => (
  <IconButton
    onClick={onClick}
    sx={{
      position: "absolute",
      top: "50%",
      [position]: 0,
    }}
  >
    <Iconify icon={icon} size={50} sx={{ color: "white" }} />
  </IconButton>
);

function LightBox({ image, caption, open, onNext, onPrev, onClose }) {
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
        <div>
          <StyledContent>
            <StyledImg src={image} />
            <StyledCaption>{caption}</StyledCaption>
          </StyledContent>
          <Navigation icon="mdi:chevron-left" position="left" onClick={onPrev} />
          <Navigation icon="mdi:chevron-right" position="right" onClick={onNext} />
        </div>
      </Fade>
    </Modal>
  );
}

LightBox.defaultProps = {
  open: false,
  image: "",
  caption: "",
};

LightBox.propTypes = {
  open: PropTypes.bool,
  image: PropTypes.string,
  caption: PropTypes.string,
  onClose: PropTypes.func.isRequired,
  onNext: PropTypes.func.isRequired,
  onPrev: PropTypes.func.isRequired,
};

export default LightBox;
