<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th># شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>نام کاربری</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><label>{{ $user->id }}</label></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->jalali_created_at }}</td>
                    <td style="text-align: left">
                        @include('salgado.pages.user.partials._index_operation')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
