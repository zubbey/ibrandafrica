import { useEffect, useMemo, useState } from "react";
import Grow from "@mui/material/Grow";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Stack from "@mui/material/Stack";
import Typography from "@mui/material/Typography";
import Button from "@mui/material/Button";
import Tabs from "@mui/material/Tabs";
import Tab from "@mui/material/Tab";

import Iconify from "../Iconify";

const StackButton = styled(Stack)(({ theme }) => ({
  padding: theme.spacing(5, 0),
  borderBottomWidth: 1,
  borderBottomColor: "rgba(255,255,255,0.3)",
  borderStyle: "solid",
  transition: theme.transitions.create(["opacity", "transform"], {
    duration: theme.transitions.duration.standard,
  }),
  "&:hover": {
    transform: "scale(0.99)",
  },
  [theme.breakpoints.down("md")]: {
    flexWrap: "wrap",
  },
}));

const Icon = styled(Iconify)(({ theme }) => ({
  color: "rgba(255,255,255,0.3)",
  transition: theme.transitions.create(["transform", "color"], {
    duration: theme.transitions.duration.standard,
  }),
  "&.active": {
    transform: "rotate(90deg)",
    color: "#FFF",
  },
}));

const Dot = styled("span")(({ theme }) => ({
  ...theme.typography.h2,
  fontWeight: "bolder",
  color: theme.palette.secondary.main,
}));

const Title = styled(Typography)(({ theme }) => ({
  ...theme.typography.h3,
  fontWeight: "bolder",
  color: "rgba(255,255,255,0.3)",
  transition: theme.transitions.create(["color", "font-size"], {
    duration: theme.transitions.duration.standard,
  }),
  "&.active": {
    color: "#FFF",
    fontSize: theme.typography.h1.fontSize,
  },
}));

const StyledTab = styled((props) => <Tab disableRipple {...props} />)(({ theme }) => ({
  ...theme.typography.h6,
  width: "100%",
  borderRadius: 8,
  textTransform: "capitalize",
  border: "1px solid rgba(255,255,255,0.5)",
  color: "#FFFFFF",
  "&.Mui-selected": {
    color: "#000",
    backgroundColor: "#FFF",
  },
  [theme.breakpoints.down("md")]: {
    width: "auto",
    fontSize: 10,
  },
}));

const StyledDescBox = styled(Box)(({ theme }) => ({
  display: "none",
  transition: theme.transitions.create(["display"], {
    duration: theme.transitions.duration.standard,
  }),
  "&.active": {
    display: "block",
  },
}));

const TextButton = styled(Button)({
  color: "#FFF",
  padding: "10px 0",
  fontSize: 18,
});

const GrowContent = ({ open, desc, handleSelected, ...props }) => (
  <Grow in={open} style={{ transformOrigin: "0 0 0" }} {...(open ? { timeout: 1000 } : {})}>
    <StyledDescBox className={open ? "active" : ""} {...props}>
      <Typography color="neutral.main" variant="body2">
        {desc}
      </Typography>
      <TextButton onClick={handleSelected} variant="text" endIcon={<Iconify icon="maki:arrow" />}>
        Request a Quote
      </TextButton>
    </StyledDescBox>
  </Grow>
);

function AccordionList({ data, isMd, handleSelected }) {
  const [tab, setTab] = useState(0);
  const [filteredData, setFilteredData] = useState([]);
  const categories = useMemo(() => (data?.length ? data?.map((item) => item.name) : []), [data]);

  const [expanded, setExpanded] = useState("panel_Marketing_0");
  const isActive = (value) => Boolean(expanded === value);

  useEffect(() => {
    if (data?.length) {
      onFilter(data[0].name);
    }
  }, []);

  const handleChange = (event, newValue) => {
    onFilter(event.target.innerText);
    setTab(newValue);
  };

  const onFilter = (value) => {
    const filtered = data.filter((item) => item.name.toLowerCase() === value.toLowerCase());
    setFilteredData(filtered);

    if (filtered?.length) {
      setExpanded(`panel_${value}_0`);
    }
  };

  return (
    <Box>
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
        TabScrollButtonProps={{
          style: {
            color: "#FFFF",
          },
        }}
      >
        {categories?.map((category, catIndex) => (
          <StyledTab key={catIndex} label={category} />
        ))}
      </Tabs>
      {filteredData.map((service, index) => (
        <Box key={service?.id || index.toString()}>
          {service?.features?.length
            ? service?.features?.map((feature, fIndex) => (
                <StackButton
                  key={fIndex.toString()}
                  direction="row"
                  justifyContent="space-between"
                  alignItems="center"
                  onClick={() => setExpanded(`panel_${service?.name}_${fIndex}`)}
                >
                  <Title className={isActive(`panel_${service?.name}_${fIndex}`) ? "active" : ""}>
                    {feature.title}
                    {isActive(`panel_${service?.name}_${fIndex}`) && <Dot>.</Dot>}
                  </Title>
                  {isMd && (
                    <GrowContent
                      open={isActive(`panel_${service?.name}_${fIndex}`)}
                      desc={feature.desc}
                      handleSelected={() => handleSelected({ category: service?.name, service: feature.title })}
                      sx={{ px: 5 }}
                    />
                  )}
                  <Icon
                    icon="ei:arrow-right"
                    className={isActive(`panel_${service?.name}_${fIndex}`) ? "active" : ""}
                    size={isMd ? 80 : 54}
                  />
                  {!isMd && (
                    <GrowContent
                      open={isActive(`panel_${service?.name}_${fIndex}`)}
                      desc={feature.desc}
                      handleSelected={() => handleSelected({ category: service?.name, service: feature.title })}
                      sx={{ px: 0 }}
                    />
                  )}
                </StackButton>
              ))
            : null}
        </Box>
      ))}
    </Box>
  );
}

export default AccordionList;
