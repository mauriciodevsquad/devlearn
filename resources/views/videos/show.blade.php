@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 text-center mt-3 mb-5">
                <h1>{{ $video->title }}</h1>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <img style="width: 100%;" src="/img/thumb.png">
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

