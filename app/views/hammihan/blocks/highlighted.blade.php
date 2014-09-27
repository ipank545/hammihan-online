@if(! is_null($cats['highlighted']))
<div style="position:absolute; margin-top:-10px;" class="group edge">
    <div class="wrap-ribbon right-edge point stitch lred"><span>نگاه</span></div>
</div>
<div class="thumbnail">
    <a href="#">
        <img
        src="{{ image_asset(
             is_null($cats['highlighted']->large_image) ? $cats['highlighted']->thumb_image : $cats['highlighted']->large_image,
             '_pardisan_highlighted_')
        }}"
        style="max-height:160px;" />
    </a>
    <div class="caption">
        <h3><a href="#">{{ $cats['highlighted']->important_title }}</a></h3>
        <br/>
    </div>
</div>
@endif
