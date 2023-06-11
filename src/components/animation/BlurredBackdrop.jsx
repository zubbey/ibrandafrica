import PropType from "prop-types";
import Box from "@mui/material/Box";
import Backdrop from "@mui/material/Backdrop";

export default function BlurredBackdrop({ children, open, setOpen, drawerSize }) {
  return (
    <Backdrop
      sx={{
        bgcolor: (theme) => (theme.palette.mode === "light" ? "#ffffff7d" : "0000007d"),
        backdropFilter: "blur(33px)",
        backgroundBlendMode: "overlay",
        boxShadow: "0 10px 15px rgb(0 0 0 / 20%)",
        zIndex: (theme) => theme.zIndex.drawer + 1,
        alignItems: "flex-start",
      }}
      open={open}
      // onClick={handleClose}
    >
      <Box
        sx={{
          width: "100%",
          p: 4,
          marginLeft: { xs: "auto", sm: `${drawerSize}px` },
          transition: "margin 500ms ease",
        }}
      >
        {children}
      </Box>
    </Backdrop>
  );
}

BlurredBackdrop.propTypes = {
  open: PropType.bool,
  setOpen: PropType.func,
  drawerSize: PropType.number,
  children: PropType.node,
};
