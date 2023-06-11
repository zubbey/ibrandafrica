import PropTypes from "prop-types";
import parse, { attributesToProps, domToReact } from "html-react-parser";

function CustomHtml({ html, theme }) {
  if (!html) {
    return <div />;
  }

  const htmlOptions = {
    replace: ({ name, attribs, children }) => {
      const htmlProps = attributesToProps(attribs);

      if (name === "img" || attribs?.src === "src") {
        return <img alt="..." {...htmlProps} height="auto" style={{ width: "100%", objectFit: "contain" }} />;
      }

      if (name === "p") {
        return (
          <p {...htmlProps} style={{ textAlign: "justify", marginBottom: 20 }}>
            {domToReact(children)}
          </p>
        );
      }

      if (name === "a") {
        return (
          <a {...htmlProps} className="link" style={{ color: theme.palette.primary.main }}>
            {domToReact(children)}
          </a>
        );
      }

      if (name === "iframe") {
        // eslint-disable-next-line jsx-a11y/iframe-has-title
        return (
          <iframe title={name} {...htmlProps} style={{ width: "100%", height: "100%", minHeight: 500 }}>
            {domToReact(children)}
          </iframe>
        );
      }

      // return;
    },
  };

  return parse(html, htmlOptions);
}

export default CustomHtml;

CustomHtml.propTypes = {
  html: PropTypes.string,
  theme: PropTypes.object.isRequired,
};
