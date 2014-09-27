<div class="form-wrapper">

@if( isset($article))
    {{ Form::open(['route' => ['admin.articles.update', $article->id], 'name' => 'article_form']) }}
@else
    {{ Form::open(['route' => 'admin.articles.store', 'name' => 'article_form']) }}
@endif

    <div class="form-group">

        {{ Form::label('important_title', 'تیتر اصلی') }}
        {{ Form::text('important_title', isset($article) ? $article->important_title : null, ['class' => 'form-control']) }}

    </div>

    <div class="form-group">

        {{ Form::label('first_title', 'تیتر فرعی بالا') }}
        {{ Form::text('first_title', isset($article) ? $article->first_title : null,['class' => 'form-control']) }}

    </div>

    <div class="form-group">

        {{ Form::label('second_title', 'تیتر فرعی پایین') }}
        {{ Form::text('second_title', isset($article) ? $article->second_title : null, ['class' => 'form-control']) }}

    </div>

    <div class="form-group">

        {{ Form::label('body', 'متن') }}
        {{ Form::textarea('body', isset($article) ? $article->body : null, ['class' => 'form-control mceEditor']) }}

    </div>

    <div class="form-group">

        {{ Form::label('summary', 'خلاصه') }}
        {{ Form::textarea('summary', isset($article) ? $article->summary : null, ['class' => 'form-control', 'row' => 2]) }}

    </div>

    <div class="form-group">

        {{ Form::label('author', 'نویسنده یا گردآورنده') }}
        {{ Form::text('author', isset($article) ? $article->author : null, ['class' => 'form-control']) }}

    </div>

    <div class="form-group">

        {{ Form::label('creaator', 'نویسنده') }}
        <div class="form-control-static">
            <p>{{ $currentUser->identifier() }}</p>
        </div>
        <p class="help-block">درصورتی که نام گردآورنده را وارد نموده اید. از آن نام به عنوان نویسنده مقاله استفاده میشود.</p>

    </div>

    <div class="form-group">

        {{ Form::label('tags', 'تگ ها') }}
        {{ Form::text('tags', isset($article) ? implode(',', $article->tags->lists('name')) : null, ['class' => 'form-control']) }}
        <p class="help-block">هر تگ را با ویرگول جدا کنید</p>

    </div>

    <div class="form-group">

        {{ Form::label('category_id', 'انتخاب دسته بندی') }}

        @if(! $categories->isEmpty())
            @foreach($categories as $category)
                <div class="radio">
                    <label>
                        {{ $category->name }}
                        {{ Form::radio('category_id', $category->id, false) }}
                    </label>
                </div>
            @endforeach
        @else
            <div class="alert alert-danger"><p>شما به دسته بندی خاصی دسترسی ندارید</p></div>
        @endif

    </div>

    <div class="form-group">

        {{ Form::label('state_id', 'وضعیت انتشار') }}

        @if(! $states->isEmpty())
        @foreach($states as $state)
            <div class="radio">
                <label>
                    {{ $state->display_name }}
                    {{ Form::radio('state_id', $state->id, $state->priority == 0 ? true : false) }}
                </label>
            </div>
        @endforeach
        @else
            <div class="alert alert-danger">شما به هیج وضعیت انتشاری دسترسی ندارید.</div>
        @endif

    </div>

    <div class="form-group">

        {{ Form::label('thumb_image', 'تصویر بند انگشتی') }}
        {{ Form::text('thumb_image', isset($article) ? $article->thumbImage->url : null, ['class' => 'form-control languageLeft', 'id' => 'thumb_image']) }}
        <a href="javascript:mcImageManager.open('article_form','thumb_image');" style="text-decoration:none;">[برای ارسال تصویر بندانگشتی کلیک کنید.]</a>
    </div>

    <div class="form-group">

        {{ Form::label('large_image', 'تصویر بزرگ') }}
        {{ Form::text('large_image', isset($article) ? $article->largeImage->url : null, ['class' => 'form-control languageLeft', 'id' => 'large_image']) }}
        <a href="javascript:mcImageManager.open('article_form', 'large_image');" style="text-decoration:none;">[برای ارسال تصویر بندانگشتی کلیک کنید.]</a>

    </div>

    <div class="form-group">

        {{ Form::label('publish_date', 'تاریخ انتشار') }}
        <div class="input-group">
            <div class="input-group-addon">
                <a href="#publish_date_input" id="publish_data_btn">
                                <span class="glyphicon glyphicon-calendar"></span>
                                انتخاب کنید
                </a>
            </div>
            {{ Form::text('publish_date', isset($article) ? $article->jalali_created_at : null, ['class' => 'form-control languageLeft', 'id' => 'publish_date_input']) }}
        </div>

    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                {{ Form::checkbox('commentable', true, isset($article) ? $article->commentable : true) }}
                فعال بودن نظرها
            </label>
        </div>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                {{ Form::checkbox('highlighted', true, isset($article) ? $article->highlighted : false) }}
                استفاده به عنوان نصویر بخش نگاه
            </label>
        </div>
    </div>

    <hr>

    <div class="form-group">

        <div class="col-md-4 col-md-offset-8 col-sm-12">

            <button type="submit" class="btn btn-primary btn-block">
                <span class="glyphicon glyphicon-ok"></span>
                ایجاد خبر جدید
            </button>

        </div>

    </div>

    {{ Form::close() }}
</div>
