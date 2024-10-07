@extends('admin.layout')
@section('title','Paramètres')

@section('content')
                
    <h1><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Modifier Vos données</h1>
    <div class="form-main-container">
        <form action="{{route('users.update',Auth::user()->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3  row-forms ">
            <label for="username" class="form-label">Username : </label>
            <input type="text" class="form-control" value=" {{Auth::user()->username}} " name="username" id="username" aria-describedby="emailHelp">
            @error('username')
                    <p class="error"> {{$message}} </p>
                @enderror
        </div>
        <div class="mb-3 row-forms ">
            <label for="exampleInputEmail1"  class="form-label">Email address : </label>
            <input type="email" name="email" value=" {{Auth::user()->email}} "class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
        </div>
    <button type="submit" class="btn btn-info submit-add-user col-4">Enregistrer les modifications</button>

    </form>
    </div>
                
@endsection