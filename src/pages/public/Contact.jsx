import { useContext, useRef, useState } from "react";
import { useSelector } from "react-redux";
import { useTheme } from "@mui/material/styles";
import useMediaQuery from "@mui/material/useMediaQuery";
import Container from "@mui/material/Container";
import Section from "../../components/section";
import Meta from "../../components/meta";
import { HeaderHero } from "../../components/hero";
import { MouseContext } from "../../context/mouse";
import { ContactUs } from "../../components/forms";
import { ContactList } from "../../components/list";

function Contact() {
  const { content } = useSelector((state) => state);
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const { contact } = content;
  const formRef = useRef(null);

  function cursorEnter() {
    cursorTextHandler("");
    cursorVariantHandler("contact");
  }

  function cursorLeave() {
    cursorTextHandler("");
    cursorVariantHandler("default");
  }

  return (
    <Meta title="Contact Us">
      <Section size="xl" background="transparent" padding={10}>
        <HeaderHero title={contact.section1.title} subtitle={contact.section1.subtitle} />
      </Section>
      <Section size="lg" background="transparent">
        <ContactList data={contact} formRef={formRef} cursorEnter={cursorEnter} cursorLeave={cursorLeave} />
      </Section>
    </Meta>
  );
}

export default Contact;
