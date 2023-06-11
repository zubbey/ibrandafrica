import { useContext, useRef, useState } from "react";
import { useSelector } from "react-redux";
import { useTheme } from "@mui/material/styles";
import useMediaQuery from "@mui/material/useMediaQuery";
import Container from "@mui/material/Container";
import Section from "../../components/section";
import Meta from "../../components/meta";
import { HeaderHero, ImageHero } from "../../components/hero";
import { AccordionList } from "../../components/list";
import { ServiceForm } from "../../components/forms";
import { MouseContext } from "../../context/mouse";
import { CustomModal } from "../../components/modal";

function Services() {
  const theme = useTheme();
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const [openFrom, setOpenFrom] = useState(false);
  const [selected, setSelected] = useState(null);
  const { content, services } = useSelector((state) => state);
  const formRef = useRef(null);
  const { service } = content;

  const isMd = useMediaQuery(theme.breakpoints.up("md"), {
    defaultMatches: true,
  });

  const handleSelected = (data) => {
    setSelected(data);
    setOpenFrom(true);
  };

  function cursorEnter() {
    cursorTextHandler("");
    cursorVariantHandler("contact");
  }

  function cursorLeave() {
    cursorTextHandler("");
    cursorVariantHandler("default");
  }

  return (
    <Meta title="Our Services">
      <CustomModal open={openFrom} setOpen={setOpenFrom} background modalSize="md">
        <ServiceForm
          data={services}
          selected={selected}
          formRef={formRef}
          cursorEnter={cursorEnter}
          cursorLeave={cursorLeave}
          onClose={() => setOpenFrom(false)}
        />
      </CustomModal>
      <Section padding={8} background="transparent">
        <HeaderHero
          title={service.section1.title}
          subtitle={service.section1.subtitle}
          buttonText="Request A Quote"
          buttonAction={() => setOpenFrom(true)}
        />
      </Section>
      <Section>
        <ImageHero title={service.section2.title} subtitle={service.section2.subtitle} image={service.section2.image} />
      </Section>
      <Section background="#000">
        <AccordionList data={services} handleSelected={handleSelected} isMd={isMd} />
      </Section>
    </Meta>
  );
}

export default Services;
