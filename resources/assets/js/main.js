$(document).ready(function () {


    if ($(window).width() > 842) {
        $('ul.navlist a.dropdown').mouseenter(function () {
            var target = $(this).data('dropdown');
            $(target).addClass('active');
            $('.navigation').addClass('extended');
        });

        $('ul.navlist a.dropdown').mouseleave(function () {
            var target = $(this).data('dropdown');
            if (!$(target).hasClass('active')) {
                $(target).removeClass('active');
                $('.navigation').removeClass('extended');
            }
        });

        $('ul.navlist a').mouseleave(function () {
            if (!$(this).hasClass('dropdown')) {
                $('ul.menulist').removeClass('active');
                $('.navigation').removeClass('extended');
            }
        });

        $('.menulist.dropdown').mouseleave(function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $('.navigation').removeClass('extended');
            }
        });

        $('a.logo').mouseenter(function(){
            $('ul.menulist').removeClass('active');
            $('.navigation').removeClass('extended');
        });
    }

    $('a.mobile-show').click(function () {
        $('ul.navlist').toggleClass('display');
        $('.navigation').toggleClass('mobile-extended');
    });

    $('li.mobile-current a').click(function() {
       $('.columns.side').toggleClass('mobile-extended');
    });

});