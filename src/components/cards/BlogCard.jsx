import PropTypes from "prop-types";
import Box from "@mui/material/Box";
import Stack from "@mui/material/Stack";
import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import CardMedia from "@mui/material/CardMedia";
import Typography from "@mui/material/Typography";
import CardActions from "@mui/material/CardActions";
import IconButton from "@mui/material/IconButton";
import Iconify from "../Iconify";
import { fDate } from "../../utils/formatTime";

const Content = ({ title, category, createdAt, fontSize, horizontal }) => (
  <CardContent
    sx={{
      height: horizontal ? "100%" : "auto",
      p: horizontal ? 0 : 2,
      display: "flex",
      flexDirection: "column",
      "&.MuiCardContent-root:last-child": {
        paddingBottom: horizontal ? "0 !important" : 2,
      },
    }}
  >
    <Box
      sx={{
        flexGrow: 1,
      }}
    >
      <Typography
        gutterBottom
        variant="body1"
        fontWeight="bolder"
        component="h1"
        sx={{
          fontSize: { xs: fontSize - 3, sm: fontSize },
          textTransform: "capitalize",
          overflow: "hidden",
          textOverflow: "ellipsis",
          display: "-webkit-box",
          WebkitLineClamp: "2",
          WebkitBoxOrient: "vertical",
        }}
      >
        {title}
      </Typography>
    </Box>
    <Stack
      direction={{ xs: "column", sm: "row" }}
      alignItems={{ xs: "start", sm: "center" }}
      justifyContent="space-between"
    >
      <Typography
        variant="caption"
        sx={{
          p: { xs: 0.2, sm: 1 },
          bgcolor: "secondary.lighter",
          color: "secondary.dark",
          fontWeight: "600",
        }}
      >
        {category}
      </Typography>
      <Typography variant="body2" color="text.secondary">
        {fDate(createdAt)}
      </Typography>
    </Stack>
  </CardContent>
);

function BlogCard({ item, index, height, fontSize, horizontal, admin, onClick }) {
  const handleClick = () => {
    if (!admin) {
      onClick(item);
    }
  };
  if (horizontal) {
    return (
      <Card
        onClick={handleClick}
        // data-aos="fade-up"
        // data-aos-delay={`1${index}0`}
        // data-aos-offset="50"
        sx={{
          "&.MuiCard-root": {
            boxShadow: "0 26px 30px -14px rgb(0 102 245 / 8%) !important",
          },
          display: "flex",
          // height: '100%',
          borderRadius: 2,
          cursor: "pointer",
          my: 1.5,
        }}
      >
        <Box sx={{ display: "flex", flexDirection: "column", p: 2 }}>
          <Content
            title={item?.title}
            category={item?.category}
            createdAt={item?.createdAt}
            fontSize={fontSize}
            horizontal
          />
        </Box>
        <CardMedia
          component="img"
          image={item?.thumbnail}
          alt={item?.title}
          height={height || 140}
          width={1}
          sx={{
            maxWidth: 200,
          }}
        />
      </Card>
    );
  }

  return (
    <Card
      onClick={handleClick}
      // data-aos="fade-up"
      // data-aos-delay={`${index}00`}
      sx={{
        "&.MuiCard-root": {
          boxShadow: "0 26px 30px -14px rgb(0 102 245 / 8%) !important",
        },
        height: "100%",
        borderRadius: 2,
        cursor: "pointer",
      }}
    >
      <CardMedia image={item?.thumbnail} title={item?.title} sx={{ height: height || 140 }} />
      <Content title={item?.title} category={item?.category} createdAt={item?.createdAt} fontSize={fontSize} />
      {admin && (
        <CardActions>
          <IconButton onClick={() => onClick(item, "view")}>
            <Iconify icon="mdi:eye-outline" />
          </IconButton>
          <IconButton onClick={() => onClick(item, "edit")}>
            <Iconify icon="ri:quill-pen-line" />
          </IconButton>
          <IconButton color="error" onClick={() => onClick(item, "delete")}>
            <Iconify icon="material-symbols:delete-forever-outline-sharp" />
          </IconButton>
        </CardActions>
      )}
    </Card>
  );
}

BlogCard.defaultProps = {
  horizontal: false,
  height: null,
  fontSize: 18,
  admin: false,
};

BlogCard.propTypes = {
  item: PropTypes.shape({
    title: PropTypes.string,
    category: PropTypes.string,
    thumbnail: PropTypes.string,
    createdAt: PropTypes.any,
  }),
  index: PropTypes.number,
  horizontal: PropTypes.bool,
  admin: PropTypes.bool,
  height: PropTypes.number,
  fontSize: PropTypes.number,
  onClick: PropTypes.func,
};

export default BlogCard;
