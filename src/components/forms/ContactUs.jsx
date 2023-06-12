import PropTypes from "prop-types";
import * as Yup from "yup";
import { useState } from "react";
import { useFormik, Form, FormikProvider } from "formik";
import { toast } from "react-toastify";
// import { useSelector } from "react-redux";
import dayjs from "dayjs";
import emailjs from "emailjs-com";

// MUI
import { styled } from "@mui/material/styles";
import TextField from "@mui/material/TextField";
import LoadingButton from "@mui/lab/LoadingButton";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";
import Button from "@mui/material/Button";
import CircularProgress from "@mui/material/CircularProgress";

import { addDoc, collection, serverTimestamp } from "firebase/firestore";
// Services
import Iconify from "../Iconify";
import { db } from "../../utils/firebase";
import { CalenderPicker } from "../modal";
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

const StyledInputButton = styled(Button)(({ theme }) => ({
  width: "100%",
  height: 64,
  borderBottom: "solid 1px rgba(255,255,255,0.20)",
  borderRadius: 0,
  textAlign: "left",
  justifyContent: "flex-start",
  color: "#FFF",
  fontWeight: "normal",
  padding: "5px 0",
  margin: "20px 0",
}));

const phoneRegExp =
  /^((\\+[1-9]{1,4}[ \\-]*)|(\\([0-9]{2,3}\\)[ \\-]*)|([0-9]{2,4})[ \\-]*)*?[0-9]{3,4}?[ \\-]*[0-9]{3,4}?$/;

const formSchema = Yup.object().shape({
  name: Yup.string().min(3).required("Your fullname is required"),
  emailAddress: Yup.string().email().required("Email Address is required"),
  phoneNumber: Yup.string().matches(phoneRegExp, "Phone number is not valid"),
  message: Yup.string().min(10).required("Project brief is required"),
  date: Yup.string(),
});

function ContactUs({ cursorEnter, cursorLeave, formRef, type, formOnly }) {
  const [loading, setLoading] = useState(false);
  const [openCalender, setOpenCalender] = useState(false);

  const formik = useFormik({
    initialValues: {
      name: "",
      emailAddress: "",
      phoneNumber: "",
      message: "",
      type,
      date: dayjs(),
    },
    validationSchema: formSchema,
  });

  const { errors, touched, values, getFieldProps, setFieldValue } = formik;

  const handleDateChange = (date) => {
    setFieldValue("date", date);
  };

  const handleSubmit = async (evt) => {
    evt.preventDefault();

    try {
      setLoading(true);
      const docRef = await addDoc(collection(db, "contacts"), {
        ...values,
        date: values.date.toDate(),
        createdAt: serverTimestamp(),
      });

      if (docRef.id) {
        await emailjs.sendForm("consult_ibrandafrica", "template_husetdp", evt.target, "no8U9yc2BGGT3VXMK");
        toast.success("Thank you for contact us. We will get in touch with you shorty!");
        formik.resetForm();
      }
      setLoading(false);
    } catch (error) {
      setLoading(false);
      toast.error(error?.message || "Something went wrong check your connection!");
    }
  };

  return (
    <>
      <CalenderPicker
        value={values.date}
        open={openCalender}
        onClose={() => setOpenCalender(false)}
        onChange={handleDateChange}
      />
      <FormikProvider value={formik}>
        <Form
          ref={formRef}
          autoComplete="off"
          noValidate
          onSubmit={handleSubmit}
          style={{ width: "100%", textAlign: "start" }}
        >
          <Grid
            container
            direction={type === "default" ? { xs: "column-reverse", sm: "column" } : "row"}
            alignItems="end"
            spacing={{ xs: 1, sm: type === "default" ? 2 : 10 }}
          >
            <Grid item xs={12} sm={10}>
              {!formOnly ? (
                <div>
                  <StyledTitle data-aos="fade-up" data-aos-duration="8000">
                    Let's Talk
                  </StyledTitle>
                  <StyledText data-aos="fade-up" data-aos-delay={100} data-aos-duration="8000">
                    {type === "consultation" ? "Schedule a free consultation" : "Leave a message with us"}
                  </StyledText>
                </div>
              ) : null}

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
                fullWidth
                label="Briefly tell us about your project"
                multiline
                rows={2}
                {...getFieldProps("message")}
                error={Boolean(touched.message && errors.message)}
                helperText={touched.message && errors.message}
                variant="standard"
              />
              {type === "consultation" && (
                <div>
                  <TextField type="hidden" {...getFieldProps("date")} value={values.date.format("LLLL")} />
                  <StyledInputButton onClick={() => setOpenCalender(true)}>
                    <span style={{ color: "rgba(255,255,255,0.6)", marginRight: 10 }}>Schedule a date: </span>
                    {values.date.format("LLLL")}
                  </StyledInputButton>
                </div>
              )}
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
    </>
  );
}

ContactUs.defaultProps = {
  type: "consultation",
  formOnly: false,
};

ContactUs.propTypes = {
  type: PropTypes.string,
  cursorEnter: PropTypes.func,
  cursorLeave: PropTypes.func,
  formOnly: PropTypes.bool,
};

export default ContactUs;
