@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 cols-sm-12">
                            <h4 class="text-right"><b>لیست مجوزها</b></h4>
                        </div>
                        <div class="col-md-8 col-lg-9 col-sm-12" style="text-align: left">
                            <a href="{{ URL::route('admin.roles.index') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> ایجاد نقش جدید</a>
                        </div>
                    </div>
                    <hr>
                    @if(! empty($permissions) AND  !empty($roles))
                    {{ Form::open(['route' => 'admin.permissions.update', 'method' => 'put']) }}
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>نام مجوز</th>
                                        @foreach($roles as $role)
                                            <th>{{ trans("roles.{$role['name']}") }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <a
                                                    href="#"
                                                    data-toggle="popover"
                                                    class="popoverable link"
                                                    data-trigger="focus"
                                                    tabindex="0"
                                                    title="{{ trans("permissions.{$permission['name']}.title") }}"
                                                    data-placement="top"
                                                    data-content="{{ trans("permissions.{$permission['name']}.description") }}"
                                                >
                                                    <span class="glyphicon glyphicon-link"></span> {{ trans("permissions.{$permission['name']}.title") }}
                                                </a>
                                            </td>
                                            @foreach($roles as $role)
                                                <td>
                                                    <label>
                                                        <input
                                                            type="checkbox"
                                                            name="roles[{{ $role['id'] }}][permissions][{{ $permission['id'] }}]"
                                                            value="{{ $permission['id'] }}"
                                                            {{ !empty($role['perms'][$role['id']]) ? 'checked' : ''}}
                                                        >
                                                    </label>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-8 col-sm-12">
                                    <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-ok"></span> اعمال تغییرات</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                    @else
                        <p class="text-center">نقش کاربری یا مجوزی برای نمایش وجود ندارد.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
