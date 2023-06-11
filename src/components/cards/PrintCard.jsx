import PropTypes from "prop-types";
import { styled } from "@mui/material/styles";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import CardMedia from "@mui/material/CardMedia";
import Typography from "@mui/material/Typography";
import CardActions from "@mui/material/CardActions";
import Button from "@mui/material/Button";

const StyledButton = styled(Button)(({ theme }) => ({
  backgroundColor: theme.palette.common.black,
  color: theme.palette.common.white,
  padding: theme.spacing(1, 2),
  "&:hover": {
    backgroundColor: theme.palette.common.white,
    color: theme.palette.common.black,
  },
}));

function PrintCard({ item, onClick }) {
  return (
    <Card
      data-aos="fade-up"
      sx={{
        "&.MuiCard-root": {
          boxShadow: "0 26px 30px -14px rgb(0 102 245 / 8%) !important",
        },
      }}
    >
      <CardContent>
        <Typography
          gutterBottom
          variant="h5"
          fontWeight="bolder"
          sx={{
            textTransform: "capitalize",
            overflow: "hidden",
            textOverflow: "ellipsis",
            display: "-webkit-box",
            WebkitLineClamp: "2",
            WebkitBoxOrient: "vertical",
          }}
        >
          {item?.name}
        </Typography>
      </CardContent>
      <CardMedia component="img" image={item?.image} alt={item?.name} width={1} />
      <CardActions>
        <StyledButton onClick={onClick}>Request Qoute</StyledButton>
      </CardActions>
    </Card>
  );
}

export default PrintCard;
