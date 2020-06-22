@extends('layout.main')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8 col-offset-2 mb-5 text-center">
            <h4>
                {{$clip->name}}
            </h4>
            <video width="100%" controls>
                <source src="/storage/{{$clip->file}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <a href="/download/{{$clip->file}}" class="btn btn-primary mt-5">حمل المقطع <span class="fas fa-download"></span></a>
            <a href="/" class="btn btn-primary mt-5">أعمل مقطعك الخاص الآن <span class="fas fa-bong"></span></a>
            @if (gettype($data) != 'string')
            @livewire('twitter', ['access_token' => $data, 'clip' => $clip])
            @else
            <a href="{{$data}}" class="btn btn-primary mt-5">شارك في تويتر <span class="fab fa-twitter"></span></a>
            @endif
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-8 col-offset-2 mb-5 text-center">
            @livewire('clips')
        </div>
    </div>
  <!-- /.row -->
@endsection
