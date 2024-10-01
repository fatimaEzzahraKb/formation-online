@extends('user.layout')

@section('title','Formation')
@section('content')

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('formations.index') }}">Formations</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $formation->titre }}</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
    <div class="card ">
        <div class="card-img">
            <img src="{{asset('storage/'.$formation->image_url)}}" height="200px" alt="">
        </div>
        <div class="card-data">
        <h2>{{$formation->titre}} </h2>
        <p> {{$formation->description}} </p>
        </div>
        <hr>
        <div class="mt-3">
                <div class="card videos-card mb-3 mt-8">
                    <div class="card-body">
                        <div class="videos-container">
                            @if($formation->videos->isNotEmpty())
                                @foreach($formation->videos->sortBy('ordre') as $video)
                                    <div class="video-display mt-3" style="display:flex;">
                                        <iframe src="https://player.vimeo.com/video/{{ basename($video->video_path) }}" width="250" height="100" frameborder="0" allowfullscreen></iframe>
                                        <div class="video-details" style="display:flex;align-items:center">
                                            <h5 style="text-transform:capitalize">{{ $video->ordre }} - {{ $video->titre }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @else
                                <h4>Aucune vidéo pour le moment</h4>
                            @endif
                        </div>

                        
                    </div>
                </div>

        </div>
    </div>
@endsection