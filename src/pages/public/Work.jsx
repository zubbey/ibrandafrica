import { useContext } from "react";
import { noCase } from "change-case";
import { Link as RouterLink, useParams, useNavigate, useLocation } from "react-router-dom";

import { useTheme } from "@mui/material/styles";
import useMediaQuery from "@mui/material/useMediaQuery";
import Typography from "@mui/material/Typography";
import Breadcrumbs from "@mui/material/Breadcrumbs";
import Link from "@mui/material/Link";
import Meta from "../../components/meta";
import { MouseContext } from "../../context/mouse";
import { sanitizeText } from "../../utils";
import { GalleryList, WorkInfoList } from "../../components/list";
import { HeaderHero } from "../../components/hero";
import Section from "../../components/section";
import Iconify from "../../components/Iconify";
import { fDateTime } from "../../utils/formatTime";

function Work() {
  const theme = useTheme();
  const { slug } = useParams();
  const { state, search } = useLocation();
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const images = state?.images?.length ? state?.images?.map((item) => ({ caption: state?.title, image: item })) : [];

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
      <Section padding={5}>
        <GalleryList data={images} isMd={isMd} cursorEnter={cursorView} cursorLeave={cursorLeave} />
      </Section>
    </Meta>
  );
}

export default Work;
