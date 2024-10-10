@extends('admin.layout')

@section('title', 'Formations Détails')
@section('content')
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('formations.index') }}">Formations</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $formation->titre }}</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('storage/' . $formation->image_url) }}" style='height:150px;' alt="">
                            <div class="mt-3">
                                <h2>{{ $formation->titre }}</h2>
                                <p class="text-muted font-size-sm" style='text-transform: capitalize;'>{{ $formation->category->nom }}</p>
                                <p class="text-secondary mb-1" style='text-transform: capitalize;'>{{ $formation->souscategory->nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="display:flex; align-items:start;">
                <div class="card mb-3">
                    <div class="card-body">
                        <p>{{ $formation->description }}</p>
                        <hr>
                        <div style="text-align:end; display:flex; justify-content:end; gap:10px;">
                            <h5>Catégorie:</h5>
                            <p>{{ $formation->category->nom }}</p>
                        </div>
                        <div style="text-align:end; display:flex; justify-content:end; gap:10px;">
                            <h5>Souscatégorie:</h5>
                            <p>{{ $formation->souscategory->nom }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-6">
                <div class="" style="display:flex; justify-content:space-between;">
                    <form action="{{ route('formations.edit', $formation->id) }}" method="GET" style="display:inline;">
                        @csrf
                        <button class="btn btn-info" type="submit">Modifier</button>
                    </form>
                    @if(Auth::user()->permission === "super_admin")
                    <form action="{{ route('formations.destroy', $formation->id) }}" method="post" style="display:inline;" >
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">Supprimer</button>
                    </form>
                    @endif
                </div>
            </div>

            <div class="mt-3">
                <div class="card videos-card mb-3 mt-8">
                    <div class="card-body">
                        <div class="videos-container">
                            @if($formation->videos->isNotEmpty())
                                @foreach($formation->videos->sortBy('ordre') as $video)
                                    <div class="video-display mt-3">
                                            <video width="280" height="160" controls>
                                                <source src="{{asset('storage/'.$video->video_path)}}" type="video/mp4">
                                                Votre navigateur n'affiche pas les vidéos.
                                            </video>
                                            <div class="video-details">
                                            <h3 style="text-transform:capitalize">{{ $video->ordre }} - {{ $video->titre }}</h3>
                                        </div>
                                        <div style="display:flex; gap:10px;">
                                            <button class="btn" data-bs-toggle="modal" data-bs-target="#videoModal" 
                                                    data-video-id="{{ $video->id }}"
                                                    data-video-title="{{ $video->titre }}"
                                                    data-video-ordre="{{ $video->ordre }}">
                                                <i class="bi bi-pencil-square text-success" style="font-size:20px"></i>
                                            </button>
                                            @if(Auth::user()->permission === "super_admin")
                                            <form action="{{ route('formation_videos.destroy', $video->id) }}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn" onclick="confirmDelete(this)"><i style="font-size:20px" class="bi bi-trash3 text-danger" ></i></button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @else
                                <h4>Aucune vidéo pour le moment</h4>
                            @endif
                        </div>

                        <form action="{{ route('ajouter_videos', $formation->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="m-3">
                                <div id="video-inputs-container"></div>
                                <div style="display:flex; justify-content:center; width:100%; margin-top:10px;">
                                    <button type="button" class="btn btn-primary" id="add-video-btn"><i class="bi bi-folder-plus"></i> Ajouter</button>
                                </div>
                                <button type="submit" class="btn btn-success m-6" id="submit-btn" style="display:none;">Valider</button>
                                @error('videos')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for updating video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Update Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="videoUpdateForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="videoId" name="video_id">
                    <div class="mb-3">
                        <label for="videoTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="videoTitle" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="videoOrdre" class="form-label">Order</label>
                        <input type="number" class="form-control" id="videoOrdre" name="ordre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('add-video-btn').addEventListener('click', function () {
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

    const videoModal = document.getElementById('videoModal');
    videoModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const videoId = button.getAttribute('data-video-id');
        const videoTitle = button.b ('data-video-title');
        const videoOrdre = button.getAttribute('data-video-ordre');

        // Update the modal's content.
        const modalTitle = videoModal.querySelector('.modal-title');
        const videoIdInput = videoModal.querySelector('#videoId');
        const videoTitleInput = videoModal.querySelector('#videoTitle');
        const videoOrdreInput = videoModal.querySelector('#videoOrdre');

        modalTitle.textContent = 'Update Video: ' + videoTitle;
        videoIdInput.value = videoId;
        videoTitleInput.value = videoTitle;
        videoOrdreInput.value = videoOrdre;

        // Update form action URL
        document.getElementById('videoUpdateForm').action = `/formation_videos/${videoId}`;
    });

    // SWEET ALERT DELETE CONFIRM
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
