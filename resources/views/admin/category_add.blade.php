@extends('admin.layout')

@section('title','Ajouter Catégorie')
@section('content')
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{route('admin')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href=" {{route('categories.index')}} ">Catégories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ajouter une catégorie</li>
                        </ol>
                    </nav>
                    <!-- /Breadcrumb -->
            <h2 ><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Ajouter Une Nouvelle Catégorie</h2 >
            <div class="form-main-container">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3  row-forms ">
                    <label for="titre" class="form-label">Nom : </label>
                    <div class="">
                        <input type="text" class="form-control" value="{{old('nom')}}" name="nom" id="titre-input" aria-describedby="emailHelp">
                    @error('nom')
                            <p class="error"> {{$message}} </p>
                        @enderror
                    </div>
                    
                </div>
                <div class="mb-3 row-forms ">
                    <label for="exampleInputEmail1" class="form-label">Description :</label>
                    <div class="inputs">
                        <textarea name="description" id="description" class="form-control"> {{old('description')}} </textarea>
                    @error('description')
                            <p class="error"> {{$message}} </p>
                    @enderror
                    </div>
                    
                </div>
                
                            
                         </div>
                            <button type="submit" class="col-2 btn btn-info submit-add-user">Créer   </button>
                            
                        </form>
                        
@endsection

