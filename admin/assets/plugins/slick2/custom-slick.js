$(function () {
   $('.slider-for').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     fade: true,
     asNavFor: '.slider-nav'
   });
   $('.slider-nav').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     asNavFor: '.slider-for',
     dots: true,
     centerMode: true,
     focusOnSelect: true,
     dots: false
   });
   $('.slick-one').slick({
      infinite: true,
      autoplay: true,
    });
});