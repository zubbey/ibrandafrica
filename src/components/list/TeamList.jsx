import PropTypes from "prop-types";
import Stack from "@mui/material/Stack";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import { TeamCard } from "../cards";

TeamList.propTypes = {
  data: PropTypes.array.isRequired,
  title: PropTypes.string,
  subtitle: PropTypes.string,
};

function TeamList({ data, title, subtitle }) {
  return (
    <Stack paddingY={4} alignItems="center">
      <Box
        sx={{
          maxWidth: { xs: "auto", sm: 600 },
          width: "100%",
          textAlign: "center",
          py: 3,
        }}
      >
        <Typography sx={{ fontSize: 48, fontWeight: "bolder" }} gutterBottom>
          {title}
        </Typography>
        <Typography sx={{ fontSize: 16 }}>{subtitle}</Typography>
      </Box>

      <Grid container spacing={{ xs: 2, md: 3 }} columns={{ xs: 4, sm: 6, md: 12 }}>
        {data?.map((item, index) => (
          <Grid item xs={2} sm={3} key={index.toString()}>
            <TeamCard item={item} index={index} />
          </Grid>
        ))}
      </Grid>
    </Stack>
  );
}

export default TeamList;
