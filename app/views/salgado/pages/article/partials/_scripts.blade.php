<script type="text/javascript">
    $(document).ready(function(){

        $(".bulk-delete-form").submit(function(e){
            var $inserted;
            e.preventDefault();
            $inserted = Salgado.insertBulkableInput("input.bulk-delete-item:checked", "form > .deleteables");
            if ($inserted){ this.submit() }
        });

    });
</script>





