@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
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
                        @if(! $roles->isEmpty())
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
                                                <td>{{ $role->convertToPersian('created_at')}}</td>
                                                <td style="text-align: left">
                                                    @include('salgado.pages.role.partials._index_operation')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="no-content">
                                  <div class="alert alert-info">محتوایی برای نمایش وجود ندارد.</div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
@stop
