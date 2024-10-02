@extends('user.layout')

@section('title','Formation')
@section('content')
    <div class="formation-show-container  container">
        
                <!-- Breadcrumb -->
        <div aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Accueil</a></li>
                @if($fromSubCat===true)
                    <li class="breadcrumb-item" style="text-transform:capitalize"><a href="{{ route('souscategories_formations',$formation->souscategory->id) }}"> {{$formation->souscategory->nom}}</a> </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $formation->titre }}</li>
            </ol>
        </div>
        <!-- /Breadcrumb -->
    <div class=" formation-carte ">
        <div class="carte-header">
            <div class="carte-img">
            <img src="{{asset('storage/'.$formation->image_url)}}" height="200px" alt="">
        </div>
        <div class="card-right">
            <div class="card-data">
                <h2>{{$formation->titre}} </h2>
                <p> {{$formation->description}} </p>
            
            </div>
            @if( $isFavorite)
                <form action="{{route('favoris.destroy',$favorite->id)}}" method="POST">
                   @csrf
                   @method('DELETE')
                    <button  type="submit" class="btn btn-outline-danger" title='supprimer des favoris'>  <i class="bi bi-heart-fill btn-danger" style="color:red; stroke:white;" > </i></button>

                </form>
            @else   
                <form action="{{route('favoris.store')}}" method='POST'>
                    @csrf
                    <input type="hidden" name="formation_id" value="{{$formation->id}}" >
                
                    <button  type="submit" class="btn btn-outline-danger" title="ajouter aux favoris"> <i class="bi bi-heart"></i></button>
            
                </form>
            @endif
        </div>    
    
        </div>
        
        <div class="mt-3">
                <div class="card videos-card mb-3 mt-8">
                    <div class="card-body">
                        <div class="videos-container">
                            <h4><i class="bi bi-caret-right-fill" style="color:#bc35ff"></i> Vidéos: </h4>
                            @if($formation->videos->isNotEmpty())
                                @foreach($formation->videos->sortBy('ordre') as $video)
                                      
                                    <div class="video-display mt-3" style="display:flex;">
                                    <iframe class="vimeo-player" src="https://player.vimeo.com/video/{{ basename($video->video_path) }}?dnt=1&autoplay=0&muted=0&color=ff0080" width="300" height="150" frameborder="0" allowfullscreen></iframe>
                                        <div class="video-details" style="display:flex;align-items:center">
                                            <h5
                                             style="text-transform:capitalize">{{ $video->ordre }} - {{ $video->titre }} </h5
                                            >
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
    </div>

@endsection
@section('scripts')
<script src="https://player.vimeo.com/api/player.js"></script>
<script>
    const vimeo_videos = document.getElementsByClassName("vimeo-player");
    Array.from(vimeo_videos).forEach(function(video) { 
        const player = new Vimeo.Player(video);
        player.on('play', function() {
            console.log('playing');
        });
    });
</script>

@endsection