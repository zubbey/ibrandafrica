import PropTypes from "prop-types";
import { forwardRef } from "react";
import { styled } from "@mui/material/styles";
import Dialog from "@mui/material/Dialog";
import DialogContent from "@mui/material/DialogContent";
import Slide from "@mui/material/Slide";
import CustomDialogTitle from "./CustomDialogTitle";

const Transition = forwardRef((props, ref) => <Slide direction="up" ref={ref} {...props} />);

const BootstrapDialog = styled(Dialog)(({ theme }) => ({
  root: {
    width: "100%",
  },
  "& .MuiDialogContent-root": {
    width: "100%",
    display: "flex",
    flexDirection: "column",
    padding: theme.spacing(2),
  },
  "& .MuiDialogActions-root": {
    padding: theme.spacing(1),
  },
}));

function CustomModal(props) {
  const { children, open, setOpen, title, modalSize } = props;

  const handleClose = (_, reason) => {
    if (reason !== "backdropClick") {
      setOpen(false);
    }
  };

  return (
    <BootstrapDialog
      open={open}
      fullScreen={modalSize === "full"}
      maxWidth={modalSize !== "full" ? modalSize : "lg"}
      onClose={handleClose}
      TransitionComponent={Transition}
      aria-labelledby="customized-dialog-title"
      sx={{
        "& .MuiDialog-paper": {
          bgcolor: "rgba(0,0,0,.85)",
          backdropFilter: "saturate(180%) blur(10px)",
          width: "100%",
          margin: 1,
        },
      }}
    >
      <CustomDialogTitle id="customized-dialog-title" onClose={handleClose}>
        {title}
      </CustomDialogTitle>
      <DialogContent sx={{ width: "100%" }}>{children}</DialogContent>
    </BootstrapDialog>
  );
}

CustomModal.defaultProps = {
  title: "",
  modalSize: "md",
};

CustomModal.propTypes = {
  children: PropTypes.node.isRequired,
  open: PropTypes.bool.isRequired,
  setOpen: PropTypes.func.isRequired,
  title: PropTypes.string,
  modalSize: PropTypes.string,
};

export default CustomModal;
