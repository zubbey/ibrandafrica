import PropTypes from "prop-types";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import ListItemText from "@mui/material/ListItemText";
import { fDateTime } from "../../utils/formatTime";

const ignores = ["name", "category", "image", "images", "link"];

function WorkInfoList({ data }) {
  const list = Object.keys(data);

  const changeKey = (keyName) => {
    switch (keyName) {
      case "title":
        return "Client";
      case "desc":
        return "About";
      default:
        return keyName.replace("_", " ");
    }
  };

  return (
    <Grid container spacing={2}>
      {list.map((dataKey, keyIndex) => {
        const value = data[dataKey];

        if (ignores.includes(dataKey)) {
          return <div key={keyIndex} />;
        }

        return (
          <Grid key={keyIndex} item xs={12} sm={6}>
            <Typography variant="h6" textTransform="uppercase" fontWeight="bolder">
              {changeKey(dataKey)}
            </Typography>
            {dataKey === "services_rendered" ? (
              <List>
                {value.map((item, serviceIndex) => (
                  <ListItem key={serviceIndex} sx={{ py: 0 }}>
                    <ListItemText primary={item} />
                  </ListItem>
                ))}
              </List>
            ) : dataKey === "date" ? (
              <Typography variant="body1" fontWeight="lighter">
                {fDateTime(value)}
              </Typography>
            ) : (
              <Typography variant="body1" fontWeight="lighter">
                {value}
              </Typography>
            )}
          </Grid>
        );
      })}
    </Grid>
  );
}

WorkInfoList.propTypes = {
  data: PropTypes.object,
};

export default WorkInfoList;
