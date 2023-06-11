import PropTypes from "prop-types";
import { useEffect, useRef } from "react";
import LoadingBar from "react-top-loading-bar";

function Preloader({ loading }) {
  const loadRef = useRef(null);

  useEffect(() => {
    loadRef.current?.continuousStart();
  }, []);

  useEffect(() => {
    if (!loading) {
      loadRef.current?.complete();
    }
  }, [loading]);

  return <LoadingBar color="#3B429F" ref={loadRef} />;
}

export default Preloader;

Preloader.defaultProps = {
  loading: false,
};

Preloader.propTypes = {
  loading: PropTypes.bool,
};
