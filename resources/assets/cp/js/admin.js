var passValueToHidden = function (ele, dataValue, inputEle, defaultClass, activeClass) {
    ele.on('click', function () {
        var dataAttr = $(this).data(dataValue);
        ele.removeClass(activeClass).addClass(defaultClass);
        $(this).addClass(activeClass);
        inputEle.val(dataAttr);
    });
};