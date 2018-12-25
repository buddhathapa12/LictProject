@extends('layout.initlayout')
@section('content')
<div class="nav-bar">
@if(count($all)>0)
    @foreach ($all as $item=>$key)
        @if($item=="location")
            @continue;
        @endif
        <div class="nav-bar-item">
        {{$item}}
        @if(count($all[$item])/2>0.5)
        <div class="nav-bar-dropdowm">
            @foreach ($all[$item] as $subitemitem=>$key)
            @if($subitemitem=="location")
                @continue;
            @endif
            <div class="nav-bar-dropdown-item">
                {{$subitemitem}}
                @if(count($all[$item][$subitemitem])/2>0.5)
                <div class="nav-bar-dropdownside">
                @foreach ($all[$item][$subitemitem] as $subitemitem2=>$key)
                @if($subitemitem2=="location")
                    @continue;
                @endif
                <div class="nav-bar-dropdownside-item">
                    {{$subitemitem2}}
                </div>
                @endforeach
            </div>
            @endif
        </div>
            @endforeach
        </div>
        @endif
    </div>
    @endforeach
@endif
</div>
@foreach($txt_data as $item=>$key)
    <div class ="text_message_wrapper">
        <div class ="text_message_header">
            <h1>{{$item}}</h1>
        </div>
        <div class ="text_message_image">
            @foreach($txt_data[$item]['img'] as $img_item)
                <img src="{{$img_item}}" height="450" width="450" style="display:inline-block"/>
            @endforeach
        </div>
        <div class ="text_message_body" style="display:inline-block">
            {{$txt_data[$item]['txt']}}
        </div>
    </div>
@endforeach
@endsection

