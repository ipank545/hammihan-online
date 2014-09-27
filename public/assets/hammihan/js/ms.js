$(function () {


    window.onresize = displayWindowSize;
    window.onload = displayWindowSize;
    function displayWindowSize() {
        var myWidth = 0, myHeight = 0;
        if (typeof (window.innerWidth) == 'number') {
            myWidth = window.innerWidth; myHeight = window.innerHeight;
        } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
            myWidth = document.documentElement.clientWidth; myHeight = document.documentElement.clientHeight;
        } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
            myWidth = document.body.clientWidth; myHeight = document.body.clientHeight;
        }
        $('#size').html(myWidth);
    };

});