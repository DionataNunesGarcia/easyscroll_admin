$(document).ready(function () {

    var owl = $("#owl-demo");

    owl.owlCarousel({
        navigation: false,
        singleItem: true,
        responsive: true,
        jsonSuccess: true,
        autoHeight: true,
        transitionStyle: "backSlide"
    });
    
    $(".fancybox").fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        iframe: {
            preload: false
        },
        autoSize: false,
        width: 960,
        height: 500,
        arrows: false,
        nextClick: false,
        iframe: {
            preload: false // fixes issue with iframe and IE
        },
        helpers: {
            overlay: {
                css: {'background': 'rgba(0, 0, 0, 0.85)'}
            }
        }
    });
    $(".various").fancybox({
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        width: '70%',
        height: '70%',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
    });
});
$(function () {
    $(' div, img, h1, h2, h3, h4, input,textarea').tooltip({
        placement: 'left',
    });
});