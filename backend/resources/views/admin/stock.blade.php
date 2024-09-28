@extends('admin.layout')

@section('title','Formations Détails')
@section('content')
    <div class="container ">
        <div class="main-body">
        
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" {{route('admin')}} ">Dashboard</a></li>
                <li class="breadcrumb-item"><a href=" {{route('formations.index')}} ">Formations</a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{$formation->titre}} </li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        
            <div class="row gutters-sm">
                <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                    <img src=" {{asset('storage/'.$formation->image_url)}} " style=' height:150px;' alt="">
                        
                        <div class="mt-3">
                        <h2>{{$formation->titre}}</h2>
                        <p class="text-muted font-size-sm" style='text-transform: capitalize;'> {{$formation->category->nom}} </p>
                        <p class="text-secondary mb-1" style='text-transform: capitalize; '>{{ $formation->souscategory->nom }}</p>
                        
                        <!-- <button class="btn btn-outline-primary">Message</button> -->
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6" style="display:flex ; align-items:start;">
                <div class="card mb-3">
                    <div class="card-body">
                    <p> {{$formation->description}} </p>
                    <hr>
                    <div style="text-align:end; display:flex; justify-content:end; gap:10px;"> <h5 > Catégorie: </h5>  <p> {{$formation->category->nom}}</p> </div>
                    <div style="text-align:end; display:flex; justify-content:end; gap:10px;"> <h5 >  Souscatégorie: </h5>  <p> {{$formation->souscategory->nom}}</p> </div>
                    
                    

                    </div>
                </div>

                


                </div>
                
                        <div class="row mt-6">
                            <div class="" style="display:flex; justify-content:space-between;">
                                <form action="{{route('formations.edit', $formation->id)}}" method="GET" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-info" type="submit">
                                        Modifier
                                    </button>
                                </form>
                                @if(Auth::user()->permission === "super_admin")
                                <form action="{{route('formations.destroy', $formation->id)}}" method="post" style="display:inline;" onsubmit="return confirm('Vous êtes sûr que vous voulez supprimer cette formation')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Supprimer
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    
                    <div class=" mt-3">
                <div class="card videos-card mb-3 mt-8">
                    <div class="card-body">
                    <div class="videos-container">
                        @if($formation->videos->isNotEmpty())
                                @foreach( $formation->videos as $video )
                                    <div class="video-display mt-3" >
                                        <iframe src="https://player.vimeo.com/video/{{basename($video->video_path)}}" width="300" height="150" frameborder="0" allowfullscreen></iframe>
                                        <div class="video-details">
                                            <h3 style="text-transform:capitalize">{{$video->ordre}} - {{$video->titre}} </h3>   
                                        </div>
                                        
                                                <div class="" style="display:flex;gap:10px;">
                                                    <form action="{{route('formations.edit', $formation->id)}}" method="GET" style="display:inline;">
                                                        @csrf
                                                        <button class="btn " type="submit">
                                                        <i class="bi bi-pencil-square text-success" style="font-size:20px"></i>
                                                        </button>
                                                    </form>
                                                    @if(Auth::user()->permission === "super_admin")
                                                        <form action="{{route('formation_videos.destroy', $video->id)}}" method="post" style="display:inline;" onsubmit="return confirm('Vous êtes sûr que vous voulez supprimer cette video')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn "> <i style="font-size:20px" class="bi bi-trash3 text-danger"></i>
                                                            </button>
                                                        </form>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Launch demo modal
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ...
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    @endif
                                                </div>
                                    
                                    </div>
                                    
                                @endforeach
                            </div>
                        @else
                            <h4>Aucuen vidéo pour le moment</h4>
                        @endif

        
                
                
            </div>
            <form action="{{route('ajouter_videos',$formation->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="m-3 ">
                <div id="video-inputs-container" >
                </div>
                <div style="display:flex;justify-content:center ; width:100%; margin-top:10px;">
                <button  type="button" class=" btn btn-primary" id="add-video-btn" ><i class="bi bi-folder-plus"></i> Ajouter </button>
                </div>
                <button type="submit" class=" btn btn-success m-6" id="submit-btn" style="display:none;"> Valider </button>
                @error('videos')
                            <p class="error"> {{$message}} </p>
                    @enderror

                </div>
            </form>
                </div>
                </div>
                </div>
            </div>
            
    </div>
@endsection
@section('scripts')
        <script>
             // To add as much videos as we want 
             document.getElementById('add-video-btn').addEventListener('click', function() {
                const container = document.getElementById('video-inputs-container');
                const videoCount = container.children.length;
                const submit_btn = document.getElementById('submit-btn');
                submit_btn.style.display = "block";
                
                const videoInputDiv = document.createElement('div');
                videoInputDiv.classList.add('video-input');

                const videoInput = document.createElement("input");
                videoInput.type = "file";
                videoInput.classList.add("form-control");
                videoInput.name = `videos[${videoCount}][video]`;
                videoInput.accept = "video/*";

                const titleInput = document.createElement("input");
                titleInput.type = "text";
                titleInput.classList.add("form-control");
                titleInput.name = `videos[${videoCount}][titre]`;
                titleInput.placeholder = "Titre de la video";

                const orderInput = document.createElement("input");
                orderInput.classList.add("form-control");
                orderInput.type = "number";
                orderInput.name = `videos[${videoCount}][ordre]`;
                orderInput.placeholder = "Ordre";

                videoInputDiv.appendChild(videoInput);
                videoInputDiv.appendChild(titleInput);
                videoInputDiv.appendChild(orderInput);

                container.appendChild(videoInputDiv);
            });
            const myModal = document.getElementById('myModal')
            const myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
            })
        </script>
@endsection