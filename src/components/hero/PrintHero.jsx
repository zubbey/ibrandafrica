import PropTypes from "prop-types";
import { useNavigate } from "react-router-dom";
import { SplitText } from "@cyriacbr/react-split-text";
import { styled } from "@mui/material/styles";
import Container from "@mui/material/Container";
import Grid from "@mui/material/Grid";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import Button from "@mui/material/Button";
import Slider from "../slider";

const StyledTitle = styled(Typography)(({ theme }) => ({
  fontWeight: "bolder",
  fontSize: 74,
  color: "white",
  textTransform: "capitalize",
  lineHeight: 1,
  [theme.breakpoints.down("md")]: {
    fontSize: 48,
    textAlign: "center",
  },
}));

const StyledDesc = styled(Typography)(({ theme }) => ({
  fontSize: 24,
  color: "white",
  fontWeight: 100,
  padding: theme.spacing(5, 0),
  [theme.breakpoints.down("md")]: {
    fontSize: 16,
    padding: theme.spacing(2, 0),
    textAlign: "center",
  },
}));

const WordWrapper = ({ children, wordIndex }) => (
  <span
    data-aos="fade-up"
    data-aos-delay={`1${wordIndex}0`}
    data-aos-duration="1000"
    style={{ whiteSpace: "pre", display: "inline-block" }}
  >
    <StyledTitle>{children}</StyledTitle>
  </span>
);

function PrintHero({ data, isMd }) {
  if (!data?.length) {
    return null;
  }
  return (
    <Slider items={data} showDots showArrows perView={1} sx={{ boxShadow: "none" }} autoPlay>
      {({ index, item }) => (
        <Box sx={{ py: { xs: 12, sm: 8 }, backgroundColor: item?.color }}>
          <Container maxWidth="xl">
            <Grid container alignItems="center" spacing={4}>
              <Grid item xs={12} sm={6}>
                <SplitText WordWrapper={WordWrapper} style={{ textAlign: isMd ? "start" : "center" }}>
                  {item?.title}
                </SplitText>
                <StyledDesc data-aos="fade-up" data-aos-delay={150} data-aos-duration="1400">
                  {item?.subtitle}
                </StyledDesc>
              </Grid>
              <Grid item xs={12} sm={6}>
                <Box
                  component="img"
                  src={item?.image}
                  alt="..."
                  sx={{ width: "100%", height: { xs: 300, sm: 600 }, objectFit: "contain !important" }}
                />
              </Grid>
            </Grid>
          </Container>
        </Box>
      )}
    </Slider>
  );
}

export default PrintHero;
