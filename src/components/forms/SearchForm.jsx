import PropTypes from "prop-types";
import Paper from "@mui/material/Paper";
import InputBase from "@mui/material/InputBase";
import Button from "@mui/material/Button";
import IconButton from "@mui/material/IconButton";

import Iconify from "../Iconify";

function SearchForm({ keyword, setKeyword, placeholder, buttonText, icon, handleAction, customComponent }) {
  const handleClearFilter = () => {
    setKeyword("");
  };

  const handleSearchSubmit = (e) => {
    e.preventDefault();
  };

  return (
    <Paper
      component="form"
      onSubmit={handleSearchSubmit}
      sx={{
        p: 2,
        display: "flex",
        alignItems: "center",
        width: "100%",
        borderRadius: 2,
        "&.MuiPaper-root": {
          m: 0,
        },
      }}
    >
      <Iconify icon="material-symbols:search-rounded" />
      <InputBase
        sx={{ ml: 1, flex: 1 }}
        placeholder={placeholder}
        inputProps={{ "aria-label": "search" }}
        value={keyword}
        onChange={(e) => setKeyword(e.target.value)}
      />
      {keyword.length ? (
        <IconButton onClick={handleClearFilter}>
          <Iconify icon="material-symbols:close" />
        </IconButton>
      ) : null}
      {customComponent || null}
      {buttonText ? (
        <Button variant="contained" onClick={handleAction} endIcon={icon ? <Iconify icon={icon} /> : null}>
          {buttonText}
        </Button>
      ) : null}
    </Paper>
  );
}

export default SearchForm;

SearchForm.propTypes = {
  keyword: PropTypes.string.isRequired,
  setKeyword: PropTypes.func.isRequired,
  placeholder: PropTypes.string.isRequired,
  buttonText: PropTypes.string,
  icon: PropTypes.string,
  handleAction: PropTypes.func,
  customComponent: PropTypes.node,
};
