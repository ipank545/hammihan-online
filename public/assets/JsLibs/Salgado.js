(function($){
    jQuery.namespace('Salgado.ajaxForm');

    Salgado.ajaxForm = function(form, messageWrapper, formWrapper, requester){
        var apiAddress = form.attr('action');
        var postData = form.serialize();
        var request;
        var btnText = requester.text();
        var btnHtml = requester.html();
        messageWrapper.html('');
        messageWrapper.hide();
        requester.attr('disabled',true);
        $('.spinner').show();
        requester.html('<span class="glyphicon glyphicon-refresh"></span> ' + btnText);
        request = Common.doRequest(apiAddress, postData, "post");
        spinner = formWrapper.find('.spinner-wrapper');
        spinner.css('height','100%').css('position','absolute');

        request.error(function(data){
            messageWrapper.hide();
            requester.html(btnHtml);
            requester.removeAttr('disabled');
            if (data.status = 422){
                errors = data.responseJSON;
                messageWrapper.html(_.template(
                    $('.error-message-template').html(),
                    errors
                ));
            }
            messageWrapper.fadeIn(400);
        });

        request.done(function(data){
            console.log(data);
        })
    }

})(jQuery);