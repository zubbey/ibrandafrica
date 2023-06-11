import { useContext, useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { useLocation, useNavigate } from "react-router-dom";
import FuzzySearch from "fuzzy-search";
import Container from "@mui/material/Container";
import IconButton from "@mui/material/IconButton";
import Section from "../../components/section";
import Meta from "../../components/meta";
import { HeaderHero, ImageHero } from "../../components/hero";
import { MouseContext } from "../../context/mouse";
import WorkList from "../../components/list/WorkList";
import { SearchForm } from "../../components/forms";
import Iconify from "../../components/Iconify";
import Empty from "../../components/empty";

function Works() {
  const { search, pathname } = useLocation();
  const query = new URLSearchParams(search).get("q");
  const [keyword, setKeyword] = useState(query || "");
  const [filteredData, setFilteredData] = useState([]);
  const { cursorTextHandler, cursorVariantHandler } = useContext(MouseContext);
  const { content, services } = useSelector((state) => state);
  const { work, service } = content;

  useEffect(() => {
    if (keyword) {
      onSearch(keyword);
    } else {
      setFilteredData(sortData(services));
    }
  }, [keyword, services]);

  const sortData = (arr) => {
    const cloneArr = [...arr];
    return cloneArr.sort((a, b) => a.name.localeCompare(b.name));
  };

  const onSearch = (queryKeyword) => {
    const searcher = new FuzzySearch(services, ["name", "title"], {
      caseSensitive: false,
    });
    const result = searcher.search(keyword || queryKeyword);
    setFilteredData(sortData(result));
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
    <Meta title="Our Works">
      <Section padding={5} size="lg" background="transparent">
        <HeaderHero title={work.section1.title} subtitle={work.section1.subtitle} />
        <SearchForm
          keyword={keyword}
          setKeyword={setKeyword}
          placeholder="What are you looking for?"
          customComponent={
            <IconButton
              onClick={onSearch}
              color="primary"
              aria-label="search"
              sx={{
                bgcolor: "primary.main",
                "&:hover": {
                  bgcolor: "primary.dark",
                },
              }}
            >
              <Iconify icon="material-symbols:search-rounded" sx={{ color: "white" }} />
            </IconButton>
          }
        />
      </Section>
      <Section padding={5}>
        {filteredData.length ? <WorkList data={filteredData} /> : <Empty text="No result found" />}
      </Section>
      <Section padding={8} background="transparent">
        <ImageHero
          title={service.section2.title}
          subtitle={service.section2.subtitle}
          image={service.section2.image}
          cursorEnter={cursorEnter}
          cursorLeave={cursorLeave}
          buttonLink="/services"
          buttonText="Request a Quote"
          dark
        />
      </Section>
    </Meta>
  );
}

export default Works;
