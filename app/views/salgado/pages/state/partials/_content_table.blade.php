<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th># شناسه</th>
                <th>اولویت</th>
                <th>نام</th>
                <th>نام ماشینی</th>
                <th>نقش ها</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($states as $state)
                <tr>
                    <td>{{ $state->id }}</td>
                    <td>{{ $state->priority }}</td>
                    <td>{{ $state->display_name }}</td>
                    <td>{{ $state->machine_name }}</td>
                    <td>
                        @foreach($state->roles as $role)
                            <span class="label label-default">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td style="text-align: left">
                        @include('salgado.pages.state.partials._index_operation')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
