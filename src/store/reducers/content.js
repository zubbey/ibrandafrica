import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  home: {
    section1: {
      title: "We are creative branding agency",
      subtitle:
        "We have been working on a variety of projects and across different industries across disciplines, making our work an appropriate, versatile and functional response to the unique needs of our clients.",
      overline: "",
      buttonText: "",
      buttonLink: "",
      image: "",
    },
    section2: {
      title: "10+ Years",
      subtitle:
        "iBrand Africa is a like-minded colleague. We are a result-oriented, constructive and innovative firm, driven by the purpose to produce unmatched, measurable, and admirable results.",
      overline: "Experience",
      buttonText: "",
      buttonLink: "",
      image: "",
    },
  },
  about: {
    section1: {
      title: "An agency positioned at the top by positioning others higher.",
      subtitle:
        "iBrand Africa is a like-minded colleague. We are a result-oriented, constructive and innovative firm, driven by the purpose to produce unmatched, measurable and admirable results. We Think, You Thank!",
    },
    section2: {
      title: "Our Journey",
      subtitle: [
        "iBrand Africa was founded in 2011 as an entity intended to provide professional branding solutions to clients. Through partnerships with creative minds, we have evolved into a trusted name in business development and strategy. We have helped countless institutions to better showcase their brand core values, unveil their uniqueness and attract the right paying clients.",
        "iBrand Africa offers high-quality business consultancy services. We also provide the technical skills required to interpret brand and business ideas into relatable products. Our team comprises the best in tech, including graphics design, content writing, digital marketing, photography, videography, business strategy, app development, web designs and other highly sort-after professionals. We also offer the best tutelage.",
        "Our services range from business consultations to brand identity development, comprehensive branding, media coverage, platforms development, content writing, digital marketing, management procedures and professional tutelage.",
      ],
      video: "https://www.youtube.com/watch?v=G-QxAe8qkak",
    },
    section3: {
      title: "Meet The Team",
      subtitle:
        "We’re a diverse, close-knit team on an adventure to build something enduring, while learning something new, every day.",
      team: [
        {
          firstName: "Ernest",
          lastName: "Nnadi",
          position: "Lead Brand Strategist/ Co Founder",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam1%20(2).png?alt=media&token=009621c5-1cda-4efe-86a4-6c5fd5d21419&_gl=1*1v4c5yc*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI5NDI2Ny40Ny4xLjE2ODYyOTQzMTMuMC4wLjA.",
        },
        {
          firstName: "Royal",
          lastName: "Eze Izuchukwu",
          position: "Director/ Co Founder",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam6.png?alt=media&token=ad9db759-35cf-442b-8848-f1a23fba41eb&_gl=1*1k8e7hz*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI5NDI2Ny40Ny4xLjE2ODYyOTQzNzUuMC4wLjA.",
        },
        {
          firstName: "Joyce B. A ",
          lastName: "Njuare",
          position: "Head, Admin, Project Supervisor",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam2.jpg?alt=media&token=812ee408-1f7f-4c65-8d79-e9ac43567528&_gl=1*1tmeuav*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjA4ODM4OC4yOS4xLjE2ODYwODg2MTkuMC4wLjA.",
        },
        {
          firstName: "Kenneth",
          lastName: "Temple",
          position: "Support Specialist",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam3.jpg?alt=media&token=cb1cf6e4-f0ed-4b37-acab-71ab46ef437c&_gl=1*1bcnjs0*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjA4ODM4OC4yOS4xLjE2ODYwODg2NjIuMC4wLjA.",
        },
        {
          firstName: "James",
          lastName: "Martins C.",
          position: "Lead, Content Management",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam4.jpg?alt=media&token=8ec13691-18c0-44bd-8ef8-83b1b62fbae2&_gl=1*1dks7tv*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjA4ODM4OC4yOS4xLjE2ODYwODg2ODYuMC4wLjA.",
        },
        {
          firstName: "Barr. Florence",
          lastName: "Bekom",
          position: "Head, Legal.",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam5.jpg?alt=media&token=05c3d013-51cf-4f37-ad08-a35c1ac14058&_gl=1*16irarb*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjA4ODM4OC4yOS4xLjE2ODYwODg3MDUuMC4wLjA.",
        },
        {
          firstName: "Innocent A.",
          lastName: "Wanyanwu",
          position: "Head, I. T.",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam6.jpg?alt=media&token=1c34f5c3-b2fd-4b62-9a30-0a4c6fa530f8&_gl=1*b5rtll*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjA4ODM4OC4yOS4xLjE2ODYwODg3MjcuMC4wLjA.",
        },
        {
          firstName: "UTI",
          lastName: "Obieze",
          position: "Business",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam11.png?alt=media&token=213d90ec-cf02-4e9e-b600-f47f48d9b89a&_gl=1*pdvk7f*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI5NDI2Ny40Ny4xLjE2ODYyOTU5ODkuMC4wLjA.",
        },
        {
          firstName: "Victory",
          lastName: "Kejang",
          position: "Head business Development",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam7.png?alt=media&token=a37c7b26-b7d2-4f5e-a54f-31b6d230a092&_gl=1*1nr3un9*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI5NDI2Ny40Ny4xLjE2ODYyOTQ2NDcuMC4wLjA.",
        },
        {
          firstName: "Michel",
          lastName: "Vincent",
          position: "Lead Advertising",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam9.png?alt=media&token=9648f973-f063-44fa-b6f7-6cbb33f1c8ff&_gl=1*1pas4ay*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI5NDI2Ny40Ny4xLjE2ODYyOTQ3MzkuMC4wLjA.",
        },
        {
          firstName: "Collins V",
          lastName: "G",
          position: "Head Operations",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam8.png?alt=media&token=4e73cbc8-623a-402c-939e-8fe0a9c0569b&_gl=1*rubh1k*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI5NDI2Ny40Ny4xLjE2ODYyOTQ4NDIuMC4wLjA.",
        },
        {
          firstName: "Justice",
          lastName: "N",
          position: "Lead client services",
          photoUrl:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fteam10.jpg?alt=media&token=3ff077a4-1b95-4cd7-8846-5c904dd147cd&_gl=1*1e02b4d*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI5NDI2Ny40Ny4xLjE2ODYyOTUzODcuMC4wLjA.",
        },
      ],
    },
    section4: {
      title: "",
      subtitle: "",
      list: [
        {
          title: "Due Process",
          subtitle:
            "Our results speak loudly and the process is the tool that amplifies it all. We eradicate mediocrity and fragmentation, replacing them with deadline-based research-driven methodologies that work.",
          icon: "subway:step",
        },
        {
          title: "Collaboration",
          subtitle:
            "At iBrand Africa, each relationship is a partnership geared towards attaining predetermined success through carefully designed and executed strategies. We became a part of your firm until we helped you reach your goal.",
          icon: "heroicons:user-group-20-solid",
        },
        {
          title: "Efficient Execution",
          subtitle:
            "Time, efforts and finances are employed in every worthwhile endeavor. Armed with a thorough understanding of the latest in Internet-related technologies, iBrand Africa utilizes a variety of tools to achieve goals with the minimum resource cost, yielding maximum results.",
          icon: "game-icons:achievement",
        },
      ],
    },
  },
  work: {
    section1: {
      title: "Our accomplishments throughout the years.",
      subtitle:
        "Throughout our journey, we have consistently strived for excellence and achieved remarkable milestones. Our relentless pursuit of success and dedication to our goals have resulted in a series of noteworthy accomplishments over the years.",
    },
  },
  service: {
    section1: {
      title: "Our business is to make your business a business.",
      subtitle: "",
    },
    section2: {
      title:
        "Whatever your needs, whether project-specific, recurrent, regional or global, iBrand Africa is competent to deliver expertly crafted, strategic and result-oriented services.",
      subtitle:
        "We provide services in every aspect of a business from conception to marketing, rebranding, media and everything in between. We do the thinking for you, helping you decide the best name for your brand, and what your ideal logo should look like with exceptional topography. We also help you craft the texts to help you communicate your vision clearly. We are poised to carry out unmatched photo and video documentaries for your media needs, provide you with graphic content to captivate your audience and build websites and mobile applications that suit your needs and that of your clients.",
      image: "/images/service-hero.png",
    },
    section3: {
      title: "What we Do",
      subtitle: "",
    },
  },
  contact: {
    section1: {
      title: "We are always on the look for new talented people. Join our team.",
      subtitle:
        "You are too valuable and your idea is unique, that is why we have ensured that there is always someone on standby to respond when you contact us. We’re just a call or a few clicks away.",
    },
    section2: {
      title: "General",
      subtitle: "",
      list: [
        {
          value: "(+234)802-126-0000",
          icon: "ic:round-phone",
        },
        {
          value: "info@ibrandafrica.com",
          icon: "ic:round-email",
        },
      ],
    },
    section3: {
      title: "Our Offices",
      list: [
        {
          country: "Nigeria",
          address: "House 7, 4th Street, Elekahia Housing Estate, Port Harcourt.",
          line: "(+234) 702-060-0000 | (+234) 803-747-8593",
        },
        {
          country: "Kenya",
          address: "Nairobi, Kenya – Wattle Lane, Imara Daima. Nairobi.",
          line: "(+254) 799-649-184",
        },
      ],
    },
    socials: [
      {
        name: "Facebook",
        icon: "mdi:facebook",
        value: "https://facebook.com/ibrandafrica",
        color: "#3c5997",
      },
      {
        name: "Twitter",
        icon: "mdi:twitter",
        value: "https://twitter.com/ibrandafrica",
        color: "#3dabf3",
      },
      {
        name: "Instagram",
        icon: "mdi:instagram",
        value: "https://instagram.com/ibrandafrica",
        color: "#e02f6d",
      },
    ],
  },
  consultation: {
    section1: {
      title: "Get help from our professionals You cannot know it all",
      subtitle:
        "With our wealth of information in the business space, we offer one-on-one sessions with our industry veterans who will help you understand what you need from what you want. Fill the form let’s have an appointment.",
    },
  },
  print: {
    section1: {
      title: "Design and print in one place",
      subtitle: "IBrand Print lets you design and print products to be delivered to your door or picked up in-store. ",
      list: [
        {
          title: "What goes out should reflect what you've put in",
          subtitle:
            "Your office and other spaces deserve printing excellence. let's make you the consumables that will customers come looking for you            ",
          image:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fprint-banner4.png?alt=media&token=b1bea554-b975-4c8d-a178-e1bfcb31479a&_gl=1*1bi37a1*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjMyOTE4NS40OS4xLjE2ODYzMjk0NzMuMC4wLjA.",
          color: "#622361",
        },
        {
          title: "Make the uniforms a uniform",
          subtitle:
            "Nobody should tell the difference between the design and the print. in fact, there shouldn't be a difference. Let's show you this practically",
          image:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fprint-banner1.png?alt=media&token=82a2c258-c7c4-4cc9-96ff-39c4262c3d97&_gl=1*qeovpu*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjMyOTE4NS40OS4xLjE2ODYzMjkyNDcuMC4wLjA.",
          color: "#901413",
        },
        {
          title: "Design and print in one place",
          subtitle:
            "With the right kind of signages, you can keep your customers entertained and informed. Let's help you make them",
          image:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fprint-banner2.png?alt=media&token=ebbd0082-0e05-4171-bed3-af16f614989a&_gl=1*1m38jtp*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjMyOTE4NS40OS4xLjE2ODYzMjk0MDEuMC4wLjA.",
          color: "#06607c",
        },
        {
          title: "Stay stylish and distinguished.",
          subtitle: "Get high quality clothing prints and fabrication commensurate to your special events.",
          image:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fprint-banner3.png?alt=media&token=5fdd4d81-76ec-4799-b54d-351713669c62&_gl=1*1d8v749*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjMyOTE4NS40OS4xLjE2ODYzMjk0MzIuMC4wLjA.",
          color: "#b95520",
        },
        {
          title: "Great products are seen even in a crowd",
          subtitle:
            "great products combines great designs with great printing. your product is great, let's make the print great too.            ",
          image:
            "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fprint-banner5.png?alt=media&token=1823876c-8b0d-47a2-9a2f-a870a76aa639&_gl=1*1yjnt0p*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjMyOTE4NS40OS4xLjE2ODYzMjk0OTAuMC4wLjA.",
          color: "#b2242c",
        },
      ],
    },
    section2: {
      title: "Our Services",
      subtitle: "",
      list: [
        {
          name: "Paper Bag",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599129139/subcategory/idgr0pzqivwrwm9ltruz.jpg",
        },
        {
          name: "Large Format & Banner",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599129139/subcategory/idgr0pzqivwrwm9ltruz.jpg",
        },
        {
          name: "Souvenir",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599130334/subcategory/xgtdgcxdwdmash1mkrhr.jpg",
        },
        {
          name: "Flyer & Handbills",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599144655/subcategory/yhfkvajmlugbpbgudceg.jpg",
        },
        {
          name: "Custom Mug",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599146912/subcategory/uzkpiqbkxsukkgbsljpf.jpg",
        },
        {
          name: "Magazine",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599147390/subcategory/pxsypxd8tlkypezx051f.jpg",
        },
        {
          name: "Calendar",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599147390/subcategory/pxsypxd8tlkypezx051f.jpg",
        },
        {
          name: "Wall Art",
          category: "events",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599147907/subcategory/vyhvhjmwgktjcz79irpf.jpg",
        },
        {
          name: "Business Card",
          category: "Business Stationery",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599781024/subcategory/rmcw0pjok93x3lt1x4jd.jpg",
        },
        {
          name: "Letterhead",
          category: "Business Stationery",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599787670/subcategory/hqciexyowhgqy4j5qqa6.jpg",
        },
        {
          name: "Plastic ID Cards",
          category: "Business Stationery",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599145965/subcategory/lpuj4c2d4l5nzfzlicpk.jpg",
        },
        {
          name: "Branded Envelopes",
          category: "Business Stationery",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1599793132/subcategory/ddnjthhih2irqbyjvvhv.jpg",
        },
        {
          name: "T-Shirt",
          category: "T-Shirts & Clothing",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1600367069/subcategory/kfiwjz0h863g6lc4risa.jpg",
        },
        {
          name: "Polo Shirts",
          category: "T-Shirts & Clothing",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1600374988/subcategory/kgvkdfdjsdbn5gwgsvzp.jpg",
        },
        {
          name: "Hoodies & Sweatshirts",
          category: "T-Shirts & Clothing",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1600377411/subcategory/rgld2koh6s5knqbjfu13.jpg",
        },
        {
          name: "Cover All",
          category: "T-Shirts & Clothing",
          desc: "",
          image: "https://res.cloudinary.com/printhouse/image/upload/v1600377411/subcategory/rgld2koh6s5knqbjfu13.jpg",
        },
      ],
    },
  },
  partners: [
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner1.png?alt=media&token=ac5c8dd9-978b-43e7-8429-95c31deb0a48&_gl=1*1e30y3d*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjM5OTk5MS41MS4xLjE2ODY0MDAwNTAuMC4wLjA.",
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner2.png?alt=media&token=73f6d2e9-e487-4703-a64f-6673800b76a9&_gl=1*k6xl5j*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI4NDM1OC40Ni4xLjE2ODYyOTIxNTEuMC4wLjA.",
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner3.png?alt=media&token=dd5095b0-418f-4507-96bc-6810ba5a5069&_gl=1*1di4l5g*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI4NDM1OC40Ni4xLjE2ODYyOTIxNzQuMC4wLjA.",
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner4.png?alt=media&token=0186396f-e75c-4acc-b0ea-75be14d3ecaa&_gl=1*1k6z5mh*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI4NDM1OC40Ni4xLjE2ODYyOTIyMDMuMC4wLjA.",
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner5.png?alt=media&token=77229900-08ec-408b-8473-6c6c5f8bebba&_gl=1*pktc3j*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI4NDM1OC40Ni4xLjE2ODYyOTIyMjkuMC4wLjA.",
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner6.png?alt=media&token=f155a3b4-5d86-47e7-9b64-2fc487ee1a89&_gl=1*5j3mde*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI4NDM1OC40Ni4xLjE2ODYyOTIyNTMuMC4wLjA.",
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner7.png?alt=media&token=14fbb03f-2164-4ef4-b69f-e2035d25729e&_gl=1*kxelfq*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI4NDM1OC40Ni4xLjE2ODYyOTIyODIuMC4wLjA.",
    "https://firebasestorage.googleapis.com/v0/b/ibrandafrica-ltd.appspot.com/o/assets%2Fpartner8.png?alt=media&token=b0f05085-d24b-4ff5-9b9c-45e219577362&_gl=1*6bf89*_ga*NDYyNzE3Njk1LjE2NzgxMjQ4ODc.*_ga_CW55HF8NVT*MTY4NjI4NDM1OC40Ni4xLjE2ODYyOTIzMDEuMC4wLjA.",
  ],
  terms: "",
  privacyPolicy: "",
  cookiePolicy: "",
  refundPolicy: "",
};

const contentSlice = createSlice({
  name: "content",
  initialState,
  reducers: {
    setContent: (_, action) => action.payload,
    updateContent: (state, action) => {
      state[action.payload.key] = action.payload.value;
    },
  },
});
// Action creators are generated for each case reducer function
export const { setContent, updateContent } = contentSlice.actions;

export default contentSlice.reducer;
