import PropTypes from "prop-types";
import Grid from "@mui/material/Grid";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import Skeleton from "@mui/material/Skeleton";

PostSkeleton.propTypes = {
  horizontal: PropTypes.bool,
  dark: PropTypes.bool,
  height: PropTypes.number,
};

PostSkeleton.defaultProps = {
  horizontal: false,
  dark: false,
};

export default function PostSkeleton({ horizontal, height, dark }) {
  const bgcolor = dark ? "rgba(255, 255, 255, 0.11)" : "rgba(0, 0, 0, 0.11)";
  if (horizontal) {
    return (
      <Grid spacing={4} container>
        <Grid xs={4} item>
          <Skeleton sx={{ height: 100, bgcolor }} animation="wave" variant="rectangular" />
        </Grid>
        <Grid xs={8} item>
          <Skeleton sx={{ bgcolor }} animation="wave" height={20} width="100%" />
          <Skeleton sx={{ bgcolor }} animation="wave" height={20} width="100%" />
          <Skeleton sx={{ bgcolor }} animation="wave" height={20} width="20%" />
        </Grid>
      </Grid>
    );
  }

  return (
    <Card sx={{ m: 2, bgcolor: "transparent" }}>
      <Skeleton sx={{ height: height || 190, bgcolor }} animation="wave" variant="rectangular" />
      <CardContent>
        <Skeleton sx={{ bgcolor }} animation="wave" height={20} width="100%" />
        <Skeleton sx={{ bgcolor }} animation="wave" height={20} width="20%" />
      </CardContent>
    </Card>
  );
}
