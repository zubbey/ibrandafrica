import PropTypes from "prop-types";
import AppBar from "@mui/material/AppBar";
import Container from "@mui/material/Container";
import Toolbar from "@mui/material/Toolbar";
import { SocialIconList } from "../list";
import { HamburgerButton } from "../buttons";
import Logo from "../logo";

function CustomToolbar({ open, contact, handleMenu, cursorEnter, cursorLeave, trigger, isMd }) {
  return (
    <AppBar className="appbar__header" sx={{ bgcolor: "rgba(0,0,0,0.1)" }}>
      <Container maxWidth="xl">
        <Toolbar sx={{ justifyContent: "space-between" }}>
          {isMd && (
            <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave}>
              <SocialIconList data={contact.socials} dark />
            </div>
          )}
          <Logo dark size={30} />
          <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave}>
            <HamburgerButton open={open} dark onToggle={handleMenu} />
          </div>
        </Toolbar>
      </Container>
    </AppBar>
  );
}

CustomToolbar.propTypes = {
  open: PropTypes.bool.isRequired,
  contact: PropTypes.object.isRequired,
  handleMenu: PropTypes.func.isRequired,
  cursorEnter: PropTypes.func.isRequired,
  cursorLeave: PropTypes.func.isRequired,
  isMd: PropTypes.bool.isRequired,
  trigger: PropTypes.bool.isRequired,
};

export default CustomToolbar;
