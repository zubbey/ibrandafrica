import PropTypes from "prop-types";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import IconButton from "@mui/material/IconButton";
import Container from "@mui/material/Container";
import Iconify from "../Iconify";

function MiniFooter({ data, dark }) {
  const year = new Date().getFullYear();

  return (
    <Container maxWidth="lg">
      <Box
        display={"flex"}
        justifyContent={"space-between"}
        alignItems={"center"}
        width={1}
        paddingY={5}
        flexDirection={{ xs: "column", sm: "row" }}
      >
        <Typography variant={"body2"} color="white" gutterBottom>
          &copy; {year} {import.meta.env.VITE_SITE_NAME} | All Rights Reserved
        </Typography>
        <Box>
          {data?.map((social, index) => (
            <IconButton
              key={index}
              aria-label={social?.name}
              aria-controls="menu-appbar"
              aria-haspopup="true"
              size="small"
              onClick={() => window.open(social?.value, "_blank")}
            >
              <Iconify icon={social?.icon} color="white" size={20} />
            </IconButton>
          ))}
        </Box>
      </Box>
    </Container>
  );
}

export default MiniFooter;

MiniFooter.propTypes = {
  data: PropTypes.array,
};
