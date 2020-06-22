@extends('layout.main')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8 col-offset-2 mb-5 text-center">
            <h4>
                رابط الأغنية من اليوتيوب
            </h4>
            @livewire('youtube-url')
        </div>
    </div>
    <!-- /.row -->

    <div class="row justify-content-md-center">
        <div class="col-md-8 col-offset-2 mb-5 text-center">
            @livewire('duration-picker')
        </div>
    </div>
    <!-- /.row -->

    <div class="row justify-content-md-center">
        <div class="col-md-8 col-offset-2 mb-5 text-center">
            @livewire('clips')
        </div>
    </div>
    <!-- /.row -->
@endsection
