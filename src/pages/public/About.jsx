import { useContext, useMemo } from "react";
import { useSelector } from "react-redux";
import { useTheme } from "@mui/material/styles";
import useMediaQuery from "@mui/material/useMediaQuery";
import Container from "@mui/material/Container";
import Section from "../../components/section";
import Meta from "../../components/meta";
import TeamList from "../../components/list/TeamList";
import { AboutHero, HeaderHero } from "../../components/hero";
import { GalleryList, GridList } from "../../components/list";
import { MouseContext } from "../../context/mouse";

function About() {
  const theme = useTheme();
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const { content, gallery } = useSelector((state) => state);
  const { about } = content;

  const images = useMemo(() => {
    let arr = [...gallery];
    arr.sort(() => Math.random() - 0.5);
    return arr.slice(0, 6);
  }, [gallery]);

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
    <Meta title="About Us">
      <Section size="xl" background="transparent" padding={8}>
        <HeaderHero title={about.section1.title} subtitle={about.section1.subtitle} />
      </Section>
      <Section>
        <AboutHero
          title={about?.section2?.title}
          desc={about?.section2?.subtitle}
          video={about?.section2?.video}
          layout={2}
          isMd={isMd}
        />
      </Section>
      <Section padding={2}>
        <GalleryList data={images} isMd={isMd} cursorEnter={cursorView} cursorLeave={cursorLeave} />
      </Section>
      <Section size="lg">
        <TeamList data={about.section3.team} title={about.section3.title} subtitle={about.section3.subtitle} />
      </Section>
      <Section size="lg" background="transparent">
        <GridList data={about?.section4?.list} grid={{ xs: 12, sm: 4 }} />
      </Section>
    </Meta>
  );
}

export default About;
