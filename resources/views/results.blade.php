@extends('layouts/navbar')

@section('content')

    @if(!empty($search_results) || !isset($search_results))
        @foreach($search_results as $search_result)
            <div class="result-item">
                <img src="/images/{{$search_result->picture}}"/>
                <div class="result-component">
                    <h4>
                        <a href="{{route('display.show', ['id' => $search_result->id])}}">{{$search_result->ad_header}}</a>
                    </h4>
                    <p class="description"> {{$search_result->description}} </p>
                    <div class="">
                        {{$search_result->action}}
                        <div class="vl"
                             style="display: inline; margin-bottom: 10px;"></div>{{$search_result->condition}}
                    </div>
                    <p style="margin-top: 5px" class="price">Kaina: {{$search_result->price}}€</p>
                </div>
            </div>


        @endforeach
    @else
        <p>Dėja, skelbimų nerasta :(</p>

    @endif

@endsection
