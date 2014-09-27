<div class="form-message-wrapper"></div>
<div class="form-wrapper">
    <div class="row spinner-wrapper">
        <div class="spinner-inner vertical-center col-lg-12">
            <div class="spinner"></div>
            <button type="button" class="btn btn-link btn-sm canceler"><span class="glyphicon glyphicon-remove"></span> کنسل</button>
        </div>
    </div>
    @if(! isset($state))

    {{ Form::open(['route' => 'admin.api.v1.article_states.store', 'class' => 'ajaxable-form disable-submit article_states-form', 'data-submit-btn' => '.article_states-submit-btn']) }}

    @else

    {{ Form::open(['route' => ['admin.api.v1.article_states.update', $state->id], 'method' => 'put', 'class' => 'ajaxable-form disable-submit article_states-form', 'data-submit-btn' => '.article_states-submit-btn']) }}

    @endif

        <div class="form-group form-group-lg">

            {{ Form::label('machine_name' , 'نام ماشینی', ['class' => 'control-label']) }}

            {{ Form::text('machine_name', isset($state) ? $state->machine_name : null, ['class' => 'form-control input input-lg languageLeft', 'placeholder' => 'Example: editor_queue']) }}

            <p class="help-block">نام ماشینی را با کارکترهای انگلیسی و با حروف کوچک و بدون فاصله وارد کنید.</p>

        </div>

        <div class="form-group form-group-lg">

            {{ Form::label('display_name', 'نام فارسی', ['class' => 'control-label']) }}

            {{ Form::text('display_name', isset($state) ? $state->display_name : null, ['class' => 'form-control input input-lg', 'placeholder' =>  'مثال: صف دبیر']) }}

        </div>

        <div class="form-group form-group-lg">

            {{ Form::label('priority', 'اولویت', ['class' => 'control-label']) }}

            {{ Form::selectRange('priority', -50, 50, isset($state) ? $state->priority : 0, ['class' => 'form-control input input-lg']) }}

            <p class="help-block">اولویت یا ترتیب قرارگیری</p>

        </div>


        <div class="form-group-lg">
            <div class="checkbox">
                <label class="control-label">
                    خبرهایی که این مرحله، مرحله ی آخر آنها میباشد را به کاربران مهمان نشان بده
                    {{ Form::checkbox('viewable', true, isset($state) ? $state->viewable : false) }}
                </label>
            </div>
        </div>

        <div class="form-group form-group-lg">

            @if( isset($state))

                <button type="submit" class="btn btn-primary btn-lg btn-block article_states-submit-btn">
                    <span class="glyphicon glyphicon-edit"></span>
                    بروز رسانی مرحله
                </button>

            @else

                <button type="submit" class="btn btn-primary btn-lg btn-block article_states-submit-btn">
                    <span class="glyphicon glyphicon-ok"></span>
                    ایجاد مرحله جدید
                </button>

            @endif

        </div>

    {{ Form::close() }}
</div>

@section('script')
    @parent
    <script type="text/javascript">
        $(".article_states-submit-btn").click(function(e){
            var messageContainer = $(".form-message-wrapper");
            var formWrapper = $(".form-wrapper");
            var form = $(".ajaxable-form.article_states-form");
            Salgado.ajaxForm(form, messageContainer, formWrapper, $(this));
        });
    </script>
@stop
