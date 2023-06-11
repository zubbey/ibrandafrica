import { noCase } from "change-case";
import { useEffect, useState } from "react";
import { Link as RouterLink, useParams, useLocation } from "react-router-dom";

// MUI
import { useTheme } from "@mui/material/styles";
import Container from "@mui/material/Container";
import Box from "@mui/material/Box";
import Stack from "@mui/material/Stack";
import Typography from "@mui/material/Typography";
import Avatar from "@mui/material/Avatar";
import Breadcrumbs from "@mui/material/Breadcrumbs";
import Link from "@mui/material/Link";
import sanitizeText from "../../utils/sanitizeText";
import Meta from "../../components/meta";
import Iconify from "../../components/Iconify";
import { DetailSkeleton } from "../../components/animation";
import { fDateTime } from "../../utils/formatTime";
import CustomHtml from "../../components/html";
import { SocialButton } from "../../components/buttons";
import { useFirebaseGetDoc } from "../../hooks";
import Section from "../../components/section";
import { HeaderHero } from "../../components/hero";

const socials = [
  {
    name: "facebook",
    icon: "fe:facebook",
    color: "#3b5998",
    caption: "Share on Facebook",
  },
  {
    name: "twitter",
    icon: "fe:twitter",
    color: "#00aced",
    caption: "Tweet this Product",
  },
  {
    name: "linkedin",
    icon: "mdi:linkedin",
    color: "#047fb1",
    caption: "Share on Linkedin",
  },
  {
    name: "whatsapp",
    icon: "ph:whatsapp-logo-fill",
    color: "#23d466",
    caption: "Share on Whatsapp",
  },
];

function Blog() {
  const theme = useTheme();
  const { slug } = useParams();
  const { state } = useLocation();
  const { data: blog, isLoading } = useFirebaseGetDoc("blogs", slug, "slug");
  const [data, setData] = useState(state || null);

  const query = noCase(sanitizeText(slug));

  useEffect(() => {
    window.scrollTo({ top: 0, behavior: "smooth" });
    if (state || blog) {
      setData(state || blog);
    }
  }, [slug, blog]);

  const handleLink = (link) => {
    window.open(link, "_blank");
  };

  return (
    <Meta title={query} description={data?.category} image={data?.thumbnail}>
      <Container maxWidth="xl" sx={{ py: 2 }}>
        <HeaderHero title={data?.title} overline={data?.category} />
      </Container>
      <Section maxWidth="lg" sx={{ pt: 15 }}>
        <Breadcrumbs
          aria-label="breadcrumb"
          separator={<Iconify icon="material-symbols:navigate-next" />}
          sx={{
            my: 4,
          }}
        >
          <Link component={RouterLink} underline="hover" color="primary" to="/">
            Home
          </Link>
          <Link component={RouterLink} underline="hover" color="primary" to={`/blogs?q=${data?.category}`}>
            {data?.category}
          </Link>
          <Typography fontWeight="bolder">{query}</Typography>
        </Breadcrumbs>

        <Box sx={{ my: 5 }}>
          <Box component="article" itemScope itemType="http://schema.org/Article" sx={{ overflow: "auto" }}>
            {isLoading || !data ? (
              <DetailSkeleton />
            ) : (
              <Box>
                <Box sx={{ my: 4 }}>
                  <Stack direction="row" alignItems="center" spacing={1}>
                    {socials.map((social, index) => (
                      <SocialButton
                        key={index}
                        image={data?.thumbnail}
                        title={data?.title}
                        subtitle={data?.subtitle}
                        {...social}
                      />
                    ))}
                  </Stack>
                </Box>
                <Box
                  width={1}
                  component="img"
                  src={data?.thumbnail}
                  loading="lazy"
                  alt="..."
                  sx={{
                    objectFit: "cover",
                    borderRadius: 1,
                  }}
                />
                <Stack direction="row" alignItems="center" justifyContent="space-between" sx={{ my: 5 }}>
                  <Stack direction="row" alignItems="center" spacing={3}>
                    <Stack
                      onClick={() => handleLink(data?.author?.link)}
                      direction="row"
                      alignItems="center"
                      spacing={1}
                    >
                      <Avatar
                        src={data?.author?.photoUrl}
                        alt={data?.author?.name}
                        sx={{ bgcolor: "primary.main", color: "white" }}
                      />
                      <Typography
                        variant="body2"
                        color="text.secondary"
                        sx={{
                          fontWeight: "bolder",
                          "&:hover": {
                            color: "primary.main",
                          },
                        }}
                      >
                        {data?.author?.name}
                      </Typography>
                    </Stack>
                    <Typography
                      variant="caption"
                      sx={{
                        p: 1,
                        bgcolor: "secondary.lighter",
                        color: "secondary.dark",
                        fontWeight: "600",
                      }}
                    >
                      {data?.category}
                    </Typography>
                  </Stack>
                  <Typography variant="body2" color="text.secondary">
                    {fDateTime(data?.createdAt)}
                  </Typography>
                </Stack>
                <CustomHtml html={data?.desc} theme={theme} />
              </Box>
            )}
          </Box>
        </Box>
      </Section>
    </Meta>
  );
}

export default Blog;
