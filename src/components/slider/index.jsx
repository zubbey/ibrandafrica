import PropTypes from "prop-types";
import { Autoplay, Pagination } from "swiper";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/swiper.css"; // core Swiper

function Slider(props) {
  const { children: Item, items, perView, showDots, showArrows, sx } = props;

  return (
    <Swiper
      loop
      spaceBetween={30}
      slidesPerView={perView}
      direction="horizontal"
      autoplay={{
        delay: 10000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      }}
      pagination={{
        clickable: showArrows,
      }}
      modules={[Autoplay, Pagination]}
      style={sx}
    >
      {items?.map((item, index) => (
        <SwiperSlide key={index}>
          <Item index={index} item={item} />
        </SwiperSlide>
      ))}
    </Swiper>
  );
}

export default Slider;

Slider.defaultProps = {
  autoPlay: true,
  showDots: false,
  showArrows: false,
  perView: 3,
  sx: {},
};

Slider.propTypes = {
  children: PropTypes.func.isRequired,
  items: PropTypes.array.isRequired,
  autoPlay: PropTypes.bool,
  showDots: PropTypes.bool,
  showArrows: PropTypes.bool,
  perView: PropTypes.number,
  sx: PropTypes.object,
};
