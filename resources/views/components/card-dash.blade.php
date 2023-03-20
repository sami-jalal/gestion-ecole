@props(['title'])
@props(['icon'])
@props(['number'])

<div class="col-lg-3 col-md-3 col-sm-3">
    <div class="custom_widget">

        <i class="{{$icon}}"></i>
        <span>{{$number}}</span>
        <br>
        <span>{{$title}}</span>
    </div>   
</div>