import { useContext, useState } from "react";
import { motion } from "framer-motion";
import useMouse from "@react-hook/mouse-position";
import { MouseContext } from "../../context/mouse";

import "./cursor.css";

function Cursor({ mouseRef }) {
  const { cursorText, cursorVariant } = useContext(MouseContext);

  const mouse = useMouse(mouseRef, {
    enterDelay: 0,
    leaveDelay: 0,
  });

  let mouseXPosition = 0;
  let mouseYPosition = 0;

  if (mouse.x !== null) {
    mouseXPosition = mouse.clientX;
  }

  if (mouse.y !== null) {
    mouseYPosition = mouse.clientY;
  }

  const variants = {
    default: {
      opacity: 1,
      height: 24,
      width: 24,
      fontSize: "16px",
      x: mouseXPosition,
      y: mouseYPosition,
      // transition: {
      //   type: "spring",
      //   mass: 0.6,
      // },
    },
    project: {
      opacity: 1,
      // backgroundColor: "#fff",
      color: "#000",
      height: 80,
      width: 80,
      fontSize: "18px",
      x: mouseXPosition - 32,
      y: mouseYPosition - 32,
      mixBlendMode: "normal",
    },
    contact: {
      opacity: 1,
      height: 80,
      width: 80,
      fontSize: "32px",
      x: mouseXPosition - 40,
      y: mouseYPosition - 40,
      // backgroundColor: "#fff",
    },
  };

  const spring = {
    type: "spring",
    stiffness: 680,
    damping: 40,
  };

  return (
    <motion.div variants={variants} className="circle" animate={cursorVariant} transition={spring}>
      <span className="cursorText">{cursorText}</span>
    </motion.div>
  );
}

export default Cursor;
