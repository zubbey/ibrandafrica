import { useLocation, Outlet } from "react-router-dom";
import { useSelector } from "react-redux";
import { ToastContainer } from "react-toastify";
import { useTheme } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Divider from "@mui/material/Divider";
import Container from "@mui/material/Container";

import Logo from "../../components/logo";
import Meta from "../../components/meta";
import MiniFooter from "../../components/footer";

function AuthLayout() {
  const theme = useTheme();
  const { contact } = useSelector((state) => state.content);
  const { pathname } = useLocation();

  return (
    <Meta
      title="Login"
      sx={{
        display: "flex",
        flexDirection: "column",
        background: `url('/images/pattern1.svg'), ${theme.palette.primary.main}`,
        backgroundBlendMode: "soft-light",
        overflow: "auto",
        minHeight: "100vh",
      }}
    >
      <Container component="main" maxWidth="lg" sx={{ height: 1 }}>
        <Logo dark disabledLink sx={{ margin: "50px auto", width: "100%", height: 40 }} size={40} />
        <Box
          sx={{
            display: "flex",
            flexDirection: "column",
            justifyContent: "center",
            alignItems: "center",
            width: "100%",
            height: "auto",
          }}
        >
          <Outlet />
        </Box>
        <Box
          sx={{
            position: pathname === "/account/signup" ? "relative" : "absolute",
            bottom: 0,
            py: 5,
          }}
        >
          <Divider light sx={{ my: 2 }} />
          {!pathname.includes("admin") && <MiniFooter data={contact.socials} />}
        </Box>
      </Container>
      <ToastContainer />
    </Meta>
  );
}

export default AuthLayout;
