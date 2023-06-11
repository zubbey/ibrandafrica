import PropTypes from "prop-types";
import Stack from "@mui/material/Stack";
import IconButton from "@mui/material/IconButton";
import Iconify from "../Iconify";

function SocialIconList({ data, dark }) {
  return (
    <Stack direction="row" alignItems="center" spacing={2}>
      {data?.map((social, index) => (
        <IconButton
          key={index}
          aria-label={social?.name}
          aria-controls="menu-appbar"
          aria-haspopup="true"
          size="small"
          onClick={() => window.open(social?.value, "_blank")}
        >
          <Iconify icon={social?.icon} color={dark ? "white" : "black"} size={20} />
        </IconButton>
      ))}
    </Stack>
  );
}

SocialIconList.propTypes = {
  data: PropTypes.array,
  dark: PropTypes.bool,
};

export default SocialIconList;
