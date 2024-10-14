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
                    <button  type="button" class="btn btn-outline-danger" onclick='confirmDelete(this)' title='supprimer des favoris'>  <i class="bi bi-heart-fill btn-danger" style="color:red; stroke:white;" > </i></button>

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
                            
                            <h4><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i> Vidéos: </h4>
                            @if($formation->videos->isNotEmpty())
                                @foreach($formation->videos->sortBy('ordre') as $video)
                                        
                                    <div class="video-display mt-3" style="display:flex;">
                                    <video width="280" height="160"  controlsList="nodownload" controls>
                                        <source src="{{asset('storage/'.$video->video_path)}}" type="video/mp4">
                                        Votre navigateur n'affiche pas les vidéos.
                                    </video>
                                        <div class="video-details" style="display:flex;align-items:center">
                                            <h5
                                             style="text-transform:capitalize; color:black;">{{ $video->ordre }} - {{ $video->titre }} </h5
                                            >
                                        </div>
                                    </div>
                                    
                                @endforeach
                                </div>
                            @elseif($formation->audios->isNotEmpty())
                            @foreach($formation->audios->sortBy('ordre') as $audio)
                                         
                                    <div class="video-display mt-3" style="display:flex;">
                                        
                                        <div class="video-details" style="display:flex;align-items:center">
                                            <h5
                                             style="text-transform:capitalize; color:black;">{{ $audio->ordre }} - {{ $audio->titre }} </h5
                                            >
                                        </div>
                                        <audio width="280" height="160"  controlsList="nodownload" controls>
                                            <source src="{{asset('storage/'.$audio->audio)}}" type="audio/mpeg">
                                            <source src="{{asset('storage/'.$audio->audio)}}" type="audio/ogg">
                                            Votre navigateur n'affiche pas les audios.
                                        </audio>
                                    </div>
                                    
                                    
                                @endforeach
                            @else
                                <h4>Aucun contenu pour le moment</h4>
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

    // Pour ne pas donner l'accès à télécharger les vidéos
    document.querySelector('video').addEventListener('contextmenu', function(e) {
        e.preventDefault(); // Disable right-click context menu
    });
    function confirmDelete(button){
            const form = $(button).closest('form');
            Swal.fire({
                title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas récupérer cet utilisateur!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!',
            cancelButtonText: 'Annuler'
            }).then((result)=>{
                if(result.isConfirmed){
                    form.submit();
                }
            })
    }
</script>

@endsection