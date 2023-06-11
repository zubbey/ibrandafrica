import PropTypes from "prop-types";
import { useState } from "react";
import { Link as RouterLink, Outlet, useLocation } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { ToastContainer } from "react-toastify";
import Hamburger from "hamburger-react";

// MUI
import Box from "@mui/material/Box";

// COMPONENT

PrivateLayout.propTypes = {
  userType: PropTypes.string.isRequired,
  profile: PropTypes.object,
  loading: PropTypes.bool,
};

function PrivateLayout({ profile, loading, userType }) {
  return (
    <>
      <Box sx={{ bgcolor: "background.paper" }} component="main">
        <Outlet />
      </Box>
      <ToastContainer />
    </>
  );
}

export default PrivateLayout;
