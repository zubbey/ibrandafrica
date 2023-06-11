import { createContext, useState } from "react";

export const MouseContext = createContext({
  cursorText: "",
  cursorVariant: "",
  cursorTextHandler: () => {},
  cursorVariantHandler: () => {},
});

const MouseContextProvider = (props) => {
  const [cursorText, setCursorText] = useState("");
  const [cursorVariant, setCursorVariant] = useState("default");

  const cursorTextHandler = (value) => {
    setCursorText(value);
  };
  const cursorVariantHandler = (value) => {
    setCursorVariant(value);
  };

  return (
    <MouseContext.Provider
      value={{
        cursorText,
        cursorVariant,
        cursorTextHandler,
        cursorVariantHandler,
      }}
    >
      {props.children}
    </MouseContext.Provider>
  );
};

export default MouseContextProvider;
