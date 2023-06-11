import PropTypes from "prop-types";
import { Link as RouterLink } from "react-router-dom";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Stack from "@mui/material/Stack";
import CustomLink from "../link";

const StyledBox = styled(Box)(({ theme }) => ({
  backgroundImage: "url(/images/grid-pattern.svg)",
  backgroundColor: theme.palette.common.black,
  backgroundSize: "cover",
  height: "100%",
}));

function MenuList({ data, setOpen }) {
  return (
    <StyledBox>
      <Stack height={1} justifyContent="center" alignItems="center" spacing={2}>
        {data.map((page, index) => (
          <div key={page.name} data-aos="fade-up" data-aos-delay={`${index}00`} style={{ margin: "20px 0" }}>
            <CustomLink
              component={RouterLink}
              to={page.href}
              target={page.name === "Academy" ? "_blank" : "_self"}
              onClick={() => setOpen(false)}
            >
              {page.name}
            </CustomLink>
          </div>
        ))}
      </Stack>
    </StyledBox>
  );
}

MenuList.propTypes = {
  data: PropTypes.array.isRequired,
  setOpen: PropTypes.func.isRequired,
};

export default MenuList;
