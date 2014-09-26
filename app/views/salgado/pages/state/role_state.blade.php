@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 cols-sm-12">
                            <h4 class="text-right"><b>دسترسی نقش ها به مراحل</b></h4>
                        </div>
                        <div class="col-md-8 col-lg-9 col-sm-12" style="text-align: left">
                            <a href="{{ URL::route('admin.article_states.index') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-list"></span> لیست مراحل</a>
                        </div>
                    </div>
                    <hr>
                    @if(! empty($states) AND  !empty($roles))
                    {{ Form::open(['route' => 'admin.states.update_role_states', 'method' => 'put']) }}
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>نام مرحله</th>
                                        @foreach($roles as $role)
                                            <th>{{ trans("roles.{$role['name']}") }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($states as $state)
                                        <tr>
                                            <td>
                                                {{ $state['display_name'] }}
                                            </td>
                                            @foreach($roles as $role)
                                                <td>
                                                    <label>
                                                        <input
                                                            type="checkbox"
                                                            name="roles[{{ $role['id'] }}][states][{{ $state['id'] }}]"
                                                            value="{{ $state['id'] }}"
                                                            {{ isset($stateRoles[$state['id']][$role->id]) ? 'checked' : ''}}
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
                        <p class="text-center">محتوایی برای نمایش وجود ندارد.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
