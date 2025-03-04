@extends('admin.layout')
@section('title',"Modifier Utilisateur")

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href=" {{route('admin')}} ">Dashboard</a></li>
    <li class="breadcrumb-item"><a href=" {{route('users.index')}} ">Utilisateurs</a></li>
    <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
    <h2> <i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Modifier les données </h2>
    <div class="form-main-container">
        <form action="{{route('users.update',$user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3  row-forms ">
            <label for="username" class="form-label">Username : </label>
            <input type="text" class="form-control" value=" {{$user->username}} " name="username" id="username" aria-describedby="emailHelp">
            @error('username')
                    <p class="error"> {{$message}} </p>
                @enderror
        </div>
        <div class="mb-3 row-forms ">
            <label for="exampleInputEmail1"  class="form-label">Email address : </label>
            <input type="email" name="email" value=" {{$user->email}} "class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
                    <p class="error"> {{$message}} </p>
            @enderror
        </div>
        <div class="mb-3 row-forms">
            <label for="exampleInputPassword1" class="form-label">Password : </label>
            <input type="password" class="form-control"  name="password" id="exampleInputPassword1">
            
        </div>
        @error('password')
                    <p class="error"> {{$message}} </p>
            @enderror
        <div class="mb-3 row-forms">
            <label for="confirmation" class="form-label">Verifier le mot de passe : </label>
            
        <input type="password"  name="password_confirmation" class="form-control" id="confirmation">
            @error('password_confirmation')
                    <p class="error"> {{$message}} </p>
            @enderror
        </div>
        <div class="permission-radio ">
        <label for="">Permission : </label> 
        <div class="checks">
                <div class="form-check">
                    <input class="form-check-input"  type="radio" value="stagiaire" name="permission" >
                    <label class="form-check-label" for="stagiaire">
                        Stagiaire
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input"  type="radio" value="admin" name="permission" >
                    <label class="form-check-label" for="admin">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input"  type="radio" value="super_admin" name="permission" >
                    <label class="form-check-label" for="super_admin">
                        Super admin
                    </label>
                </div>
        </div>
            
            @error('permission')
                    <p class="error"> {{$message}} </p>
            @enderror
            </div>
            
            <div class="row-flex" id="category">
            <label for="">Catégorie : </label> 
                <select class="form-select" name="category_id" id="category-select" aria-label="Default select example" onchange="updateSubcategories()">
                    <option ></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" data-souscategories='@json($category->souscategories)'>{{ $category->nom }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                    <p class="error"> {{$message}} </p>
            @enderror
            

    <div id="subcategory-container" style="display:none;">
    <label for="">Sous-catégorie</label> 
        <div id="subcategory-select">

        </div>
    </div>

                    </div>
                    <button type="submit" class="btn btn-info submit-add-user col-2">Modifier</button>

                </form>
                </div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
@section('scripts')
    <script>
        
    const permissionRadios = document.querySelectorAll('input[name="permission"]');
    const categorySelect = document.getElementById('category');

    function ToggleCategory() {
        const isStagiaireSelected = Array.from(permissionRadios).some(radio => radio.value === 'stagiaire' && radio.checked);
        const subcategoryContainer = document.getElementById('subcategory-container');
        categorySelect.style.display = isStagiaireSelected ? "flex" : "none";
        categorySelect.style.gap='30px'
        categorySelect.style.margin='10px'
        subcategoryContainer.style.display = isStagiaireSelected ? 'none' : 'none';
        if (!isStagiaireSelected) {
            subcategoryContainer.style.display = 'none';
            document.getElementById('category-select').selectedIndex = 0; // Reset category selection
            document.getElementById('subcategory-select').innerHTML = ''; // Clear previous subcategories
        }
    }
    permissionRadios.forEach(radio => {
        radio.addEventListener('change', ToggleCategory);
    });

    ToggleCategory();
    function updateSubcategories() {
        const categorySelect = document.getElementById('category-select');
        const subcategorySelect = document.getElementById('subcategory-select');
        const subcategoryContainer = document.getElementById('subcategory-container');

        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const subcategories = selectedOption ? JSON.parse(selectedOption.dataset.souscategories) : [];


        if (subcategories.length > 0) {
            subcategories.forEach(subcategory => {
                const checkbox = document.createElement('input');
                const label = document.createElement('p')
                checkbox.setAttribute('type','checkbox')
                checkbox.value = subcategory.id;
                checkbox.name = "souscategory_id";
                label.textContent = subcategory.nom;
                label.style.marginBottom='0px'
                subcategorySelect.appendChild(checkbox);
                subcategorySelect.appendChild(label);
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


        </script>
@endsection