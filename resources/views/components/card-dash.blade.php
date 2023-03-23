@props(['widget'])

<div class="col-lg-3 col-md-3 col-sm-3">
    <a class="custom_widget_links" href="{{ route($widget['route']) }}">
        <div class="row custom_widget" style="background-color: {{$widget['bg_color']}}">
            <div class="col-lg-4 col-md-4 col-sm-4 widget_logo">
                <i class="{{$widget['icon']}}"></i>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <span class="custom_widget_title">{{$widget['title']}}</span>
                <br>
                <span  class="custom_widget_count">{{$widget['count']}}</span>
            </div>
        </div>
    </a>  
</div>