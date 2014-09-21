@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-4 cols-sm-12">
                        <h4 class="text-right"><b>لیست نقشها</b></h4>
                    </div>
                    <div class="col-md-8 col-lg-9 col-sm-12" style="text-align: left">
                        <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-remove"></span> حذف نقش های انتخاب شده</a>
                        <a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> ایجاد نقش جدید</a>
                    </div>
                </div>
                <hr>
                @if(! $permissions->isEmpty() AND ! $roles->isEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    @foreach($roles as $role)
                                        <th>{{ trans("roles.{$role->name}") }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td><b>{{ trans("permissions.{$permission->name}") }}</b></td>
                                        @foreach($roles as $role)
                                            <td>
                                                <label>
                                                    <input
                                                        type="checkbox"
                                                        name="roles[{{ $role->id }}][permissions][{{ $permission->id }}]"
                                                        value="true"
                                                    >
                                                </label>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center">نقش کاربری یا مجوزی برای نمایش وجود ندارد.</p>
                @endif
            </div>
        </div>
    </div>
@stop
