@extends('admin.layout')
@section('title','Détails sur la sous-catégorie')

@section('content')
       <!-- Breadcrumb -->
       <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Catégories</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span style="text-transform:capitalize;">{{ $souscategory->nom }} </span> </li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
    <h2 class="text-center" style='text-transform:capitalize;display:flex; align-items:center'> {{$souscategory->nom}} </h2>
    <div class="">
        <h3>Formations</h3>
        @if($souscategory->formations->isEmpty())
            <p class="text-center m-3">Aucune formation pour le moment</p>
        @else
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th>Image</th>
                <th scope="col">Titre</th>
                <th scope="col">Catégories</th>
                <th scope="col">Sous-catégories</th>
                </tr>
            </thead>
            <tbody>
                @foreach($souscategory->formations as $formation)
                <tr>

                </tr>
                    <td> {{$formation->id}} </td>
                    <td> <img style='height:50px;' src="{{ asset('storage/'.$formation->image_url) }}" alt=""></td>
                    <td> <a href=" {{route('formations.show',$formation->id)}} "> {{$formation->titre}} </a></td>
                    <td> {{$formation->category->nom}} </td>
                    <td>  {{$formation->souscategory->nom}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif    
    </div>
@endsection
@section('scripts')
<script> 

new DataTable('#example');
</script>
@endsection