$(document).ready(function () {
    $("#owl-demo").owlCarousel({
        autoPlay: 2000,
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 2],
        itemsTabletSmall: [568, 1],
        itemsMobile: [0, 1],
    });
});