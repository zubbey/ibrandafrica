import { useContext, useRef, useState } from "react";
import { useSelector } from "react-redux";
import { useTheme } from "@mui/material/styles";
import useMediaQuery from "@mui/material/useMediaQuery";
import Section from "../../components/section";
import Meta from "../../components/meta";
import { PrintHero } from "../../components/hero";
import { MouseContext } from "../../context/mouse";
import { PrintServiceList } from "../../components/list";
import { CustomModal } from "../../components/modal";
import { PrintForm } from "../../components/forms";

function Print() {
  const theme = useTheme();
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const { content } = useSelector((state) => state);
  const [openFrom, setOpenFrom] = useState(false);
  const [selected, setSelected] = useState(null);
  const formRef = useRef(null);
  const { print } = content;

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

  const isMd = useMediaQuery(theme.breakpoints.up("md"), {
    defaultMatches: true,
  });

  return (
    <Meta title="Ibrand Print">
      <CustomModal open={openFrom} setOpen={setOpenFrom} background modalSize="md">
        <PrintForm
          data={print?.section2?.list}
          selected={selected}
          formRef={formRef}
          cursorEnter={cursorEnter}
          cursorLeave={cursorLeave}
          onClose={() => setOpenFrom(false)}
        />
      </CustomModal>
      <PrintHero data={print.section1.list} isMd={isMd} />
      <Section background="#f4f8fc" padding={8}>
        {print?.section2?.list?.length && (
          <PrintServiceList data={print?.section2?.list} title={print.section2.title} handleSelected={handleSelected} />
        )}
      </Section>
    </Meta>
  );
}

export default Print;
