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
    <h2 class="text-center" style='text-transform:capitalize;display:flex; align-items:center'><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>  {{$souscategory->nom}} </h2>
    <div class="" style="margin-bottom:50px">
        <h2>Formations</h2>
        @if(Auth::user()->permission==="super_admin")
                    <div class="btn-add text-end" ><button class="btn btn-info "> <a href="{{route('formations.create')}}" style="color:white; text-transform:none;">Ajouter une Formation</a> </button></div>
                @endif
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
    <div class="users" style="margin-top:50px">
                <h2> Utilisateurs</h2>
                @if(Auth::user()->permission==="super_admin")
                    <div class="btn-add text-end" ><button class="btn btn-info "> <a href="{{route('users.create')}}" style="color:white; text-transform:none;">Ajouter un utilisateur</a> </button></div>
                @endif
                @if($souscategory->userList->isEmpty())
                    <p class="text-center m-3">Aucun Utilisateur pour le moment</p>
                @else
                <div class="table-users-container" style="overflow-x:auto;">
                    <table id="example" class="ui celled table users-table " style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Catégorie</th>
                                <th>Sous Catégories</th>
                                @if( Auth::user()->permission==="super_admin" )
                                <th>Actions</th>
                                @else
                                <th>Modifier</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($souscategory->userList as $user)
                            <tr class="user-row">
                                <td> {{$user->id}} </td>
                                <td> <a href="{{route('users.show',$user->id)}}"> {{$user->username}}</a></td>
                                <td> {{$user->email}} </td>
                                <td> {{$user->permission }}   </td>
                                <td>{{$user->category ? $user->category->nom : '__' }}</td>
                                <td>
                                    @if ($user->souscategoriesList->isNotEmpty())
                                        {{$user->souscategoriesList->pluck('nom')->join(',')}}
                                    @else
                                    <p style="display:flex; justify-content:center;" > __</p>
                                    @endif
                                </td>
                                <td class="actions">
                                        <form action="{{route('users.edit',$user->id)}}" method="GET" style="display:inline;" >
                                                @csrf
                                            <button type="submit" style="border:none; background:none; padding:0;">
                                                    <i class="bi bi-pencil-square text-success"></i>
                                            </button>
                                        </form>
                                @if( Auth::user()->permission==="super_admin" )
                                        <form action="{{route('users.destroy',$user->id)}}" method="post" style="display:inline;" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete(this)" style="border:none; background:none; padding:0;" >
                                                <i href="" class="bi bi-trash3 text-danger"></i></button>
                                        </form>
                                @endif
                                    </td>
                            
                                
                            </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
                @endif
@endsection
@section('scripts')
<script> 

new DataTable('#example');
</script>
@endsection