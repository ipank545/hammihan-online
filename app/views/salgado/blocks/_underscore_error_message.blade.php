<script id="error-message-template" type="text/template">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            <% _.each(errors, function(error) { %>
                <li><%= error[0] %></li>
            <% }); %>
        </ul>
    </div>
</script>
