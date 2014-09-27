<div>
    <div class="newst ">
        <a href="#" title="آر‌اس‌اس"><div class="rss" ></div></a>
        <span class="fontheader">
                 <img  class="pic" src="{{  asset('assets/hammihan/images/1-3.png') }}" class="img-responsive"/>  &nbsp; &nbsp; خبرگزاری
        </span>
    </div>
    <div class="justify mt10 mr10">
        @foreach($cats['news']->article as $article)
            <span><a href="{{ URL::route('articles.show', $article->id) }}">{{ $article->important_title }}</a></span>
        @endforeach
    </div>
</div>

