$(function () {
    function bindDataToggle() {
        $('[data-toggle]').on('click', function () {
            event.preventDefault();
            var $toggle = $(this).closest('.code-wrapper').find('.toggle-code');
            if ($toggle.hasClass('hide')) {
                $toggle.removeClass('hide');
//                Prism.highlightElement($toggle.find('code')[0]);
            } else {
                $toggle.addClass('hide');
            }
        });
    }

    function bindScroll(opts) {
        var defaults = {
                speed : 500,
                offset: 0
            },
            settings = $.extend({}, defaults, opts || {});

        $('.style-sidebar a').on('click', function (e) {
            e.preventDefault();

            var target  = $(this).attr('href').replace('#', ''),
                $target = target.length ? $('#' + target) : '',
                offset  = 0;

            $('#offCanvasTop').foundation('close');

            if ($target.length) {
                offset = $target.offset().top + settings.offset;
                console.log(offset, settings.offset);
            }

            $("html, body").animate({
                scrollTop: offset
            }, settings.speed);
        });
    }

    function init() {
        bindDataToggle();
        bindScroll({
            offset: -60
        });
    }

    init();
});