@extends('admin.layout')

@section('title','Formations Détails')
@section('content')
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{route('admin')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href=" {{route('formations.index')}} ">Formations</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
                        </ol>
                    </nav>
                    <!-- /Breadcrumb -->
            <h2 ><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Ajouter Une Nouvelle formation</h2 >
            <div class="form-main-container">
                <form action="{{route('formations.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3  row-forms ">
                    <label for="titre" class="form-label">Titre : </label>
                    <div class="">
                        <input type="text" value=" {{old('titre')}} " class="form-control" name="titre" id="titre-input" aria-describedby="emailHelp">
                    @error('titre')
                            <p class="error"> {{$message}} </p>
                        @enderror
                    </div>
                    
                </div>
                <div class="mb-3 row-forms ">
                    <label for="exampleInputEmail1" class="form-label">Description :</label>
                    <div class="inputs">
                        <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                    @error('description')
                            <p class="error"> {{$message}} </p>
                    @enderror
                    </div>
                    
                </div>
                <div class="mb-3 row-forms">
                    <label for="exampleInputPassword1" class="form-label">Image: </label>
                    
                    <div class="inputs">
                        <div class="mb-3 " id="image-input">
                        <label for="formFile" id="form-label" class="custom-file-upload">
                        <i class="bi bi-upload"></i>
                        Choisir une image: 
                        </label>
                        <input accept="image/*" value=" {{old('image_url')}} " name="image_url" type="file" id="formFile" class="file-input" onchange="displayImage()">
                        <p id="change-msg" style="display:none; font-size:13px"> Clickez sur l'image pour changer</p>
                        </div>
                        @error('image_url')
                                    <p class="error"> {{$message}} </p>
                            @enderror
                            
                    </div>
                    
                </div>
                
                        <div class="mb-3 row-forms">
                    <label for="formFileMultiple" class="form-label">Audios :</label>
                    <div id="audio-inputs-container" >
                        @if(old('audios'))
                            @foreach( old('audios') as $index =>$audio  )
                            <div class="audio-input mb-3">
                                <input type="file" class="form-control" name="audio[{{ $index }}][audio]" accept="audio/*">
                                <input type="text" class="form-control" name="audio[{{ $index }}][titre]" placeholder="Titre" value="{{ $audio['titre'] }}">
                                <input type="number" class="form-control" name="audio[{{ $index }}][ordre]" placeholder="Ordre" value="{{ $audio['ordre'] }}" min="1">                                
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div style="display:flex;align-items:end;">
                    <button  type="button" class=" btn btn-secondary" id="add-audio-btn" ><i class="bi bi-folder-plus"></i> Ajouter</button>

                    </div>
                
                        
                       
                </div>
                    <div class="row-flex mb-3  row-forms" id="category">
                            <label for="">Catégorie : </label> 
                                <select class="form-select" name="category_id" id="category-select" aria-label="Default select example" onchange="updateSubcategories()">
                                    <option ></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" data-souscategories='@json($category->souscategories)'>{{ $category->nom }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('category_id')
                                    <p class="error"> {{$message}} </p>
                            @enderror
                        </div>
                            
                        
                            <div id="subcategory-container" class="subcat-row" style="display:none;">
                                <label for="">Sous-catégorie:</label> 
                                    <select class="form-select  " name="souscategory_id" id="subcategory-select">
                                        <option ></option>
                                    </select>
                            </div>
                                <!-- @if($errors->any())
                                <div class="alert alert-danger " role="alert">
                                    
                                            @foreach( $errors->all() as $error)
                                                <p class="text-danger">  {{$error}} </p>
                                            @endforeach
                                        
                                </div>
                                @endif -->
                         </div>
                         <input type="hidden" name="type" value="audio">

                            <button type="submit" class="col-2 btn btn-info submit-add-user">Créer   </button>
                            
                        </form>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                            <p class="text-danger"> {{$error}} </p>
                            @endforeach
                        @endif
                        
@endsection

@section('scripts')
    <script>

       


        // displaying subcategories related to the selected category
        function updateSubcategories() {
            const categorySelect = document.getElementById('category-select');
            const subcategorySelect = document.getElementById('subcategory-select');
            const subcategoryContainer = document.getElementById('subcategory-container');
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            const subcategories = selectedOption ? JSON.parse(selectedOption.dataset.souscategories) : [];
            console.log(subcategories)


            if (subcategories.length > 0) {
                subcategorySelect.innerHTML = '';
                subcategories.forEach(subcategory => {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.nom;
                    subcategorySelect.appendChild(option);
                });
                subcategorySelect.style.display = 'flex'; 
                subcategoryContainer.style.display = 'flex'; 
                subcategoryContainer.style.gap = '30px'; 
                subcategorySelect.style.gap = '10px'; 
                subcategoryContainer.style.alignItems = 'center'; 
                subcategorySelect.style.alignItems = 'center'; 
            } else {
                subcategoryContainer.style.display = 'none'; 
            }

        }


        
        // Displaying selected image
        function displayImage(){
            const label = document.getElementById('form-label');
            const image_input = document.getElementById('image-input');
            const input = document.getElementById('formFile');
            const change = document.getElementById('change-msg');
            if(input.files && input.files[0]){
                const reader = new FileReader();

                reader.onload = function(e){
                    label.innerHTML = `<img src=${e.target.result} style='height:120px;object-fit:cover;border-radius:5px' >`
                    change.style.display= 'block'
                }
                reader.readAsDataURL(input.files[0])
            }
            else{
                label.innerHTML = `<i class="bi bi-upload"></i> Choisir une image`
                change.style.display= 'none'

            }
        }
        function updateVideoInputs() {
            const inputFile = document.getElementById('formFileMultiple');
            const container = document.getElementById('video-inputs-container');
            container.innerHTML = ''; // Clear previous inputs
            if (inputFile.files.length > 0) {
                for (let i = 0; i < inputFile.files.length; i++) {
                    const videoInput = `
                        <div class="row-forms mb-3">
                            <label for="video_title_${i}" class="form-label">Titre de la vidéo ${i + 1}:</label>
                            <input type="text" name="videos[${i}][titre]" id="video_title_${i}" class="form-control" required>
                            
                            <label for="video_order_${i}" class="form-label">Ordre de la vidéo ${i + 1}:</label>
                            <input type="number" name="videos[${i}][order]" id="video_order_${i}" class="form-control" min="1" style="width:100px" required>
                        </div>
                    `;
                    container.innerHTML += videoInput;
                }
            }
        }
       
        // To add as much Audios as we want
        document.getElementById('add-audio-btn').addEventListener('click',function(){
            const container = document.getElementById('audio-inputs-container')
            const audioCount = container.children.length;

            const audioInputDiv = document.createElement('div');
            audioInputDiv.classList.add('audio-input');

            const audioInput = document.createElement("input")
            audioInput.type="file"
            audioInput.classList.add("form-control")
            audioInput.name=`audios[${audioCount}][audio]`
            audioInput.accept="audio/*"
            
            const titleInput = document.createElement("input")
            titleInput.type="text"
            titleInput.classList.add("form-control")
            titleInput.name=`audios[${audioCount}][titre]`
            titleInput.placeholder="Titre de l'audio"

            const linkInput = document.createElement("input")
            linkInput.type="text"
            linkInput.classList.add("form-control")
            linkInput.name=`audios[${audioCount}][lien]`
            linkInput.placeholder="lien de la video"
            
            const orderInput = document.createElement("input")
            orderInput.classList.add("form-control")
            orderInput.type="number"
            orderInput.name=`audios[${audioCount}][ordre]`
            orderInput.placeholder="Ordre"


            audioInputDiv.appendChild(audioInput);
            audioInputDiv.appendChild(titleInput);
            // audioInputDiv.appendChild(linkInput);
            

            audioInputDiv.appendChild(orderInput);

            container.appendChild(audioInputDiv)

        })
    </script>
@endsection