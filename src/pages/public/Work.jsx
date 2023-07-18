import { useContext, useEffect, useMemo, useState } from "react";
import { noCase } from "change-case";
import { Link as RouterLink, useParams, useLocation, useNavigate } from "react-router-dom";
import { useSelector } from "react-redux";

import { styled, useTheme } from "@mui/material/styles";
import Button from "@mui/material/Button";
import useMediaQuery from "@mui/material/useMediaQuery";
import Typography from "@mui/material/Typography";
import Breadcrumbs from "@mui/material/Breadcrumbs";
import Link from "@mui/material/Link";
import Box from "@mui/material/Box";
import Meta from "../../components/meta";
import { MouseContext } from "../../context/mouse";
import { sanitizeText, textToSlug } from "../../utils";
import { GalleryList, WorkInfoList } from "../../components/list";
import { HeaderHero } from "../../components/hero";
import Section from "../../components/section";
import Iconify from "../../components/Iconify";

const Title = styled(Typography)(({ theme }) => ({
  color: theme.palette.secondary.main,
  fontSize: 75,
  fontWeight: "bolder",
  textAlign: "center",
  [theme.breakpoints.down("sm")]: {
    fontSize: 32,
  },
}));

const StyledBox = styled(Box)(({ theme }) => ({
  display: "flex",
  flexDirection: "column",
  alignItems: "center",
  justifyContent: "center",
}));

const Next = ({ services, currentJob, navigate }) => {
  const [nextServiceIndex, setNextServiceIndex] = useState(0);
  const [nextJob, setNextJob] = useState(null);
  const [isLast, setIsLast] = useState(false);

  useEffect(() => {
    getNext();
  }, [currentJob, services]);

  function getNext() {
    let jobIndex;
    let nextItem;
    services.forEach((service, sIndex) => {
      jobIndex = service.jobs.findIndex((x) => x.title === currentJob.title);
      if (jobIndex >= 0 && jobIndex < service.jobs.length - 1) {
        nextItem = service.jobs[jobIndex + 1];
        setNextJob(nextItem);
        setNextServiceIndex(sIndex);
      }
    });

    if (!nextItem) {
      setIsLast(true);
    }
  }

  const handleRoute = () => {
    if (nextJob) {
      const slug = textToSlug(nextJob.title);
      navigate(`/works/${slug}`, { replace: true, state: { ...nextJob, name: services[nextServiceIndex].name } });
    }
  };

  return isLast ? (
    <StyledBox>
      <Typography fontWeight="bold" color="white">
        Other Case Study
      </Typography>
      <Button
        variant="outlined"
        color="secondary"
        sx={{ paddingRight: 5, paddingLeft: 5, fontSize: 16, marginTop: 5, color: "white" }}
        component={RouterLink}
        to="/works"
      >
        View more
      </Button>
    </StyledBox>
  ) : (
    <StyledBox>
      <Typography fontWeight="bold" color="white">
        Up Next
      </Typography>
      <Title>{nextJob?.title}</Title>
      <Typography variant="h4" fontStyle="italic" color="white">
        {nextJob?.industry}
      </Typography>
      <Button
        onClick={handleRoute}
        variant="outlined"
        color="secondary"
        sx={{ paddingRight: 5, paddingLeft: 5, fontSize: 16, marginTop: 5, color: "white" }}
      >
        View
      </Button>
    </StyledBox>
  );
};

function Work() {
  const theme = useTheme();
  const { slug } = useParams();
  const { state, search } = useLocation();
  const services = useSelector((state) => state.services);
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const images = state?.images?.length ? state?.images?.map((item) => ({ caption: state?.title, image: item })) : [];
  const navigate = useNavigate();
  const query = noCase(sanitizeText(slug));

  const isMd = useMediaQuery(theme.breakpoints.up("md"), {
    defaultMatches: true,
  });

  function cursorView() {
    cursorTextHandler("View");
    cursorVariantHandler("project");
  }

  function cursorLeave() {
    cursorTextHandler("");
    cursorVariantHandler("default");
  }

  return (
    <Meta title={query}>
      <Section size="xl" image={state?.image} background="transparent">
        <HeaderHero
          title={state?.title}
          // subtitle={state.desc}
          // overline={state.category}
          buttonLink={state?.link}
          buttonText="View Project"
          isExternalLink
        />
      </Section>
      <Section padding={5}>
        <Breadcrumbs
          aria-label="breadcrumb"
          separator={<Iconify icon="material-symbols:navigate-next" />}
          sx={{ my: 4 }}
        >
          <Link component={RouterLink} underline="hover" color="primary" to="/">
            Home
          </Link>
          <Link component={RouterLink} underline="hover" color="primary" to="/works">
            Case Study
          </Link>
          <Link component={RouterLink} underline="hover" color="primary" to={`/works?q=${state?.name}`}>
            {state?.name}
          </Link>
          <Typography fontWeight="bolder">{query}</Typography>
        </Breadcrumbs>

        {state && <WorkInfoList data={state} />}
      </Section>
      <Section size={null} background="#000000">
        <GalleryList data={images} col={1} cursorEnter={cursorView} cursorLeave={cursorLeave} />
      </Section>

      <Section background="#000000">
        <Next services={services} currentJob={state} navigate={navigate} />
      </Section>
    </Meta>
  );
}

export default Work;
