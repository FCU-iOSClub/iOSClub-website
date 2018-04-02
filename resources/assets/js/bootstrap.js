window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.$ = window.jQuery = require('./guardian/jquery.min.js');
    window.CLUB = require('./guardian/main.js');
    window.Swipe = require('./Swipe.js');
    window.Popper = require('../../../node_modules/popper.js/dist/umd/popper.js');
    require('../../../node_modules/jquery.easing/jquery.easing.1.3.js');
    require('./guardian/superfish.js');
    require('./guardian/jquery.waypoints.min.js');
    require('./guardian/hoverIntent.js');

    require('bootstrap');
    require('./jqBootstrapValidation.js');
    // require('jquery.stellar/jquery.stellar.js')($);
    // window.Stellar = require('./guardian/jquery.stellar.min');

    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            console.log(target)
            if ($('body').hasClass('fh5co-offcanvas')) {
                $('body').removeClass('fh5co-offcanvas');
            }
            $('html, body').animate({
                scrollTop: (target.offset().top - 60)
            }, 1000, "easeInOutExpo");
            return false;
        }
    });

    $(window).scroll(function(event) {
        var fromTop = $(this).scrollTop() + 61;
        var id = $('[id^="fh5co-"][id$="-section"]').map(function() {
            if ($(this).offset().top < fromTop)
                return this;
        }).last()[0].id;
        if (id) {
            if (id == 'fh5co-header-section') {
                id = 'app'
            }
            $("a.js-scroll-trigger-active").parent().removeClass("active")
            if (!$("a.js-scroll-trigger-active[href='#" + id + "']").parent().hasClass("active")) {
                $("a.js-scroll-trigger-active[href='#" + id + "']").parent().addClass("active");
                if ($('a.js-scroll-trigger-active[href*="#"]:not([href="#"])').parent().hasClass('sfHover')) {
                    $('a.js-scroll-trigger-active[href*="#"]:not([href="#"])').parent().removeClass('sfHover')
                }
                if ($(this).parent().hasClass('sfHover')) {
                    $(this).parent().removeClass('sfHover')
                }
            }
        }

    });

} catch (e) {
    console.log(e);
}


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });