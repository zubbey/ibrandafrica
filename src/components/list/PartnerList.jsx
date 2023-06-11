import PropTypes from "prop-types";
import { styled } from "@mui/material/styles";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";
import Box from "@mui/material/Box";
import Slider from "../slider";

const StyledTitle = styled(Typography)(({ theme }) => ({
  fontSize: 62,
  fontWeight: "bolder",
  lineHeight: 1,
  color: "#FFF",
  [theme.breakpoints.down("md")]: {
    fontSize: 42,
  },
}));

function PartnerList({ data, title, mdMatch }) {
  return (
    <Grid alignItems="center" spacing={3} container>
      <Grid item xs={12} sm={4}>
        <StyledTitle data-aos="fade-right" textAlign={mdMatch ? "start" : "center"}>
          {title}
        </StyledTitle>
      </Grid>
      <Grid item xs={12} sm={8}>
        <Slider items={data} showDots={false} perView={mdMatch ? 3 : 2} sx={{ boxShadow: "none" }} autoPlay>
          {({ index, item }) => (
            <Box
              component="img"
              src={item}
              alt="Client"
              data-aos="fade-up"
              data-aos-delay={`${index + 1}00`}
              sx={{ width: "100%", height: "200px !important", objectFit: "contain !important" }}
            />
          )}
        </Slider>
      </Grid>
    </Grid>
  );
}

PartnerList.propTypes = {
  title: PropTypes.string,
  data: PropTypes.array,
  mdMatch: PropTypes.bool,
};

export default PartnerList;
