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
                            <h5>Type de formation:</h5>
                            <p style="text-transform: capitalize;">{{ $formation->type }}</p>
                        </div>
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
                <div class="card videos-card mb-3 mt-8" style="padding-bottom:50px">
                    <div class="card-body">
                        <div class="videos-container">
                            @if($formation->audios->isNotEmpty())
                                @foreach($formation->audios->sortBy('pivot.ordre') as $audio)
                                    <div class="video-display audio-display mt-3">
                                            <audio width="280" height="160"  controlsList="nodownload" controls>
                                                <source src="{{asset('storage/'.$audio->audio_path)}}" type="audio/mpeg">
                                                <source src="{{asset('storage/'.$audio->audio_path)}}" type="audio/ogg">
                                                Votre navigateur n'affiche pas les audios.
                                            </audio>
                                            <div class="video-details">
                                            <h3 style="text-transform:capitalize;margin-left:15px;">{{ $audio->pivot->ordre }} - {{ $audio->titre }}</h3>
                                        </div>
                                        <div style="display:flex; gap:10px;">
                                            <button class="btn" data-bs-toggle="modal" data-bs-target="#audioModal" 
                                                    data-audio-id="{{ $audio->id }}"
                                                    data-pivot-id="{{ $audio->pivot->id }}"
                                                    data-audio-title="{{ $audio->titre }}"
                                                    data-audio-ordre="{{ $audio->pivot->ordre }}">
                                                <i class="bi bi-pencil-square text-success" style="font-size:20px"></i>
                                            </button>
                                            @if(Auth::user()->permission === "super_admin")
                                            <form action="{{route('audios.destroy',$audio->id)}}" method="post" >
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
                                <h4>Aucun audio pour le moment</h4>
                            @endif
                        </div>

                        <form action="{{ route('ajouter_audios', $formation->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="m-3">
                                <div id="audio-inputs-container"></div>
                                <div style="display:flex; justify-content:center; width:100%; margin-top:10px;">
                                    <button type="button" class="btn btn-primary" id="add-audio-btn"><i class="bi bi-folder-plus"></i> Ajouter depuis votre appareil</button>
                                </div>
                                <button type="submit" class="btn btn-success m-6" id="submit-btn" style="display:none;">Valider</button>
                                @error('videos')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                        <form action="{{ route('ajouter_audios_existed', $formation->id) }}" method="post">
                            @csrf
                                <div id="video-options-inputs-container"  style="padding-left:50px">
                                    
                                </div>
                                <div style="display:flex;align-items:center;justify-content:center;width:100%; margin-top:10px;">
                                        <button  type="button" class=" btn btn-secondary" id="select-video-btn" ><i class="bi bi-folder-plus"></i> Choisir un Audio déjà existée</button>
                                </div>
                                <button type="submit" class="btn btn-success m-6" id="submit-btn-select" style="display:none;margin-left:50px">Valider</button>
                        </form>
                        @error('selected_audio.*')
                                    <p class="error" style="text-align:center;"> {{$message}} </p>
                        @enderror
        @if($errors->any())
    @foreach($errors->all() as $error)
        <p class='text-danger' style="margin:15px">
            {{ $error }}
        </p>
    @endforeach
@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for updating video -->
<div class="modal fade" id="audioModal" tabindex="-1" aria-labelledby="audioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Modifier l'audio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="audioUpdateForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="audioId" name="video_id">
                    <input type="hidden" id="pivotId" name="pivot_id">
                    <div class="mb-3">
                        <label for="audioTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="audioTitle" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="audioOrdre" class="form-label">Order</label>
                        <input type="number" class="form-control" id="audioOrdre" name="ordre" required>
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
    //Pour ajouter as much audios as we want
    document.getElementById('add-audio-btn').addEventListener('click', function () {
        const container = document.getElementById('audio-inputs-container');
        const audiosCount = container.children.length;
        const submit_btn = document.getElementById('submit-btn');
        submit_btn.style.display = "block";

        const audioInputDiv = document.createElement('div');
        audioInputDiv.classList.add('video-input');

        const audioInput = document.createElement("input");
        audioInput.type = "file";
        audioInput.classList.add("form-control");
        audioInput.name = `audios[${audiosCount}][audio]`;
        audioInput.accept = "audio/*";

        const titleInput = document.createElement("input");
        titleInput.type = "text";
        titleInput.classList.add("form-control");
        titleInput.name = `audios[${audiosCount}][titre]`;
        titleInput.placeholder = "Titre de l'audio";

        const orderInput = document.createElement("input");
        orderInput.classList.add("form-control");
        orderInput.type = "number";
        orderInput.name = `audios[${audiosCount}][ordre]`;
        orderInput.placeholder = "Ordre";

        // const lienVideoInput = document.createElement("input");
        // lienVideoInput.classList.add("form-control");
        // lienVideoInput.type = "text";
        // lienVideoInput.classList.add("form-control");
        // lienVideoInput.name = `audios[${audiosCount}][lien_video]`;
        // lienVideoInput.placeholder = "Lien de la vidéo liée";

        audioInputDiv.appendChild(audioInput);
        audioInputDiv.appendChild(titleInput);
        // audioInputDiv.appendChild(lienVideoInput);
        audioInputDiv.appendChild(orderInput);

        container.appendChild(audioInputDiv);
    });


    // Pour Le Modal de la modification de l'audio

    const audioModal = document.getElementById('audioModal');
    audioModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; 
        const audioId = button.getAttribute('data-audio-id');
        const pivotId = button.getAttribute('data-pivot-id');
        const audioTitle = button.getAttribute('data-audio-title');
        const audioOrdre = button.getAttribute('data-audio-ordre');

        // Update the modal's content.
        const modalTitle = audioModal.querySelector('.modal-title');
        const  audioIdInput = audioModal.querySelector('#audioId');
        const  pivotIdInput = audioModal.querySelector('#pivotId');
        const audioTitleInput = audioModal.querySelector('#audioTitle');
        const audioOrdreInput = audioModal.querySelector('#audioOrdre');

        modalTitle.textContent = 'Update Video: ' + audioTitle;
        audioIdInput.value = audioId;
        audioTitleInput.value = audioTitle;
        pivotIdInput.value = pivotId;
        audioOrdreInput.value = audioOrdre;

        // Update form action URL
        document.getElementById('audioUpdateForm').action = `/formation_audios/${audioId}`;
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

// pour choisir un audio déjà existé
document.getElementById('select-video-btn').addEventListener('click',function(){
            const container = document.getElementById('video-options-inputs-container')
            const submit_btn = document.getElementById('submit-btn-select');
            submit_btn.style.display="block"
            const videoCount = container.children.length;
            const categories = @json($categories);
            const videoForm = document.createElement('div') // pour le formulaire de la vidéo
            videoForm.classList.add('form-video-select')
            const videoInputDiv = document.createElement('div');
            videoInputDiv.appendChild(videoForm)
            videoInputDiv.classList.add('video-input-selection-add');
        
            const categorySelect = document.createElement("select")
            categorySelect.classList.add('form-select')
            categorySelect.name="audio_id"
            console.log(categories)
            categories.forEach(item => {
                const option_cat = document.createElement("option");
                option_cat.value = item.id;
                option_cat.innerText  = item.nom;
                categorySelect.appendChild(option_cat);

            })
            categorySelect.addEventListener('change',function(){
                selectedCatVideos(this.value,videoForm,container)
            })
            videoInputDiv.appendChild(categorySelect);

            container.appendChild(videoInputDiv);
               // ligne 
           const line = document.createElement('hr')
           line.classList.add('line-video-select')
           videoInputDiv.appendChild(line)
       })
       // To change the videos of the courses according to the selected category
       function selectedCatVideos(category_id,video_form,container){
                video_form.innerHTML = ""
                const videoCount = container.children.length;

                const selectAudio = document.createElement('select')
                selectAudio.name=`selected_audio[${videoCount}][id]`
                selectAudio.classList.add('form-select')
                const categories = @json($categories);
                console.log('all categories',categories)
                const formations = @json($formations);
                const cat_formations = formations.filter(f => Number(f.category_id) === Number(category_id));
                console.log('choosed formations',cat_formations)
                cat_formations.forEach(formation => {
                        const audios = formation.audios;
                        console.log('audios',audios)
                        if(audios.length>0){
                            const optgroup = document.createElement('optgroup');
                            optgroup.label=formation.titre
                            audios.forEach(audio=>{
                                const option = document.createElement('option')
                                option.value = audio.id;
                                option.innerText = audio.titre;
                                optgroup.appendChild(option)
                            })
                            selectAudio.appendChild(optgroup)
                        }
                    }
                )
       
                    
                const orderInput = document.createElement('input')
                orderInput.classList.add("form-control")
                orderInput.type="number"
                orderInput.name=`selected_audio[${videoCount}][ordre]`
                orderInput.placeholder="Ordre";

                const videoInputs = document.createElement('div');
                videoInputs.classList.add('videos-select-form');

                video_form.appendChild(selectAudio)
                video_form.appendChild(orderInput)
       }
</script>
@endsection
