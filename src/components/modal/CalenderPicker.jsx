import PropTypes from "prop-types";
import { styled } from "@mui/material/styles";
import Backdrop from "@mui/material/Backdrop";
import Modal from "@mui/material/Modal";
import Fade from "@mui/material/Fade";

import { AdapterDayjs } from "@mui/x-date-pickers/AdapterDayjs";
import { LocalizationProvider } from "@mui/x-date-pickers/LocalizationProvider";
import { StaticDateTimePicker } from "@mui/x-date-pickers/StaticDateTimePicker";

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

const isWeekend = (date) => {
  const day = date.day();

  return day === 0 || day === 6;
};

function CalenderPicker({ open, onClose, value, onChange }) {
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
          <LocalizationProvider dateAdapter={AdapterDayjs}>
            <StaticDateTimePicker
              disablePast
              orientation="landscape"
              defaultValue={value}
              onChange={onChange}
              shouldDisableDate={isWeekend}
              onAccept={onClose}
              slotProps={{
                actionBar: {
                  actions: ["accept"],
                },
              }}
            />
          </LocalizationProvider>
        </StyledContent>
      </Fade>
    </Modal>
  );
}

CalenderPicker.defaultProps = {
  open: false,
};

CalenderPicker.propTypes = {
  open: PropTypes.bool,
  onClose: PropTypes.func.isRequired,
  value: PropTypes.object,
  onChange: PropTypes.func.isRequired,
};

export default CalenderPicker;
