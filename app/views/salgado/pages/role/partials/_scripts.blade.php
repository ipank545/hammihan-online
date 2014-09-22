@include('salgado.blocks._underscore_success_message')
@include('salgado.blocks._underscore_error_message')
<script type="text/javascript" src="{{ asset('assets/JsLibs/Common.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/JsLibs/Salgado.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".role-form-submit").click(function(e){
            var messageContainer = $(".role-create-message-wrapper");
            var formWrapper = $("#createModal .modal-body");
            var form = $(".ajaxable-form.role-form");
            Salgado.ajaxForm(form, messageContainer, formWrapper, $(this));
        });

        $(".bulk-delete-form").submit(function(e){
            var $inserted;
            e.preventDefault();
            $inserted = Salgado.insertBulkableInput("input.bulk-delete-item:checked", "form > .deleteables");
            if ($inserted){ this.submit() }
        })
    });
</script>
