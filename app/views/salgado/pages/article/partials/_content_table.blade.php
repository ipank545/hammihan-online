<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th># شناسه</th>
                <th class="text-left">عنوان خبر</th>
                <th>نام نویسنده</th>
                <th>تاریخ ایجاد</th>
                <th>وضعیت</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>
                        <label>
                            {{ $article->id }}
                            <input type="checkbox" class="bulk-delete-item"  name="selectable[{{ $article->id }}]" value="{{ $article->id }}">
                        </label>
                    </td>
                    <td class="text-left"><code>{{ $article->important_title }}</code></td>
                    <td>{{ trans("{$article->author}") }}</td>
                    <td>{{ $article->jalali_publish_date }}</td>
                    <td style="text-align: left">
                        @include('salgado.pages.article.partials._index_operation')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>