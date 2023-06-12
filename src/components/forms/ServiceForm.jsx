import PropTypes from "prop-types";
import * as Yup from "yup";
import { useEffect, useMemo, useState } from "react";
import { useFormik, Form, FormikProvider } from "formik";
import { toast } from "react-toastify";
import emailjs from "emailjs-com";

// MUI
import { styled } from "@mui/material/styles";
import TextField from "@mui/material/TextField";
import LoadingButton from "@mui/lab/LoadingButton";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";
import MenuItem from "@mui/material/MenuItem";
import CircularProgress from "@mui/material/CircularProgress";

import { addDoc, collection, serverTimestamp } from "firebase/firestore";
// Services
import Iconify from "../Iconify";
import { db } from "../../utils/firebase";
import WhiteTextField from "./input/WhiteTextField";

const StyledTitle = styled(Typography)(({ theme }) => ({
  fontSize: 62,
  fontWeight: "bolder",
  lineHeight: 1,
  color: "#FFF",
  [theme.breakpoints.down("md")]: {
    fontSize: 42,
  },
}));

const StyledText = styled(Typography)(({ theme }) => ({
  ...theme.typography.h5,
  color: "rgba(255,255,255,0.7)",
  padding: theme.spacing(2, 0),
}));

const phoneRegExp =
  /^((\\+[1-9]{1,4}[ \\-]*)|(\\([0-9]{2,3}\\)[ \\-]*)|([0-9]{2,4})[ \\-]*)*?[0-9]{3,4}?[ \\-]*[0-9]{3,4}?$/;

const formSchema = Yup.object().shape({
  name: Yup.string().min(3).required("Your fullname is required"),
  emailAddress: Yup.string().email().required("Email Address is required"),
  phoneNumber: Yup.string().matches(phoneRegExp, "Phone number is not valid"),
  category: Yup.string().required("Category is required"),
  service: Yup.string().required("Service is required"),
  message: Yup.string().min(10).required("Project brief is required"),
});

function ServiceForm({ data, selected, cursorEnter, cursorLeave, formRef, onClose }) {
  const [loading, setLoading] = useState(false);
  const [services, setServices] = useState([]);
  const categories = data.map((service) => service.name);

  const formik = useFormik({
    initialValues: {
      name: "",
      emailAddress: "",
      phoneNumber: "",
      category: selected?.category || "",
      service: selected?.service || "",
      message: "",
      type: "service",
    },
    validationSchema: formSchema,
  });

  const { errors, touched, values, getFieldProps, setFieldValue } = formik;

  useEffect(() => {
    if (values.category) {
      setServices(
        data
          .filter((item) => item.name === values.category)
          .map((service) => [...service?.features])
          ?.reduce((a, b) => a?.concat(b), []),
      );
    }
  }, [values.category]);

  const handleSubmit = async (evt) => {
    evt.preventDefault();

    try {
      setLoading(true);
      const docRef = await addDoc(collection(db, "contacts"), {
        ...values,
        createdAt: serverTimestamp(),
      });

      if (docRef.id) {
        const emailResponse = await emailjs.sendForm(
          "services_ibrandafrica",
          "template_v5y5xth",
          evt.target,
          "no8U9yc2BGGT3VXMK",
        );

        console.log("emailResponse", emailResponse);
        toast.success("Thank you for your request. We will get in touch with you shorty!");
        formik.resetForm();
        onClose();
      }
      setLoading(false);
    } catch (error) {
      console.log("err-form", error);
      setLoading(false);
      toast.error(error?.message || "Something went wrong check your connection!");
    }
  };

  return (
    <FormikProvider value={formik}>
      <Form
        ref={formRef}
        autoComplete="off"
        noValidate
        onSubmit={handleSubmit}
        style={{ width: "100%", textAlign: "start" }}
      >
        <Grid container alignItems="end" spacing={{ xs: 1, sm: 2 }} sx={{ p: 2 }}>
          <Grid item xs={12} sm={10}>
            <StyledTitle data-aos="fade-up" data-aos-duration="8000">
              Request a Quote
            </StyledTitle>
            <StyledText data-aos="fade-up" data-aos-delay={100} data-aos-duration="8000">
              What service do you want?
            </StyledText>
            <TextField type="hidden" {...getFieldProps("type")} />
            <WhiteTextField
              fullWidth
              label="What's your name?"
              placeholder="eg: Albert Damilola"
              {...getFieldProps("name")}
              error={Boolean(touched.name && errors.name)}
              helperText={touched.name && errors.name}
              variant="standard"
            />
            <WhiteTextField
              fullWidth
              autoComplete="email-address"
              type="email"
              label="What's your email?"
              placeholder="eg: name@mail.com"
              {...getFieldProps("emailAddress")}
              error={Boolean(touched.emailAddress && errors.emailAddress)}
              helperText={touched.emailAddress && errors.emailAddress}
              variant="standard"
            />
            <WhiteTextField
              fullWidth
              label="What's your mobile number?"
              placeholder="eg: +2349090339090"
              {...getFieldProps("phoneNumber")}
              error={Boolean(touched.phoneNumber && errors.phoneNumber)}
              helperText={touched.phoneNumber && errors.phoneNumber}
              variant="standard"
            />
            <WhiteTextField
              select
              fullWidth
              variant="standard"
              label="Select Category"
              {...getFieldProps("category")}
              onChange={(e) => setFieldValue("category", e.target.value)}
              error={Boolean(touched.category && errors.category)}
              helperText={touched.category && errors.category}
              SelectProps={{
                MenuProps: {
                  PaperProps: {
                    sx: {
                      bgcolor: "rgba(0,0,0,.85)",
                      backdropFilter: "saturate(180%) blur(10px)",
                    },
                  },
                },
              }}
            >
              {categories.map((value) => (
                <MenuItem key={value} value={value}>
                  <Typography variant="body1" color="neutral.main">
                    {value}
                  </Typography>
                </MenuItem>
              ))}
            </WhiteTextField>

            {services?.length && (
              <WhiteTextField
                select
                fullWidth
                variant="standard"
                label="Select Service"
                {...getFieldProps("service")}
                onChange={(e) => setFieldValue("service", e.target.value)}
                error={Boolean(touched.service && errors.service)}
                helperText={touched.service && errors.service}
                SelectProps={{
                  MenuProps: {
                    PaperProps: {
                      sx: {
                        bgcolor: "rgba(0,0,0,.85)",
                        backdropFilter: "saturate(180%) blur(10px)",
                      },
                    },
                  },
                }}
              >
                {services.map((value) => (
                  <MenuItem key={value.title} value={value.title}>
                    <Typography variant="body1" color="neutral.main">
                      {value.title}
                    </Typography>
                  </MenuItem>
                ))}
              </WhiteTextField>
            )}

            <WhiteTextField
              fullWidth
              label="Tell us briefly about your project"
              multiline
              rows={2}
              {...getFieldProps("message")}
              error={Boolean(touched.message && errors.message)}
              helperText={touched.message && errors.message}
              variant="standard"
            />
          </Grid>
          <Grid item xs={12} sm={2}>
            <div onMouseEnter={cursorEnter} onMouseLeave={cursorLeave}>
              <LoadingButton
                size="large"
                type="submit"
                variant="text"
                loading={loading}
                endIcon={<Iconify icon="maki:arrow" />}
                sx={{ mt: 2, color: "white", fontSize: 32 }}
                loadingIndicator={<CircularProgress sx={{ color: "#FFF" }} />}
              >
                Send
              </LoadingButton>
            </div>
          </Grid>
        </Grid>
      </Form>
    </FormikProvider>
  );
}

ServiceForm.propTypes = {
  data: PropTypes.array,
  cursorEnter: PropTypes.func,
  cursorLeave: PropTypes.func,
};

export default ServiceForm;
