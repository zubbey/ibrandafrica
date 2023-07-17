import { useContext, useMemo, useRef } from "react";
import { useSelector } from "react-redux";
import { useTheme } from "@mui/material/styles";
import Container from "@mui/material/Container";
import useMediaQuery from "@mui/material/useMediaQuery";
import Meta from "../../components/meta";
import { AboutHero, HomeHero, ImageHero, VideoHero } from "../../components/hero";
import Section from "../../components/section";
import { MouseContext } from "../../context/mouse";
import { GalleryList, PartnerList, ServiceList } from "../../components/list";
import { ContactUs } from "../../components/forms";

function Home() {
  const theme = useTheme();
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const { services, content, gallery } = useSelector((state) => state);
  const { home, about, service, partners } = content;
  const formRef = useRef(null);
  const sectionRef = useRef(null);

  // const images = useMemo(() => {
  //   let arr = [...gallery];
  //   arr.sort(() => Math.random() - 0.5);
  //   return arr.slice(0, 6);
  // }, [gallery]);

  const isMd = useMediaQuery(theme.breakpoints.up("md"), {
    defaultMatches: true,
  });

  function cursorEnter() {
    cursorTextHandler("");
    cursorVariantHandler("contact");
  }

  function cursorView() {
    cursorTextHandler("View");
    cursorVariantHandler("project");
  }

  function cursorLeave() {
    cursorTextHandler("");
    cursorVariantHandler("default");
  }

  function handleClick() {
    sectionRef.current?.scrollIntoView({ behavior: "smooth" });
  }

  return (
    <Meta title="Home">
      <VideoHero video="/videos/video.mp4" handleClick={handleClick} />
      <Section size={false} background="transparent" elemetRef={sectionRef}>
        {/* <HomeHero
          title={home?.section1?.title}
          desc={home?.section1?.subtitle}
          cursorEnter={cursorEnter}
          cursorLeave={cursorLeave}
          formRef={formRef}
        /> */}
        <ServiceList data={services} cursorEnter={cursorView} cursorLeave={cursorLeave} />
      </Section>

      <Section size="lg">
        <AboutHero
          title={home?.section2?.title}
          desc={home?.section2?.subtitle}
          video={about?.section2?.video}
          overline={home?.section2?.overline}
          cursorEnter={cursorEnter}
          cursorLeave={cursorLeave}
          isMd={isMd}
        />
      </Section>
      <Section padding={2}>
        <GalleryList data={gallery} isMd={isMd} cursorEnter={cursorView} cursorLeave={cursorLeave} />
      </Section>
      <Section padding={8} background="transparent">
        <PartnerList data={partners} title="Our Clients" mdMatch={isMd} />
      </Section>
      <Section>
        <ImageHero
          title={service.section2.title}
          subtitle={service.section2.subtitle}
          image={service.section2.image}
          cursorEnter={cursorEnter}
          cursorLeave={cursorLeave}
          buttonLink="/services"
          buttonText="Request a Quote"
        />
      </Section>
      <Section size="lg" background="#000">
        <ContactUs formRef={formRef} cursorEnter={cursorEnter} cursorLeave={cursorLeave} />
      </Section>
    </Meta>
  );
}

export default Home;
