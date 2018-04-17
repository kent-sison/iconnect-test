;(function () {
    
    'use strict';

    // Animations
    var contentWayPoint = function() {
        var i = 0;
        $('.animate-box').waypoint( function( direction ) {

            if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
                
                i++;

                $(this.element).addClass('item-animate');
                setTimeout(function(){

                    $('body .animate-box.item-animate').each(function(k){
                        var el = $(this);
                        setTimeout( function () {
                            var effect = el.data('animate-effect');
                            if ( effect === 'fadeIn') {
                                el.addClass('fadeIn animated-fast');
                            } else if ( effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft animated-fast');
                            } else if ( effect === 'fadeInRight') {
                                el.addClass('fadeInRight animated-fast');
                            } else {
                                el.addClass('fadeInUp animated-fast');
                            }

                            el.removeClass('item-animate');
                        },  k * 200, 'easeInOutExpo' );
                    });
                    
                }, 100);
                
            }

        } , { offset: '85%' } );
    };

    // //Foobar
    // var foobarLoad = function() {
        
    // $(function() {
      
    //   /* The foobar constructor call */
    //     $.foobar({
    //     "width": {
    //         "left": "15px",
    //         "center": "*",
    //         "right": "15px"
    //     },
    //     "position": {
    //         "button": "hidden"
    //     },
    //     "display" : {
    //         "type" : "expanded",
    //         "backgroundColor": "rgb(89, 89, 89)",
    //         "border": "2px solid rgb(102, 102, 102)",
    //     },
    //     "messages": [
    //         "On 9/7/2017, Equifax reported a data breach of their system(s) affecting consumers in the U.S., UK, and Canada. Contact Equifax (866) 447-7559 or visit '<a href='https://www.equifaxsecurity2017.com' target='_blank' style='font-family: Verdana; font-size: 10pt; color: lightyellow; text-decoration: underline;'> www.equifaxsecurity2017.com</a> ' for more information.  We encourage you to monitor your accounts and report any unauthorized transactions."
    //     ]
    //   });
    // });
  
    // };

    // Loading page
    var loaderPage = function() {
        $(".page-loader").fadeOut("slow");
    };

    //Match Height Item
    var matchHeight = function() {
        $('.match-height').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    };

    //Dropdown JS
    var dropdown = function() {

        $('.has-dropdown').mouseenter(function(){
            $(this).addClass('active');

            var $this = $(this);
            $this
                .find('.dropdown')
                .css('display', 'block')
                .addClass('animated-fast fadeInUpMenu');

        }).mouseleave(function(){
            $(this).removeClass('active');
            var $this = $(this);

            $this
                .find('.dropdown')
                .css('display', 'none')
                .removeClass('animated-fast fadeInUpMenu');
        });


        //Mobile Dropdown
        $('.mobile-dropdown').on('click', function(event) {
            event.preventDefault();
            
            // $(this).toggleClass('active');
            // $(this).next().slideToggle(500);
            if(!$(this).hasClass("active")) {
                // hide any open menus and remove all other classes
                $(".mobile-navigation .dropdown").slideUp(350);
                $(".mobile-dropdown").removeClass("active");

                // open our new menu and add the open class
                $(this).next("ul").slideDown(350);
                $(this).addClass("active");
            }
         
            else if($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this).next("ul").slideUp(350);
            }
        });

        //User Icon Dropdown
        $('.user-icon').on('click', function(event) {
            event.preventDefault();
            $('.mylte-dropdown').toggleClass('active');
        });
    };

    //Accordion JS
    var accordionEffect = function() {
        //FAQ Accordion
        $("#faq-accordion > div").accordion({
            header: "h3",
            collapsible: true,
            animate: 200,
            icons: { "header": "fa fa-caret-down fa-fw", "activeHeader": "fa fa-caret-up fa-fw" },
            heightStyle: "content",
            active: false
        });

        $("#faq-accordion > div:first-child").accordion("option", "active", 0);

        //Events Accordion
        $("#events-accordion > div").accordion({
            header: "h3",
            collapsible: true,
            animate: 200,
            heightStyle: "content",
            active: false
        });

        $("#events-accordion > div:first-child").accordion("option", "active", 0);
    };

    //Toggle Second Menu
    var toggleButton = function() {
        // Burger Click
        $('#secondary-menu-toggle').on('click', function(){

            if ( $(this).hasClass('active') ) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }

            if ( $('.top-menu').hasClass('collapse') ) {
                $('.top-menu').removeClass('collapse');
            } else {
                $('.top-menu').addClass('collapse');
            }
        });

        // Burger Click for mobile
        $('#mobile-menu-toggle').click(function(event) {
            $('body').addClass('menu-visible');
            $('.mobile-navigation').addClass('toggled');
            $('.overlay').addClass('toggled');
            $(this).addClass('active');
        });

        $('.overlay').click(function(event) {
            $('body').removeClass('menu-visible');
            $('.mobile-navigation').removeClass('toggled');
            $('.overlay').removeClass('toggled');
            $('#mobile-menu-toggle').removeClass('active');
        });

        //For Advanced Postpaid Toggle Expansion
        $('.plan-head').click(function(event) {
            event.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).addClass('not-active');
                $(this).next().slideUp(0);
            } else if ($(this).hasClass('not-active')){
                $(this).removeClass('not-active');
                $(this).addClass('active');
                $(this).next().slideDown(0);
            } else {
                $(this).addClass('active');
                $(this).removeClass('not-active');
            }
        });
        var w = window.innerWidth;
        if (w <= 991) {
            $('.plan-head').addClass('not-active');
            $('.plan-head').removeClass('active');
            $('.plan-head').next().slideUp(0);
        } else {
            $('.plan-head').addClass('active');
            $('.plan-head').removeClass('not-active');
            $('.plan-head').next().slideDown(0);
        }
        $(window).resize(function() {
            var w = window.innerWidth;
            if (w <= 991) {
                $('.plan-head').addClass('not-active');
                $('.plan-head').removeClass('active');
                $('.plan-head').next().slideUp(0);
            } else {
                $('.plan-head').addClass('active');
                $('.plan-head').removeClass('not-active');
                $('.plan-head').next().slideDown(0);
            }
        });

        //Phone Tabs
        $( "#phone-tabs" ).tabs({active: 0});

        //Mobile Prepaid Circle
        $('.mobile-prepaid-circle').on('click', function(){

            if ( $(this).hasClass('active') ) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }

        });

        //Mobile Postpaid Plan
        $('.mobile-plan-content').on('click', function(){

            if ( $(this).hasClass('active') ) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
            
        });

        //LTE Postpaid Page
        $('other-details').hide();
        $('.plus-icon').each(function(index) { 
            var par = $(this).parents('.lte-postpaid-body');

            $(this).on("click", function() {
                $(this).toggleClass('active');
                par.find('.other-details').slideToggle('fast');
                par.find('.other-details').toggleClass('toggled');
                par.toggleClass('toggled');
                return false;            
            });
        });
    };

    //On Scroll Header Shrink
    $(function(){
    var shrinkHeader = 110;
    $(window).scroll(function() {
        var scroll = getCurrentScroll();
        if ( scroll >= shrinkHeader ) {
            $('#main-header').addClass('onScroll');
            $('body').addClass('onScroll');
        }
        else {
            $('#main-header').removeClass('onScroll');
            $('body').removeClass('onScroll');
        }
    });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
        }
    });

    //Back to Top JS
    if ($('#back-to-top a').length) {
        var scrollTrigger = 132, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top a').addClass('show');
                } else {
                    $('#back-to-top a').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top a').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        });
    }

    var deviceToggle = function() {
        //Device toggle
        $('.device-details-container #plus-sign').each(function(index) {
            $(this).click(function(event) {
                var par = $(this).parents('.device-details-container');
                $(this).toggleClass('active');
                par.find('.other-details').slideToggle('fast');
                par.find('.other-details').toggleClass('toggled');
                par.toggleClass('toggled');
                return false;
            });
        });
        $('.device-details-container .mobile-image').each(function(index) {
            $(this).click(function(event) {
                var par = $(this).parents('.device-details-container');
                $(this).siblings('#plus-sign').toggleClass('active');
                par.find('.other-details').slideToggle('fast');
                par.find('.other-details').toggleClass('toggled');
                par.toggleClass('toggled');
                return false;
            });
        });
        $('.device-details-container .mobile-head').each(function(index) {
            $(this).click(function(event) {
                var par = $(this).parents('.device-details-container');
                $(this).siblings('#plus-sign').toggleClass('active');
                par.find('.other-details').slideToggle('fast');
                par.find('.other-details').toggleClass('toggled');
                par.toggleClass('toggled');
                return false;
            });
        });
    };

    // Document on load.
    $(function(){
        contentWayPoint();
        // foobarLoad();
        loaderPage();
        matchHeight();
        dropdown();
        accordionEffect();
        toggleButton();
        deviceToggle();
    });

}());