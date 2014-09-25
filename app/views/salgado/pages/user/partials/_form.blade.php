<div class="form-wrapper">
    @if(isset($user))
    {{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}
    @else
    {{ Form::open(['route' => 'admin.users.store', 'method' => 'post']) }}
    @endif
        <fieldset>
            <legend><h4><b>اطلاعات شخصی</b></h4></legend>

            <div class="form-group">
                {{ Form::label('name', 'نام و نام خانوادگی' ,['class' => 'control-label']) }}
                {{ Form::text('name', isset($user) ? $user->name : null, ['class' => 'form-control', 'placeholder' => 'مثال: حمید احمدی']) }}
            </div>

            <div class="form-group">
                {{ Form::label('phone', 'شماره تماس', ['class' => 'control-label']) }}
                {{ Form::text('phone', isset($user) ? $user->phone  : null, ['class' => 'form-control languageLeft', 'placeholder' => 'Example: 09124052064']) }}
            </div>

            <div class="form-group">
                {{ Form::label('voip_id', 'شناسه voip', ['class' => 'control-label']) }}
                {{ Form::text('voip_id', isset($user) ? $user->voip_id : null, ['class' => 'form-control languageLeft', 'placeholder' => 'Example: 25887796201']) }}
            </div>
        </fieldset>

        <fieldset>
            <legend><h4><b>اطلاعات کاربری</b></h4></legend>
            <div class="form-group">
                {{ Form::label('user_name', 'نام کاربری' , ['class' => 'control-label']) }}
                {{ Form::text('user_name', isset($user) ? $user->name : null, ['class' => 'form-control languageLeft', 'placeholder' => 'Example: user123']) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'ایمیل' , ['class' => 'control-label']) }}
                {{ Form::text('email', isset($user) ? $user->email : null, ['class' => 'form-control languageLeft', 'placeholder' => 'Example: user123@email.com']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'پسورد' , ['class' => 'control-label']) }}
                {{ Form::password('password', ['class' => 'form-control languageLeft', 'placeholder' => 'Example: 123456']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'تایید پسورد' , ['class' => 'control-label']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control languageLeft', 'placeholder' => 'Example: 123456']) }}
            </div>

        </fieldset>

        <fieldset>
            <legend><h4><b>نقش های کاربری</b></h4></legend>
            <label class="control-label">انتخاب کنید:</label>
            @foreach($roles as $role)
                <div class="checkbox">
                    <label name="roles[{{ $role->id }}]">
                        @if (Lang::has("roles.{$role->name}"))
                            {{ trans("roles.{$role->name}") }}
                        @else
                            {{ $role->name }}
                        @endif
                        {{ Form::checkbox("role[{$role->id}]", true, in_array($role->id, $userRoles)) }}
                    </label>
                </div>
            @endforeach
        </fieldset>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">
                @if (! isset($user))
                <span class="glyphicon glyphicon-ok"></span>
                ایجاد کاربر
                @else
                <span class="glyphicon glyphicon-edit"></span>
                اعمال ویرایش
                @endif
            </button>
        </div>

    {{ Form::close() }}
</div>
