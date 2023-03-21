@props(['widget'])

<div class="col-lg-3 col-md-3 col-sm-3">
    <div class="custom_widget">
        <i class="{{$widget['icon']}}"></i>
        <span>{{$widget['count']}}</span>
        <br>
        <span>{{$widget['title']}}</span>
    </div>   
</div>