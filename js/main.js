
const responsive ={
    0:{
        items:1
    },
    450:{
        items:2
    },
    600:{
        items:3
    },
    1000:{
        items:4
    }
}

$(document).ready(function () {
//toogle to collapse
    $nav = $('.nav');
    $toggleCollapse = $('.toggle-collapse');

    /** click event on toggle menu */
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

    //owl carousel for blogcare this also implements for click to scroll

    $('.owl-carousel').owlCarousel({ 
        loop:true,
        autoplay:true,
        autoplayTimeout:5000,
        dots:false,
        nav:true,
        navText:[$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')],
        responsive:responsive
    });


    // click to scroll top but doesnt work iDK
    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 3000);
    })
});

