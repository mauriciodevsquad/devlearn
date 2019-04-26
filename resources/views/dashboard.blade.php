@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">

            <div class="col-md-9 mb-2">
                <div class="card">
                    <div class="card-header">
                        <form class="form-inline" action="{{ route('dashboard') }}">
                            <label class="sr-only" for="term"></label>
                            <input type="text" name="term" class="form-control mb-2 mr-sm-2 mb-sm-0" id="term" placeholder="Type a name...">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <button class="btn btn-light ml-2" href="{{ route('dashboard') }}">Reset</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <p class="" style="font-size: 16px;">
                                    Videos
                                </p>
                            </div>
                            <div class="col-6 text-right">
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#myModal" style="margin-bottom: 0px !important">Add Video
                                </button>
                            </div>

                        </div>

                    </div>


                    <div class="card-body">
                        @foreach($videos as $video)
                            <div class="row mb-3">
                                <div class="col-4">
                                    <a href="/videos/{{$video->id}}">
                                    <img style="width: 100%;" src="img/thumb.png">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <h5>
                                        <a href="/videos/{{$video->id}}">
                                            {{ $video->name }}
                                        </a>

                                    </h5>
                                    <p style="font-size: 10px; color: #6c757d;">
                                        {{ $video->created_at }}
                                    </p>
                                    <p style="font-size: 14px; color: #6c757d;">
                                        {{ substr($video->description, 0, 60) }}
                                    </p>

                                    <div class="row">
                                        <div class="mr-1">
                                            <button href="" class="btn-sm btn-info" data-toggle="modal"
                                                    data-target="#editVideo"><i class="fas fa-pen text-center"></i>
                                            </button>

                                            <div class="modal fade" id="editVideo" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div>
                                                                Edit Video
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::open(['action' => ['VideoController@update', $video->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                                            <div class="mb-3">
                                                                {{ Form::label('name', 'Title')}}
                                                                {{ Form::text('name', $video->name, ['class' => 'form-control', 'placeholder' => 'e.g. Computer Hacks 2018']) }}
                                                            </div>

                                                            <div class="mb-3">
                                                                {{ Form::label('url', 'URL')}}
                                                                {{ Form::text('url', $video->url, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/xh2djwk']) }}
                                                            </div>

                                                            <div class="mb-3">
                                                                {{ Form::label('description', 'Description')}}
                                                                {{ Form::textArea('description', $video->description, ['class' => 'form-control', 'placeholder' => 'Learn how to save time and utilize your computer power with this awesome tricks!']) }}
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                {{Form::submit('Add', ['class'=>'btn btn-primary'])}}
                                                                {{Form::close()}}
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            {!! Form::open(['action' => ['VideoController@destroy', $video->id], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::button('<a><i class="fas fa-trash"></i></a>', ['class' => 'btn-danger btn-sm', 'type' => 'submit']) }}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <div>


                                    </div>
                                </div>
                            </div>



                            <hr>

                        @endforeach

                    </div>

                    <div class="col-12">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Video Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            Add Video
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        {!! Form::open(['action' => ['VideoController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="mb-3">
                            {{ Form::label('name', 'Title')}}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'e.g. Computer Hacks 2018']) }}
                        </div>

                        <div class="mb-3">
                            {{ Form::label('url', 'URL')}}
                            {{ Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/xh2djwk']) }}
                        </div>

                        <div class="mb-3">
                            {{ Form::label('description', 'Description')}}
                            {{ Form::textArea('description', '', ['class' => 'form-control', 'placeholder' => 'Learn how to save time and utilize your computer power with this awesome tricks!']) }}
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add', ['class'=>'btn btn-primary'])}}
                            {{Form::close()}}
                        </div>


                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
