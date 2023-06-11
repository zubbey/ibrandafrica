import PropTypes from "prop-types";
import { Navigate, useRoutes } from "react-router-dom";

// COMPONENTS
import { AuthLayout, PrivateLayout, PublicLayout } from "../layouts";
import {
  About,
  Blog,
  Blogs,
  Consultation,
  Contact,
  Home,
  NotFound,
  Print,
  Services,
  Work,
  Works,
} from "../pages/public";

// import ProtectedRoute from "./ProtectedRoute";

Router.propTypes = {
  loading: PropTypes.bool.isRequired,
};

export default function Router({ loading, auth, profile }) {
  // const isAdmin = Boolean(profile?.admin);

  return useRoutes([
    {
      path: "/",
      element: <PublicLayout loading={loading} auth={auth} profile={profile} />,
      children: [
        { path: "/", element: <Home />, index: true },
        { path: "about", element: <About /> },
        { path: "works", element: <Works /> },
        { path: "works/:slug", element: <Work /> },
        { path: "services", element: <Services /> },
        { path: "blogs", element: <Blogs /> },
        { path: "blogs/:slug", element: <Blog /> },
        { path: "consultation", element: <Consultation /> },
        { path: "print", element: <Print /> },
        { path: "contact", element: <Contact /> },
        { path: "404", element: <NotFound /> },
        { path: "*", element: <Navigate to="/404" /> },
      ],
    },
    // {
    //   path: "admin", // check if user is isAdmin
    //   element:
    //     auth && isAdmin ? (
    //       <PrivateLayout profile={profile} loading={loading} userType="admin" />
    //     ) : (
    //       <AuthLayout loading={loading} userType="admin" />
    //     ),
    //   children: [
    //     {
    //       element: <Navigate to={auth && isAdmin ? "/admin/overview" : "/account/login"} />,
    //       index: true,
    //     }
    //   ],
    // },
    {
      path: "*",
      element: <Navigate to="/404" replace />,
    },
  ]);
}
