const VueAwesomeSwiper = window.VueAwesomeSwiper;
Vue.use(VueAwesomeSwiper);
new Vue({
  el: "#app",
  data: {
	swiperOptions: {
		loop: true,
		loopedSlides: 4
	},

	swiperThumbs: {
		loop: true,
		loopedSlides: 4,
		slidesPerView: 4,
		slideToClickedSlide: true
	}
  },
  mounted() {
	this.$nextTick(() => {
		const swiperOptions = this.$refs.swiperOptions.$swiper
		const swiperThumbs = this.$refs.swiperThumbs.$swiper
		swiperOptions.controller.control = swiperThumbs
		swiperThumbs.controller.control = swiperOptions
	})
  },
});