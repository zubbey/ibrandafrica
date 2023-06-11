import PropTypes from "prop-types";
import { Navigate } from "react-router-dom";

function ProtectedRoute({ auth, isAdmin, name, Component }) {
  switch (name) {
    case "/account/auth":
      if (isAdmin) {
        return <Navigate to="/admin" />;
      }
      if (auth && !isAdmin) {
        return <Navigate to="/account/dashboard" />;
      }
      return <Component />;
    case "/account/dashboard":
      if (isAdmin) {
        return <Navigate to="/admin" />;
      }
      if (!auth) {
        return <Navigate to="/account/login" />;
      }
      return <Component />;

    case "/admin/auth":
      if (auth && isAdmin) {
        return <Navigate to="/admin/overview" />;
      }
      return <Component />;
    case "/admin/dashboard":
      if (!auth) {
        return <Navigate to="/admin/login" />;
      }
      return <Component />;
    default:
      return null;
  }
}

export default ProtectedRoute;

ProtectedRoute.defaultProps = {
  isAdmin: false,
};

ProtectedRoute.propTypes = {
  auth: PropTypes.any,
  isAdmin: PropTypes.bool,
  name: PropTypes.string.isRequired,
  Component: PropTypes.func,
};
