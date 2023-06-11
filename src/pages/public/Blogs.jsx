import { useEffect, useMemo, useRef, useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
// import { useBottomScrollListener } from "react-bottom-scroll-listener";

// MUI
import { useTheme } from "@mui/material/styles";
import useMediaQuery from "@mui/material/useMediaQuery";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Container from "@mui/material/Container";
import Typography from "@mui/material/Typography";
import IconButton from "@mui/material/IconButton";
import LoadingButton from "@mui/lab/LoadingButton";

// COMPONENT
import { BlogList, GroupBlogList, SideList } from "../../components/list";
import { HeaderHero } from "../../components/hero";
import { SearchForm } from "../../components/forms";
import Meta from "../../components/meta";
import Iconify from "../../components/Iconify";
import Empty from "../../components/empty";
import Section from "../../components/section";
import { uniqueById } from "../../utils";
import useFirebasePaginate from "../../hooks/useFirebasePaginate";

const LIMIT = 20;

function Blogs() {
  const theme = useTheme();
  const navigate = useNavigate();
  const dispatch = useDispatch();
  const { search, pathname } = useLocation();
  const resultRef = useRef(null);
  const { content } = useSelector((state) => state);

  const [keyword, setKeyword] = useState("");
  const [filteredData, setFilteredData] = useState([]);

  const { results, isLoading, onPaginate, onSearch, snap, error, hasNext } = useFirebasePaginate("/blogs", LIMIT);

  const isEmpty = snap?.size === 0;
  const socials = content.contact.socials;
  const categories = useMemo(() => [...new Set(results)]?.map((item) => item?.category), [results]);

  const query = new URLSearchParams(search).get("q");
  const latestPost = useMemo(() => filteredData?.slice(0, 4) || [], [results, filteredData]);
  const allOtherPost = useMemo(() => filteredData?.slice(4) || [], [results, filteredData]);
  const searchMode = useMemo(() => Boolean(query), [query]);
  const isCategory = useMemo(() => categories?.some((cat) => cat === (query || keyword)), [categories, query, keyword]);

  const isMd = useMediaQuery(theme.breakpoints.up("md"), {
    defaultMatches: true,
  });

  useEffect(() => {
    if (results?.length) {
      setFilteredData((prevData) => uniqueById([...prevData, ...results]));
      if (searchMode) {
        resultRef.current?.scrollIntoView({ behavior: "smooth" });
      }
    }
    // console.log("error", error);
  }, [results, error, isLoading]);

  useEffect(() => {
    if (query) {
      setFilteredData([]);
      if (isCategory) {
        onSearch(query, "category");
      } else {
        onSearch(query, "title");
      }
    }
  }, [query, pathname]);

  const handleSelected = (data) => {
    navigate(`/blogs/${data.slug}`, { replace: true, state: data });
  };

  const handleSearch = (value) => {
    let search;
    if (value === query) {
      navigate(0);
    }

    if (typeof value === "string") {
      search = value;
    } else {
      search = keyword;
    }
    navigate(`/blogs?q=${search}`, { replace: true });
    setKeyword("");
  };

  return (
    <Meta title="Blogs">
      <Container maxWidth="xl" sx={{ py: 2 }}>
        <HeaderHero title="Blogs" />
      </Container>
      <Section padding={4}>
        <Typography variant="h5" fontWeight="900" paddingY={3}>
          {query || "Latest Post"}
        </Typography>
        {query ? (
          <Grid container spacing={3}>
            <Grid xs={12} sm={10} item>
              <SearchForm
                keyword={keyword}
                setKeyword={setKeyword}
                placeholder="Search post"
                customComponent={
                  <IconButton
                    onClick={handleSearch}
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

              {!results.length ? (
                <Box sx={{ mt: 8 }}>
                  <Empty text="No result found" />
                </Box>
              ) : (
                <Box ref={resultRef} sx={{ mt: 5 }}>
                  <BlogList data={filteredData} loading={isLoading} handleSelected={handleSelected} horizontal />
                </Box>
              )}

              {searchMode && isEmpty ? (
                <Typography variant="subtitle2" color="text.secondary">
                  That's all forks
                </Typography>
              ) : null}

              {searchMode && !results.length ? (
                <Box sx={{ py: 8 }}>
                  <Typography variant="h5" fontWeight="900" paddingY={3}>
                    You may also like
                  </Typography>
                  <BlogList data={filteredData} loading={isLoading} handleSelected={handleSelected} />
                </Box>
              ) : null}
            </Grid>
            <Grid xs={12} sm={2} item>
              <Box
                sx={{
                  position: "sticky",
                  top: 200,
                  alignSelf: "start",
                  display: { xs: "none", sm: "block" },
                }}
              >
                <SideList categories={categories} social={socials} onClick={handleSearch} />
              </Box>
            </Grid>
          </Grid>
        ) : (
          <GroupBlogList data={latestPost} loading={isLoading} handleSelected={handleSelected} />
        )}

        <Box sx={{ py: 8 }}>
          {!searchMode ? <BlogList data={allOtherPost} loading={isLoading} handleSelected={handleSelected} /> : null}
        </Box>
        {hasNext && (
          <Box
            sx={{
              mt: 2,
              width: "100%",
            }}
          >
            <LoadingButton loading={isLoading} disabled={isLoading} variant="contained" onClick={onPaginate}>
              Load More
            </LoadingButton>
          </Box>
        )}
      </Section>
    </Meta>
  );
}

export default Blogs;
