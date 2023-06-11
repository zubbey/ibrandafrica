import PropTypes from "prop-types";
import { FacebookShareButton, LinkedinShareButton, TwitterShareButton, WhatsappShareButton } from "react-share";
import { styled } from "@mui/material/styles";
import Tooltip from "@mui/material/Tooltip";
import Iconify from "../Iconify";

const ShareIcon = styled("div")({
  display: "flex",
  alignItems: "center",
  justifyContent: "center",
  cursor: "pointer",
  width: 32,
  height: 32,
  borderRadius: 32 / 2,
  margin: "auto",
});

const SocialButton = ({ name, icon, color, caption, title, subtitle, image }) => {
  const shareUrl = window.location.href;

  const Icon = () => (
    <Tooltip title={caption}>
      <ShareIcon sx={{ background: color }}>
        <Iconify icon={icon} sx={{ color: "white" }} />
      </ShareIcon>
    </Tooltip>
  );

  switch (name) {
    case "facebook":
      return (
        <FacebookShareButton url={shareUrl} quote={title}>
          <Icon />
        </FacebookShareButton>
      );

    case "twitter":
      return (
        <TwitterShareButton url={shareUrl} title={title}>
          <Icon />
        </TwitterShareButton>
      );

    case "linkedin":
      return (
        <LinkedinShareButton url={shareUrl}>
          <Icon />
        </LinkedinShareButton>
      );

    case "whatsapp":
      return (
        <WhatsappShareButton url={shareUrl} title={title} separator=" ">
          <Icon />
        </WhatsappShareButton>
      );

    default:
      return null;
  }
};

SocialButton.propTypes = {
  name: PropTypes.string,
  icon: PropTypes.string,
  color: PropTypes.string,
  caption: PropTypes.string,
  title: PropTypes.string,
  subtitle: PropTypes.string,
  image: PropTypes.string,
};

export default SocialButton;
