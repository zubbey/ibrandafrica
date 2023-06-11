import { useContext, useMemo, useRef } from "react";
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
import { ContactUs } from "../../components/forms";

function Consultation() {
  const formRef = useRef(null);
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const { content, services } = useSelector((state) => state);
  const { consultation } = content;

  function cursorEnter() {
    cursorTextHandler("");
    cursorVariantHandler("contact");
  }

  function cursorLeave() {
    cursorTextHandler("");
    cursorVariantHandler("default");
  }

  return (
    <Meta title="Free Consultation">
      <Section size="lg" background="transparent">
        <HeaderHero title={consultation.section1.title} subtitle={consultation.section1.subtitle} />
        <ContactUs formRef={formRef} cursorEnter={cursorEnter} cursorLeave={cursorLeave} formOnly />
      </Section>
    </Meta>
  );
}

export default Consultation;
