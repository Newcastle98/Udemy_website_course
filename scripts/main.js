$(document).ready(function(){
var $header = $('header');
var $sticky = $header.before($header.clone().addClass("sticky"));

$(window).on('scroll',function(){
    var scrollFromTop = $(window).scrollTop();
    $('body').toggleClass("scroll", (scrollFromTop > 350))
})
//SMOOTH SCROLL

$('.menu li a[href^="#"]').on('click', function(e){
    e.preventDefault();

    var target = $(this.hash);

    if (target.length){
        $('html,body').stop().animate({
            scrollTop: target.offset().top -60 
        }, 500);
    }
});
//RESPONSIVE MENU

var body = $('body');
var menuTrigger = $('.js-menu-trigger');
var mainOverlay = $('.js-main-overlay');

menuTrigger.on('click', function(){
    body.addClass('menu-is-active');
});
$('.menu li a').on('click', function(){
    body.removeClass('menu-is-active');
});
mainOverlay.on('click', function(){
    body.removeClass('menu-is-active');
});
//MASONRY

$('.grid').masonry({
    //options
    itemSelector: '.grid-item',
    columnWidth: 120,
    fitWidth: true,
    originTop: true,
    gutter: 3

});
//SLICK-SLIDER


$('.slider').slick({
    arrows: true,
    prevArrow:'<button type="button" class="slick-prev"></button>',
    nextArrow: '<button type="button" class="slick-next"></button>',
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    centerMode: true,
    dots: true,
    
    centerPadding: '40px',
    responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1,
            fade: false
          }
        }
      ]
});


});