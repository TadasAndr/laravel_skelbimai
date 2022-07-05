@extends('layouts/navbar')

@section("content")

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4>{{$ad->ad_header}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img style="min-width: 100%" src="/images/{{$ad->picture}}"/>
            </div>
            <div class="col-md-4">

                <p>Aprašymas:</p>
                <p class="text-break">{{$ad->description}}</p>

                <p>Būklė: {{$ad->condition}}</p>

                <p>Veiksmas: {{$ad->action}}</p>

                <p>Pardavėjo puslapis: {{$ad->website}}</p>

                <p>Video: {{$ad->video}}</p>

                <p class="fw-bold">Kaina: {{$ad->price}}€</p>
            </div>
            <div class="col-md-2">

                <img style="width: 100px;" src="/images/user_picture.jpg"/>
                <p>Pardavėjas: {{$ad->user->name}}</p>

                <p>Tel. nr: {{$ad->phone_number}}</p>

                <p class="text-break">El. paštas: {{$ad->email}}</p>
            </div>
        </div>
    </div>
@endsection

@section("user_content")
