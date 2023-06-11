import PropTypes from "prop-types";
import { useNavigate } from "react-router-dom";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import { textToSlug } from "../../utils";

const Image = styled("img")(({ theme }) => ({
  width: "100%",
  height: 400,
  objectFit: "cover",
  backgroundColor: theme.palette.primary.main,
  borderRadius: theme.spacing(1),
  [theme.breakpoints.down("sm")]: {
    height: 200,
  },
}));

const StyledChip = styled("div")({
  padding: 10,
  borderRadius: 20,
  backgroundColor: "#000",
  position: "relative",
  display: "inline-flex",
});

function WorkList({ data }) {
  const navigate = useNavigate();

  const handleRoute = (job, service) => {
    const slug = textToSlug(job.title);
    navigate(`/works/${slug}`, { replace: true, state: { ...job, name: service.name } });
  };

  return (
    <div>
      {data.map((service, index) => (
        <Box key={index} sx={{ mb: 10 }}>
          <Box sx={{ width: { xs: "100%", sm: "50%" } }}>
            <StyledChip data-aos="fade-up">
              <Typography variant="overline" color="neutral.main" sx={{ fontSize: 14, px: 1 }}>
                {service.name}
              </Typography>
            </StyledChip>
            <Typography variant="h4" fontWeight="bolder" data-aos="fade-up" data-aos-duration="1000" sx={{ mb: 1 }}>
              {service?.title}
            </Typography>
            <Typography
              variant="body1"
              fontWeight="light"
              color="text-secondary"
              data-aos="fade-up"
              data-aos-duration="1100"
              sx={{ mt: 2, mb: 4, fontSize: 18 }}
            >
              {service?.desc}
            </Typography>
          </Box>
          <Grid container spacing={4}>
            {service.jobs.map((job, jobIndex) => (
              <Grid item xs={6} sm={4} key={jobIndex}>
                <Image
                  src={job.images[0]}
                  alt="..."
                  data-aos="fade-up"
                  data-aos-delay={`1${jobIndex}0`}
                  data-aos-duration="1000"
                  onClick={() => handleRoute(job, service)}
                />
              </Grid>
            ))}
          </Grid>
        </Box>
      ))}
    </div>
  );
}

export default WorkList;
