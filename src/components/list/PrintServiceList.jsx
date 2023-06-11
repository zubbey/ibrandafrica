import { useEffect, useState } from "react";
import { styled } from "@mui/material/styles";
import Grid from "@mui/material/Grid";
import Tabs from "@mui/material/Tabs";
import Tab from "@mui/material/Tab";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import { PrintCard } from "../cards";

const StyledTitle = styled(Typography)(({ theme }) => ({
  fontSize: 62,
  fontWeight: "bolder",
  lineHeight: 1,
  margin: theme.spacing(4, 0),
  [theme.breakpoints.down("md")]: {
    fontSize: 42,
  },
}));

const StyledTab = styled((props) => <Tab disableRipple {...props} />)(({ theme }) => ({
  ...theme.typography.h6,
  textTransform: "capitalize",
  backgroundColor: "#FFF",
  "&.Mui-selected": {
    color: "#000",
  },
  "&.Mui-focusVisible": {
    backgroundColor: "rgba(100, 95, 228, 0.32)",
  },
}));

function PrintServiceList({ title, data, handleSelected }) {
  const [tab, setTab] = useState(0);
  const [filtedData, setFiltedData] = useState([]);

  const categories = [...new Set(data.map((item) => item.category))];

  useEffect(() => {
    onFilter(data[0].category);
  }, []);

  const handleChange = (event, newValue) => {
    onFilter(event.target.innerText);
    setTab(newValue);
  };

  const onFilter = (value) => {
    setFiltedData(data.filter((item) => item.category.toLowerCase() === value.toLowerCase()));
  };

  return (
    <Box>
      <StyledTitle data-aos="fade-up" data-aos-duration="1000">
        {title}
      </StyledTitle>
      <Tabs
        value={tab}
        onChange={handleChange}
        variant="scrollable"
        scrollButtons="auto"
        aria-label="scrollable auto tabs example"
        sx={{
          borderRadius: 2,
          mb: 4,
        }}
      >
        {categories?.length && categories?.map((category, catIndex) => <StyledTab key={catIndex} label={category} />)}
      </Tabs>
      <Grid container spacing={4}>
        {filtedData.map((item, index) => (
          <Grid key={index} item xs={6} sm={4}>
            <PrintCard item={item} onClick={() => handleSelected(item)} />
          </Grid>
        ))}
      </Grid>
    </Box>
  );
}

export default PrintServiceList;
