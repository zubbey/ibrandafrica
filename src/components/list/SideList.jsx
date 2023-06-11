import PropTypes from "prop-types";
import Grid from "@mui/material/Grid";
import Paper from "@mui/material/Paper";
import Typography from "@mui/material/Typography";
import Link from "@mui/material/Link";
import Iconify from "../Iconify";

function SideList(props) {
  const { categories, social, onClick } = props;

  return (
    <Grid item xs={12}>
      <Paper sx={{ mb: 4, p: 2 }}>
        <Typography variant="h6" gutterBottom>
          Categories
        </Typography>
        {categories?.map((category, index) => (
          <Typography
            key={index}
            onClick={() => onClick(category)}
            variant="body1"
            textTransform="capitalize"
            sx={{
              py: 1,
              cursor: "pointer",
              "&:hover": {
                color: "secondary.main",
              },
            }}
          >
            {category}
          </Typography>
        ))}
      </Paper>

      <Paper sx={{ p: 2 }}>
        <Typography variant="h6" gutterBottom sx={{ mt: 3 }}>
          Social
        </Typography>
        {social?.map((social, index) => (
          <Link
            key={index}
            display="flex"
            variant="body1"
            sx={{ py: 1, flexDirection: "row" }}
            underline="hover"
            color="text.primary"
            textTransform="capitalize"
            onClick={() => window.open(social?.value, "_blank")}
          >
            <Iconify icon={social?.icon} size={20} />
            <Typography variant="body1" sx={{ pl: 1 }}>
              {social.name}
            </Typography>
          </Link>
        ))}
      </Paper>
    </Grid>
  );
}

SideList.propTypes = {
  categories: PropTypes.array,
  social: PropTypes.arrayOf(
    PropTypes.shape({
      icon: PropTypes.elementType,
      name: PropTypes.string,
    }),
  ).isRequired,
  onClick: PropTypes.func,
};

export default SideList;
