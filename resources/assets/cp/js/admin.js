var passValueToHidden = function (ele, dataValue, inputEle, defaultClass, activeClass) {
    ele.on('click', function () {
        var dataAttr = $(this).data(dataValue);
        ele.removeClass(activeClass).addClass(defaultClass);
        $(this).addClass(activeClass);
        inputEle.val(dataAttr);
    });
};
//Edit Cafe Hours
var toggleHours = function(ele) {
    ele.on('click', function () {
        var day = $(this).data('day');
        if ($(this).hasClass('open')) {
            $('div[data-day="' + day + '"]').removeClass('hidden');
            $(this).parent().find('a').removeClass('btn-success btn-danger');
            $(this).addClass('btn-success');
            $('input.' + day).val(1);
        } else {
            $('div[data-day="' + day + '"]').addClass('hidden');
            $(this).parent().find('a').removeClass('btn-success btn-danger');
            $(this).addClass('btn-danger');
            $('input.' + day).val(0);
        }
    });
};

//LET JS HINT KNOW I USE THESE FUNCTIONS OUTSIDE OF THIS FILE
/* exported passValueToHidden, toggleHours */