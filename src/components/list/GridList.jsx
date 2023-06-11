import PropTypes from "prop-types";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import Iconify from "../Iconify";

function GridList({ data, grid }) {
  return (
    <Grid container spacing={4}>
      {data.map((item, index) => (
        <Grid
          item
          xs={grid.xs}
          sm={grid.sm}
          key={index.toString()}
          data-aos="fade-up"
          data-delay={`1${index}0`}
          data-aos-duration="1000"
        >
          <Iconify
            icon={item.icon}
            size={50}
            sx={{ color: "inherit", backgroundColor: "#FFF", padding: 1, borderRadius: 20 }}
          />
          <Typography variant="h4" fontWeight="bolder" color="neutral.main" sx={{ my: 2 }}>
            {item.title}
          </Typography>
          <Typography variant="body1" fontWeight="light" color="neutral.main" sx={{ fontSize: 18 }}>
            {item.subtitle}
          </Typography>
        </Grid>
      ))}
    </Grid>
  );
}

GridList.defaultProps = {
  grid: {
    sm: 6,
    xs: 12,
  },
};

GridList.propTypes = {
  data: PropTypes.array.isRequired,
  grid: PropTypes.object,
};

export default GridList;
