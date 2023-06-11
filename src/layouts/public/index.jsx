import PropTypes from "prop-types";
import { cloneElement, forwardRef, useContext, useEffect, useRef, useState } from "react";
import { Outlet, useLocation } from "react-router-dom";
import { useSelector } from "react-redux";
import { ToastContainer } from "react-toastify";
// Material
import { styled, useTheme } from "@mui/material/styles";
import useScrollTrigger from "@mui/material/useScrollTrigger";
import useMediaQuery from "@mui/material/useMediaQuery";
import Box from "@mui/material/Box";
import Fade from "@mui/material/Fade";
import Dialog from "@mui/material/Dialog";
import { MenuList } from "../../components/list";
import Cursor from "../../components/cursor";
import CustomToolbar from "../../components/toolbar";
import { MouseContext } from "../../context/mouse";
import pages from "../pages";
import MiniFooter from "../../components/footer";

const Transition = forwardRef(function Transition(props, ref) {
  return <Fade direction="up" timeout={12000} ref={ref} {...props} />;
});

const StyledBox = styled("main")(({ theme }) => ({
  backgroundImage: "url(/images/grid-pattern.svg)",
  backgroundColor: theme.palette.common.black,
  backgroundSize: "contain",
  height: "100%",
  // paddingTop: theme.spacing(10),
}));

function PublicLayout() {
  const theme = useTheme();
  const [open, setOpen] = useState(false);
  const { content, lifeCircle } = useSelector((state) => state);
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const mouseRef = useRef(null);
  const { pathname, search } = useLocation();

  const { contact } = content;
  const { mode } = theme.palette;

  const isMd = useMediaQuery(theme.breakpoints.up("md"), {
    defaultMatches: true,
  });

  const trigger = useScrollTrigger({
    disableHysteresis: true,
    threshold: 100,
  });

  const handleMenu = () => {
    setOpen(!open);
  };

  function projectEnter() {
    cursorTextHandler("View");
    cursorVariantHandler("project");
  }
  function cursorLeave() {
    cursorTextHandler("");
    cursorVariantHandler("default");
  }

  useEffect(() => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }, [pathname]);

  return (
    <div ref={mouseRef}>
      {isMd && <Cursor mouseRef={mouseRef} />}
      <Dialog fullScreen open={open} onClose={() => setOpen(false)} TransitionComponent={Transition}>
        <>
          <CustomToolbar
            open={open}
            contact={contact}
            handleMenu={handleMenu}
            cursorEnter={projectEnter}
            cursorLeave={cursorLeave}
            isMd={isMd}
            trigger={trigger}
          />
          <MenuList data={pages} setOpen={setOpen} />
        </>
      </Dialog>
      <CustomToolbar
        open={open}
        contact={contact}
        handleMenu={handleMenu}
        cursorEnter={projectEnter}
        cursorLeave={cursorLeave}
        isMd={isMd}
        trigger={trigger}
      />
      <StyledBox>
        <Outlet />
        <MiniFooter data={contact.socials} />
      </StyledBox>
      <ToastContainer />
    </div>
  );
}

export default PublicLayout;

PublicLayout.propTypes = {
  loading: PropTypes.bool.isRequired,
  auth: PropTypes.bool.isRequired,
  profile: PropTypes.any,
};
