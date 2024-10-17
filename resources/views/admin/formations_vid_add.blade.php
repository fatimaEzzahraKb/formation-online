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
                    <label for="formFileMultiple" class="form-label">Choisir une Vidéos depuis votre appareil:</label>
                    <div id="video-inputs-container" >
                        @if(old('videos'))
                            @foreach( old('videos') as $index =>$video  )
                            <div class="video-input mb-3">
                                <input type="file" class="form-control" name="videos[{{ $index }}][video]" accept="video/*">
                                <input type="text" class="form-control" name="videos[{{ $index }}][titre]" placeholder="Titre" value="{{ $video['titre'] }}">
                                <input type="number" class="form-control" name="videos[{{ $index }}][ordre]" placeholder="Ordre" value="{{ $video['ordre'] }}" min="1">                                
                            </div>
                            @endforeach
                            @error('videos.*')
                                    <p class="error" style="text-align:center;"> {{$message}} </p>
                        @enderror
                        @endif
                    </div>
                    <div style="display:flex;align-items:end;">
                    <button  type="button" class=" btn btn-secondary" id="add-video-btn" ><i class="bi bi-folder-plus"></i> Ajouter</button>

                    </div>
                
                        
                       
                </div>
                <div class="mb-3 row-forms">
                    <label for="formFileMultiple" class="form-label">Choisir une Vidéo déjà existée:</label>
                    <div id="video-options-inputs-container" >
                        @if(old('selected_vid'))
                            @foreach( old('selected_vid') as $index =>$video  )
                            <div class="video-input mb-3">
                                <input type="file" class="form-control" name="selected_vid[{{ $index }}][video]" accept="video/*">
                                <input type="text" class="form-control" name="selected_vid[{{ $index }}][titre]" placeholder="Titre" value="{{ $video['titre'] }}">
                                <input type="number" class="form-control" name="selected_vid[{{ $index }}][ordre]" placeholder="Ordre" value="{{ $video['ordre'] }}" min="1">                                
                            </div>
                            <select name="" id=""></select>
                            @endforeach
                            @error('selected_vid.*')
                                    <p class="error" style="text-align:center;"> {{$message}} </p>
                        @enderror
                        @endif
                        <div id="videos-selection">

                        </div>
                    </div>
                    <div style="display:flex;align-items:end;">
                    <button  type="button" class=" btn btn-secondary" id="select-video-btn" ><i class="bi bi-folder-plus"></i> Ajouter</button>

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
                         <input type="hidden" name="type" value="vidéo">
                            <button type="submit" class="col-2 btn btn-info submit-add-user">Créer   </button>
                            
                        </form>
                        <!-- @if($errors->any())
                            @foreach($errors->all() as $error)
                            <p class="text-danger"> {{$error}} </p>
                            @endforeach
                        @endif
                         -->
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
        // TO add as much videos as the user wants from his explorer 
       document.getElementById('add-video-btn').addEventListener('click',function(){
            const container = document.getElementById('video-inputs-container')
            const videoCount = container.children.length;

            const videoInputDiv = document.createElement('div');
            videoInputDiv.classList.add('video-input');

            const videoInput = document.createElement("input")
            videoInput.type="file"
            videoInput.classList.add("form-control")
            videoInput.name=`videos[${videoCount}][video]`
            videoInput.accept="video/*"
            
            const titleInput = document.createElement("input")
            titleInput.type="text"
            titleInput.classList.add("form-control")
            titleInput.name=`videos[${videoCount}][titre]`
            titleInput.placeholder="Titre de la video"

            const orderInput = document.createElement("input")
            orderInput.classList.add("form-control")
            orderInput.type="number"
            orderInput.name=`videos[${videoCount}][ordre]`
            orderInput.placeholder="Ordre"

            videoInputDiv.appendChild(videoInput);
            videoInputDiv.appendChild(titleInput);
            videoInputDiv.appendChild(orderInput);

            container.appendChild(videoInputDiv)

        })
       // To SELECT EXISTING VIDEOS ' FROM THE PLATEFORM VIDEOS' 
       
       document.getElementById('select-video-btn').addEventListener('click',function(){
            const container = document.getElementById('video-options-inputs-container')
            const videoCount = container.children.length;
            const categories = @json($categories);
        
            const videoInputDiv = document.createElement('div');
            videoInputDiv.classList.add('video-input');
           
            const categorySelect = document.createElement("select")
            categorySelect.classList.add('form-select')
            categorySelect.name="category_id"
            console.log(categories)
            categories.forEach(item => {
                const option_cat = document.createElement("option");
                option_cat.value = item.id;
                option_cat.innerText  = item.nom;
                categorySelect.appendChild(option_cat);

            })
            categorySelect.addEventListener('change',function(){
                selectedCatVideos(this.value)
            })
            videoInputDiv.appendChild(categorySelect);

            container.appendChild(videoInputDiv);

       })
       // To change the videos of the courses according to the selected category
       function selectedCatVideos(category_id){
        const container = document.getElementById('videos-selection');
        container.innerHTML = ""
        const videoCount = container.children.length;

        const selectVideo = document.createElement('select')
        selectVideo.classList.add('form-select')
        const categories = @json($categories);
        console.log('all categories',categories)
        const formations = @json($formations);
        const cat_formations = formations.filter(f => Number(f.category_id) === Number(category_id));
        console.log('choosed formations',cat_formations)
        cat_formations.forEach(formation => {
        const optgroup = document.createElement('optgroup');
        optgroup.label=formation.titre
        const videos = formation.videos;
        videos.forEach(video=>{
            const option = document.createElement('option')
            option.value = video.id;
            option.innerText = video.titre;
            optgroup.appendChild(option)
        })
        selectVideo.appendChild(optgroup)
        }
        )
       
    
        const orderInput = document.createElement('input')
        orderInput.classList.add("form-control")
        orderInput.type="number"
        orderInput.name=`selected_vid[${videoCount}][ordre]`
        orderInput.placeholder="Ordre";

        const videoInputs = document.createElement('div');
        videoInputs.classList.add('videos-select-form');

        videoInputs.appendChild(selectVideo)
        videoInputs.appendChild(orderInput)
        container.appendChild(videoInputs)
       }
    
    </script>
@endsection