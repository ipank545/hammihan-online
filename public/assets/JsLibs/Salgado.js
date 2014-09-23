(function($){
    jQuery.namespace('Salgado.ajaxForm');

    Salgado.ajaxForm = function(form, messageWrapper, formWrapper, requester){

        // Initialize
        var job = {
            form : form,
            messageWrapper : messageWrapper,
            formWrapper : formWrapper,
            requester : requester,
            apiAddress : form.attr('action'),
            postData :  form.serialize(),
            request : false,
            btnText : requester.text(),
            btnHtml : requester.html(),
            spinner : formWrapper.find('.spinner-wrapper'),
            canceler : formWrapper.find('.spinner-wrapper').find('.canceler')
        };

        // Begin process
        Salgado.beforeJob(job);

        Salgado.doJob(job);

        Salgado.onJobError(job);

        Salgado.onJobDone(job);

        Salgado.onJobCancel(job);
    }

    Salgado.beforeJob = function(job){
        // Hide before messages
        job.messageWrapper.html('');
        job.messageWrapper.hide();

        job.requester.attr('disabled',true);
        job.spinner.fadeIn(500);
        job.requester.html('<span class="glyphicon glyphicon-refresh"></span> ' + job.btnText);
    }

    Salgado.doJob = function(job){
        job.request = Common.doRequest(job.apiAddress, job.postData, "post");
    }

    Salgado.onJobError = function(job){
        job.request.error(function(data){
            if (data.status = 422){
                errors = data.responseJSON;
                job.messageWrapper.html(_.template(
                    $('#error-message-template').html(),
                    errors
                ));
            }
            Salgado.afterJob(job);
        });
    }

    Salgado.onJobDone = function(job){
        job.request.done(function(data){
            if (data.status = 200){
                job.messageWrapper.html(_.template(
                    $('.success-message-template').html(),
                    data
                ));
            }
            Salgado.afterJob(job);
        })
    }

    Salgado.onJobCancel = function(job){
        job.canceler.click(function(){
            job.request.abort();
            job.messageWrapper.hide();
            job.requester.html(job.btnHtml);
            job.requester.removeAttr('disabled');
            job.spinner.hide();
        });
    }

    Salgado.afterJob = function (job){
        job.messageWrapper.hide();
        job.requester.html(job.btnHtml);
        job.requester.removeAttr('disabled');
        job.spinner.hide();
        job.messageWrapper.fadeIn(400);
    }

    Salgado.insertBulkableInput = function(what, where)
    {
        what = $(what);
        $.each(what,function(index, value){
            console.log('hiii');
            $(where).append(value);
        });
        return true;
    }
})(jQuery);
