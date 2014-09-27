@if(! $cats['carousel_slides']->isEmpty())
<div class="carousel">
    <div id="home-page-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
           @foreach( $cats['carousel_slides'] as $slide)
            <div class="item active">
                <img src="{{ image_asset($slide->large_image, '_pardisan_slide_') }}" />
                <div class="carousel-caption">
                    <h2><a href="{{ URL::route('articles.show', $slide->id) }}">{{ $slide->important_title }}</a></h2><small><a href="#">{{ $slide->summary }}</a></small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <a class="right carousel-control" href="#home-page-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="left carousel-control" href="#home-page-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
@endif
