(function($){
    jQuery.namespace('CssSnippets');

    CssSnippets.makeEqualHeight = function (selectable){
        var elem = $(selectable);
        var height = 0;
        $.each(elem, function(index, elem){
            var elemHeight = $(elem).height();
            height = elemHeight > height ? elemHeight : height;
        });
        elem.height(height);
    }

})(jQuery);