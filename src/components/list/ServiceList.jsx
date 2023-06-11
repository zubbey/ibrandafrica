import PropTypes from "prop-types";
import { useNavigate } from "react-router-dom";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import Carousel from "react-material-ui-carousel";

const StyledGrid = styled(Grid)(({ theme }) => ({
  position: "relative",
  alignItems: "center",
  textAlign: "center",
}));

const Image = styled("img")(({ theme }) => ({
  width: "100%",
  height: 400,
  objectFit: "cover",
  marginTop: 30,
  backgroundColor: theme.palette.primary.main,
  borderRadius: theme.spacing(1),
  [theme.breakpoints.down("sm")]: {
    height: 200,
  },
}));

const StyledText = styled(Typography)(({ theme }) => ({
  ...theme.typography.h3,
  position: "absolute",
  margin: "auto",
  right: 0,
  left: 20,
  color: "black",
  zIndex: 99,
  textShadow: " -1px -1px 0 #FFF, 1px -1px 0 #FFF, -1px 1px 0 #FFF, 1px 1px 0 #FFF",
}));

function ServiceList({ data, cursorEnter, cursorLeave }) {
  const navigate = useNavigate();

  const marginSize = (index) => {
    if (index % 2) {
      return 10;
    }

    return 0;
  };

  const handleRoute = (service) => {
    navigate(`/works?q=${service.name}`, { replace: true, state: service });
  };

  return (
    <Grid container spacing={4}>
      {data.map((service, index) => {
        const interval = Math.floor(Math.random() * 8000) + 6000;
        const jobIndex = Math.floor(Math.random() * service.jobs.length);

        return (
          <StyledGrid
            item
            xs={6}
            sm={3}
            key={service.name}
            sx={{ marginTop: marginSize(index) }}
            onMouseEnter={cursorEnter}
            onMouseLeave={cursorLeave}
            data-aos="fade-up"
            data-aos-delay={`1${index}0`}
            data-aos-duration="1400"
          >
            <Typography variant="h5" color="#FFFFFF" sx={{ mb: 1 }}>
              {service.name}
            </Typography>
            <StyledText>{`0${index + 1}`}</StyledText>
            <Carousel duration={600} interval={interval} indicators={false}>
              {service.jobs[jobIndex].images.map((image, imgIndex) => (
                <Image key={imgIndex} src={image} alt="..." onClick={() => handleRoute(service)} />
              ))}
            </Carousel>
          </StyledGrid>
        );
      })}
    </Grid>
  );
}

ServiceList.propTypes = {
  data: PropTypes.array.isRequired,
  cursorEnter: PropTypes.func,
  cursorLeave: PropTypes.func,
};

export default ServiceList;
