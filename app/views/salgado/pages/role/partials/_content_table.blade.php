<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th># شناسه</th>
                <th class="text-left">نام ماشینی</th>
                <th>نام</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>
                        <label>
                            {{ $role->id }}
                            <input type="checkbox" name="selectable[{{ $role->id }}]" value="{{ $role->id }}">
                        </label>
                    </td>
                    <td class="text-left"><code>{{ $role->name }}</code></td>
                    <td>{{ trans("roles.{$role->name}") }}</td>
                    <td>{{ $role->jalali_created_at }}</td>
                    <td style="text-align: left">
                        @include('salgado.pages.role.partials._index_operation')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>