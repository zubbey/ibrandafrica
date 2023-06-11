import PropTypes from "prop-types";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import Avatar from "@mui/material/Avatar";
import Typography from "@mui/material/Typography";

function TeamCard({ item, index }) {
  return (
    <Card
      data-aos="fade-up"
      data-aos-delay={`${index + 1}00`}
      sx={{
        "&.MuiCard-root": {
          boxShadow: "none !important",
        },
      }}
    >
      <CardContent
        sx={{
          display: "flex",
          flexDirection: "column",
          alignItems: "center",
          textAlign: "center",
        }}
      >
        <Avatar src={item?.photoUrl} alt={item?.firstName} sx={{ my: 2, width: 150, height: 150 }} />
        <Typography
          variant="h6"
          sx={{ fontWeight: "bolder", lineHeight: 1.2 }}
        >{`${item?.firstName} ${item?.lastName}`}</Typography>
        <Typography variant="caption">{item?.position}</Typography>
      </CardContent>
    </Card>
  );
}

TeamCard.propTypes = {
  item: PropTypes.shape({
    firstName: PropTypes.string,
    lastName: PropTypes.string,
    photoUrl: PropTypes.string,
    position: PropTypes.string,
  }),
  index: PropTypes.number,
};

export default TeamCard;
