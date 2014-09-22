<div class="row">
    <div class="col-lg-3 col-md-4 cols-sm-12">
        <h4 class="text-right"><b>لیست نقشها</b></h4>
    </div>
    <div class="col-md-8 col-lg-9 col-sm-12" style="text-align: left">
        {{ Form::open(['route' => 'admin.roles.bulk_delete', 'class' => 'bulk-delete-form', 'method' => 'delete']) }}
            <button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-remove"></span> حذف نقش های انتخاب شده</button>
            <div class="deleteables"></div>
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal"><span class="glyphicon glyphicon-plus"></span> ایجاد نقش جدید</a>
        {{ Form::close() }}
    </div>
</div>
