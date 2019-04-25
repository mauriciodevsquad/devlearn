@extends('layouts.app')

@section('content')


    <div class="row">

        <div class="col-12 text-center mt-3 mb-5">
            <h1>Videos</h1>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @foreach($videos as $video)

                        <div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <img style="width: 100%;" src="img/thumb.png">
                                </div>
                                <div class="col-8">
                                    <h5>
                                        <a href="/videos/{{$video->id}}">
                                            {{ $video->title }}
                                        </a>
                                    </h5>
                                    <p style="font-size: 10px; color: #6c757d;">
                                        {{ $video->created_at }}
                                    </p>
                                    <p style="font-size: 14px; color: #6c757d;">
                                        {{ substr($video->description, 0, 40) }}
                                    </p>
                                </div>
                            </div>

                            <hr>

                        </div>

                    @endforeach
                </div>
                <div class="ml-3">
                    {{$videos->links()}}
                </div>

            </div>
        </div>

    </div>




@endsection

