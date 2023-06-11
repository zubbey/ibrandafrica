import { forwardRef, Fragment } from "react";
import PropTypes from "prop-types";
import { Helmet } from "react-helmet-async";
import { motion } from "framer-motion";

const Meta = forwardRef(({ children, title, description, image, sx }, ref) => (
  <>
    <Helmet>
      <title>{`IBrand Africa ™ | ${title}`}</title>
      <meta name="description" content={description} />
      {/* Facebook tags */}
      <meta property="og:type" content="article" />
      <meta property="og:title" content={title} />
      <meta property="og:description" content={description} />
      <meta property="og:image" content={image} />
      {/* Twitter tags */}
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:title" content={title} />
      <meta name="twitter:image" content={image} />
      <meta name="twitter:description" content={description} />
    </Helmet>
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0, transition: { duration: 0.5, ease: "easeOut" } }}
      style={{ height: "100%", ...sx }}
      ref={ref}
    >
      {children}
    </motion.div>
  </>
));

Meta.displayName = "meta";

Meta.defaultProps = {
  title: "IBrand Africa ™",
  description:
    "We are a result-oriented team of professionals dedicated to executing every task with precision, excellence and style.",
  image: "/icon.svg",
  sx: {},
};

Meta.propTypes = {
  children: PropTypes.node.isRequired,
  title: PropTypes.string,
  description: PropTypes.string,
  image: PropTypes.string,
  sx: PropTypes.object,
};

export default Meta;
