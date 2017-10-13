;
(function() {

    'use strict';
    // iPad and iPod detection  
    // var isiPad = function() {
    //     return (navigator.platform.indexOf("iPad") != -1);
    // };
    // var isiPhone = function() {
    //     return (
    //         (navigator.platform.indexOf("iPhone") != -1) ||
    //         (navigator.platform.indexOf("iPod") != -1)
    //     );
    // };
    // Main Menu Superfish
    var mainMenu = function() {

        $('#fh5co-primary-menu').superfish({
            delay: 0,
            animation: {
                opacity: 'show'
            },
            speed: 'fast',
            cssArrows: true,
            disableHI: true
        });
    };
    // Offcanvas and cloning of the main menu
    var offcanvas = function() {
        var $clone = $('#fh5co-menu-wrap').clone();
        $clone.attr({
            'id': 'offcanvas-menu'
        });
        $clone.find('> ul').removeAttr('class').removeAttr('id');
        $('#fh5co-page').prepend($clone);
        // click the burger
        $('.js-fh5co-nav-toggle').on('click', function() {
            $('body').toggleClass('fh5co-offcanvas');
        });
        $clone.find('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('body').removeClass('fh5co-offcanvas');
                $('html, body').animate({
                    scrollTop: (target.offset().top - 48)
                }, 1000, "easeInOutExpo");
                return false;
            }
        });
        $(window).resize(function() {
            if ($(window).width() > 769) {
                if ($('body').hasClass('fh5co-offcanvas')) {
                    $('body').removeClass('fh5co-offcanvas');
                }
            }
        });
    }
    // Click outside of the Mobile Menu
    var mobileMenuOutsideClick = function() {
        $(document).click(function(e) {
            var container = $("#offcanvas-menu, .js-fh5co-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('fh5co-offcanvas')) {
                    $('body').removeClass('fh5co-offcanvas');
                }
            }
        });
    };
    // Animations
    var contentWayPoint = function() {
        var i = 0;
        $('.animate-box').waypoint(function(direction) {
            if (direction === 'down' && !$(this.element).hasClass('animated')) {
                i++;
                $(this.element).addClass('item-animate');
                setTimeout(function() {

                    $('body .animate-box.item-animate').each(function(k) {
                        var el = $(this);
                        setTimeout(function() {
                            el.addClass('fadeInUp animated');
                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });
                }, 100);
            }
        }, { offset: '85%' });
    };
    // Document on load.
    function run() {
        mainMenu();
        offcanvas();
        mobileMenuOutsideClick();
        contentWayPoint();
        $(window).scroll(function() {
            if ($("#fh5co-header-section").offset().top > 1) {
                $("#fh5co-header-section").addClass("navbar-shrink");
            } else {
                $("#fh5co-header-section").removeClass("navbar-shrink");
            }
        });
        window.Swipe.SetLeft(function() {
            if ($(window).width() <= 769) {
                if (!$('body').hasClass('fh5co-offcanvas')) {
                    $('body').addClass('fh5co-offcanvas');
                }
            }
        });

        window.Swipe.SetRight(function() {
            if ($(window).width() <= 769) {
                if ($('body').hasClass('fh5co-offcanvas')) {
                    $('body').removeClass('fh5co-offcanvas');
                }
            }
        })
    }
    module.exports = {
        run: run
    }

}());