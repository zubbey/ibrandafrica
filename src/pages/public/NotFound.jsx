import { Link as RouterLink } from "react-router-dom";
// @mui
import { styled } from "@mui/material/styles";
import Container from "@mui/material/Container";
import Button from "@mui/material/Button";
// components
import Meta from "../../components/meta";
import Empty from "../../components/empty";
import Section from "../../components/section";
// ----------------------------------------------------------------------

const ContentStyle = styled("div")(() => ({
  display: "flex",
  flexDirection: "column",
  justifyContent: "center",
  alignItems: "center",
  margin: "auto",
  textAlign: "center",
  marginBottom: 20,
}));

function NotFound() {
  return (
    <Meta title="Page Not Found">
      <Section background="transparent">
        <ContentStyle>
          <Empty
            text="The page you're looking for does not exist!"
            imgSx={{ height: 300 }}
            textSx={{ color: "#FFF" }}
          />
          <Button variant="contained" to="/" size="large" component={RouterLink}>
            Back to Home
          </Button>
        </ContentStyle>
      </Section>
    </Meta>
  );
}

export default NotFound;
