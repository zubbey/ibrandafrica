import PropTypes from "prop-types";
import { useState } from "react";
import ImageList from "@mui/material/ImageList";
import ImageListItem from "@mui/material/ImageListItem";
import { LightBox } from "../modal";

function GalleryList({ data, col, isMd, cursorEnter, cursorLeave }) {
  const [index, setIndex] = useState(-1);
  const currentImage = data[index];
  const nextIndex = (index + 1) % data.length;
  const nextImage = data[nextIndex] || currentImage;
  const prevIndex = (index + data.length - 1) % data.length;
  const prevImage = data[prevIndex] || currentImage;

  const handleClick = (index, item) => setIndex(index);
  const handleClose = () => setIndex(-1);
  const handleMovePrev = () => setIndex(prevIndex);
  const handleMoveNext = () => setIndex(nextIndex);

  return (
    <>
      <ImageList
        sx={{
          width: "100%",
          height: "100%",
          overflow: "hidden",
        }}
        cols={isMd ? col : 1}
        gap={30}
        rowHeight="auto"
      >
        {data?.map((item, imgIndex) => (
          <ImageListItem
            key={item?.image}
            onMouseEnter={cursorEnter}
            onMouseLeave={cursorLeave}
            data-aos="fade-up"
            data-aos-delay={`10${imgIndex}`}
            data-aos-duration="300"
            onClick={() => handleClick(imgIndex, item)}
          >
            <img src={item?.image} srcSet={item?.image} alt={item?.caption} loading="lazy" />
          </ImageListItem>
        ))}
      </ImageList>
      <LightBox
        open={!!currentImage}
        image={currentImage?.image}
        caption={currentImage?.caption}
        onClose={handleClose}
        onNext={handleMoveNext}
        onPrev={handleMovePrev}
      />
    </>
  );
}

GalleryList.defaultProps = {
  col: 3,
};

GalleryList.propTypes = {
  data: PropTypes.array,
  col: PropTypes.number,
  isMd: PropTypes.bool,
  cursorEnter: PropTypes.func,
  cursorLeave: PropTypes.func,
};

export default GalleryList;
