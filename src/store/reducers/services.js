import { createSlice } from "@reduxjs/toolkit";

const servicesSlice = createSlice({
  name: "services",
  initialState: [
    {
      name: "Branding",
      jobs: [
        {
          title: "Kusnap",
          category: "brand identity",
          images: ["/images/work-sample.jpeg", "/images/work-sample2.jpg"],
        },
      ],
    },
    {
      name: "Development",
      jobs: [
        {
          title: "Kusnap",
          category: "mobile app",
          images: ["/images/work-sample.jpeg", "/images/work-sample2.jpg"],
        },
      ],
    },
    {
      name: "Marketing",
      jobs: [
        {
          title: "Kusnap",
          category: "social media",
          images: ["/images/work-sample.jpeg", "/images/work-sample2.jpg"],
        },
      ],
    },
    {
      name: "Media",
      jobs: [
        {
          title: "Kusnap",
          category: "product photography",
          images: ["/images/work-sample.jpeg", "/images/work-sample2.jpg"],
        },
      ],
    },
  ],
  reducers: {
    setServices: (_, action) =>
      action.payload.map((service) => {
        const mappedJob = service.jobs.map((job) => ({ ...job, date: job.date.toDate().toISOString() }));

        return {
          ...service,
          jobs: mappedJob,
        };
      }),
  },
});
// Action creators are generated for each case reducer function
export const { setServices } = servicesSlice.actions;

export default servicesSlice.reducer;
