@if(! empty($item))
<div class="newst">
    <a href="#" title="آر‌اس‌اس"><div class="rss" ></div></a>
    <span class="fontheader">
        <img  class="pic" src="{{  asset('assets/hammihan/images/1-3.png') }}" class="img-responsive"/>  &nbsp; &nbsp; {{ $item->name }}
    </span>
</div>
@if(isset($item->article->id))
<div class="media mr10x10 mb12 grow">
    <a href="{{ URL::route('articles.show', $item->article->id) }} }}" class="pull-right"><img src="{{ image_asset($item->article->thumb_image, '_pardisan_thumb_') }}" class="media-object img-polaroid" width="64" height="64" alt='' /></a>
    <div class="media-body">
        <h4 class="media-heading hf">
            <a href="#">{{ $item->important_title }}</a>
        </h4>
        <p class="justify"><a href="{{ URL::route('articles.show', $item->article->id) }}">{{ $item->article->summary }}</a></p>
    </div>
</div>
@endif
@endif
