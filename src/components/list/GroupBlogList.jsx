import PropTypes from "prop-types";
import Grid from "@mui/material/Grid";
import { PostSkeleton } from "../animation";
import { BlogCard } from "../cards";

function GroupBlogList({ data, loading, handleSelected }) {
  const firstItem = data[0];
  const restItems = data?.slice(1);

  const height = 400;
  const smallHeight = height / restItems?.length + 30;

  return (
    <Grid spacing={3} container>
      <Grid xs={12} sm={6} item>
        {loading || !data.length ? (
          <PostSkeleton height={height} />
        ) : (
          <BlogCard item={firstItem} height={height} onClick={handleSelected} fontSize={28} />
        )}
      </Grid>
      <Grid xs={12} sm={6} item container>
        {loading || !data.length
          ? Array.from(Array(3)).map((_, index) => (
              <Grid xs={12} key={index} item>
                <PostSkeleton height={smallHeight} horizontal />
              </Grid>
            ))
          : restItems?.map((item, index) => (
              <Grid xs={12} key={index} item>
                <BlogCard item={item} height={smallHeight} onClick={handleSelected} fontSize={18} horizontal />
              </Grid>
            ))}
      </Grid>
    </Grid>
  );
}

export default GroupBlogList;

GroupBlogList.defaultProps = {
  data: [],
  loading: true,
};

GroupBlogList.propTypes = {
  data: PropTypes.array,
  loading: PropTypes.bool,
  handleSelected: PropTypes.func,
};
