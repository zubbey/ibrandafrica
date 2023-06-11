import PropTypes from "prop-types";
import Grid from "@mui/material/Grid";
import { BlogCard } from "../cards";
import { PostSkeleton } from "../animation";

BlogList.propTypes = {
  data: PropTypes.array,
  loading: PropTypes.bool,
  handleSelected: PropTypes.func,
  admin: PropTypes.bool,
};

BlogList.defaultProps = {
  admin: false,
};

function BlogList({ data, loading, admin, handleSelected }) {
  return (
    <Grid container spacing={{ xs: 2, md: 3 }} columns={{ xs: 4, sm: 8, md: 12 }}>
      {loading || !data.length
        ? Array.from(Array(3)).map((_, index) => (
            <Grid item xs={2} sm={4} key={index.toString()}>
              <PostSkeleton />
            </Grid>
          ))
        : data?.map((item, index) => (
            <Grid item xs={2} sm={4} key={index.toString()}>
              <BlogCard item={item} index={index} onClick={handleSelected} admin={admin} />
            </Grid>
          ))}
    </Grid>
  );
}

export default BlogList;
