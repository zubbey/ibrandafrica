import PropTypes from "prop-types";
import { useEffect, useMemo, useState } from "react";
import { useNavigate } from "react-router-dom";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import Tabs from "@mui/material/Tabs";
import Tab from "@mui/material/Tab";
import { textToSlug } from "../../utils";

const Image = styled("img")(({ theme }) => ({
  width: "100%",
  height: 400,
  objectFit: "cover",
  backgroundColor: theme.palette.primary.main,
  borderRadius: theme.spacing(1),
  [theme.breakpoints.down("sm")]: {
    height: 200,
  },
}));

const StyledChip = styled("div")({
  padding: 10,
  borderRadius: 20,
  backgroundColor: "#000",
  position: "relative",
  display: "inline-flex",
});

const StyledTab = styled((props) => <Tab disableRipple {...props} />)(({ theme }) => ({
  ...theme.typography.h6,
  width: "100%",
  borderRadius: 8,
  textTransform: "capitalize",
  border: "1px solid rgba(0,0,0,0.5)",
  color: "#000000",
  "&.Mui-selected": {
    color: "#FFFFFF",
    backgroundColor: "#000000",
  },
  [theme.breakpoints.down("md")]: {
    width: "auto",
    fontSize: 10,
  },
}));

function WorkList({ data }) {
  const [tab, setTab] = useState(0);
  const [filteredData, setFilteredData] = useState([]);
  const categories = useMemo(() => (data?.length ? data?.map((item) => item.name) : []), [data]);
  const navigate = useNavigate();

  useEffect(() => {
    if (data?.length) {
      onFilter(data[0].name);
    }
  }, [data]);

  const handleRoute = (job, service) => {
    const slug = textToSlug(job.title);
    navigate(`/works/${slug}`, { replace: true, state: { ...job, name: service.name } });
  };

  const handleChange = (event, newValue) => {
    onFilter(event.target.innerText);
    setTab(newValue);
  };

  const onFilter = (value) => {
    const filtered = data.filter((item) => item.name.toLowerCase() === value.toLowerCase());
    setFilteredData(filtered);
  };

  return (
    <div>
      <Tabs
        value={tab}
        onChange={handleChange}
        variant="scrollable"
        scrollButtons="auto"
        aria-label="scrollable auto tabs example"
        sx={{
          mb: 8,
          justifyContent: "space-between",
        }}
      >
        {categories?.map((category, catIndex) => (
          <StyledTab key={catIndex} label={category} />
        ))}
      </Tabs>

      {filteredData.map((service, index) => (
        <Box key={index} sx={{ mb: 10 }}>
          <Box sx={{ width: { xs: "100%", sm: "50%" } }}>
            <Typography variant="h4" fontWeight="bolder" data-aos="fade-up" data-aos-duration="1000" sx={{ mb: 1 }}>
              {service?.title}
            </Typography>
            <Typography
              variant="body1"
              fontWeight="light"
              color="text-secondary"
              data-aos="fade-up"
              data-aos-duration="1100"
              sx={{ mt: 2, mb: 4, fontSize: 18 }}
            >
              {service?.desc}
            </Typography>
          </Box>
          <Grid container spacing={4}>
            {service.jobs.map((job, jobIndex) => (
              <Grid item xs={6} sm={4} key={jobIndex}>
                <Image
                  src={job.images[0]}
                  alt="..."
                  data-aos="fade-up"
                  data-aos-delay={`1${jobIndex}0`}
                  data-aos-duration="1000"
                  onClick={() => handleRoute(job, service)}
                />
              </Grid>
            ))}
          </Grid>
        </Box>
      ))}
    </div>
  );
}

export default WorkList;
