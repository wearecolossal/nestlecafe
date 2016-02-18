var passValueToHidden = function (ele, dataValue, inputEle, defaultClass, activeClass) {
    ele.on('click', function () {
        var dataAttr = $(this).data(dataValue);
        ele.removeClass(activeClass).addClass(defaultClass);
        $(this).addClass(activeClass);
        inputEle.val(dataAttr);
    });
};
//Edit Cafe Hours
var toggleHours = function (ele) {
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

//Search Table
var $rows = $('.table tbody tr');
$('#search').keyup(function () {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$';
    var reg = new RegExp(val, 'i');
    var text;

    $rows.show().filter(function () {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
    $('.searchbar span.text-success').fadeIn(200).stop();
    $('.searchbar span.text-success').text('The list has been filtered');

    setTimeout(function () {
        $('.searchbar span.text-success').fadeOut(500);
    }, 5000);
});

//Apply Archive Link
var applyArchiveLink = function (ele) {
    ele.on('click', function () {
        var modalTarget = $(this).data('target');
        var url = $(this).data('url');
        $(modalTarget).find('a.submit').attr('href', url);
    });
};

//Draft Record
var draft = function (ele, form) {
    ele.on('click', function () {
        var draft = $('input[name="draft"]');
        if (draft.val() == 0) {
            draft.val(1);
        } else {
            draft.val(0);
        }
        form.submit();
    });
};

//Fade away class
var fadeAwayOnLoad = function (ele) {
    ele.each(function () {
        var that = $(this);
        setTimeout(function () {
            that.fadeOut(500);
        }, 3000);
    });
};
fadeAwayOnLoad($('.fade-away'));

//Apply value to hidden input
var applyValToHidden = function (ele) {
    ele.on('click', function () {
        var value = $(this).data('value');
        var activeClass = $(this).data('active-class');
        var field = $(this).parent().find('input');
        field.val(value);
        $(this).parent().find('a').removeClass(activeClass);
        $(this).addClass(activeClass);
    });
};

//Hide on Load
var hideOnLoad = function(ele) {
    ele.hide();
};
hideOnLoad($('.hide-on-load'));

//LET JS HINT KNOW I USE THESE FUNCTIONS OUTSIDE OF THIS FILE
/* exported passValueToHidden, toggleHours, applyArchiveLink, draft, applyValToHidden */