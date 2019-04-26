@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 text-center mt-3 mb-5">
                <h1>{{ $video->name }}</h1>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-md-10">
                <iframe width="100%" height="500px;" src="https://www.youtube.com/embed/EU7PRmCpx-0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p>
                    {{$video->description}}
                </p>

            </div>

        </div>

    </div>


@endsection

