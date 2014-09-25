<div class="form-wrapper" style="min-height: 500px;">
    @if( isset($category))
    {{ Form::open(['method' => 'put', 'route' => ['admin.categories.update', $category->id]]) }}
    @else
    {{ Form::open(['method' => 'post', 'route' => 'admin.categories.store']) }}
    @endif
    <div class="form-group">
        {{ Form::label('name', 'نام دسته بندی') }}
        {{ Form::text('name', isset($category) ? $category->name : null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('slug', 'آدرس صفحه') }}
        {{ Form::text('slug', isset($category) ? $category->slug : null, ['class' => 'form-control languageLeft']) }}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">
            @if(isset($category))
                <span class="glyphicon glyphicon-edit"></span> اعمال ویرایش
            @else
                <span class="glyphicon glyphicon-ok"></span> ایجاد دسته بندی
            @endif
        </button>
    </div>

    {{ Form::close() }}
</div>
