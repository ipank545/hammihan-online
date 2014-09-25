<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th># شناسه</th>
                <th>نام</th>
                <th>آدرس صفحه</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ URL::route('categories.show', [ $category->id ]) }}">{{ $category->name }}</a></td>
                    <td><code>{{ $category->slug }}</code></td>
                    <td style="text-align: left">
                        @include('salgado.pages.category.partials._index_operation')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
