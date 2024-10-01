@extends('admin.layout')

@section('title','Utilisateurs')

@section('content')
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            @endif
            <div class="users">
                <h1>Utilisateurs</h1>
                @if(Auth::user()->permission==="super_admin")
                    <div class="btn-add text-end" ><button class="btn btn-primary "> <a href="{{route('users.create')}}" style="color:white; text-transform:none;">Ajouter un utilisateur</a> </button></div>
                @endif
                <div class="table-users-container" style="overflow-x:auto;">
                <table id="example" class="ui celled table users-table " style="width:100%">
                    <thead>
                        <tr>
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
                        @foreach ($users as $user)
                        <tr class="user-row">
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
                                    <form action="{{route('users.destroy',$user->id)}}" method="post" style="display:inline;" onsubmit="return confirm('Vous êtes sûr que vous voulez supprimer cet utilisateur')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border:none; background:none; padding:0;">
                                            <i href="" class="bi bi-trash3 text-danger"></i></button>
                                    </form>
                            @endif
                                </td>
                           
                            
                        </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
        </div>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script> 
    new DataTable('#example');
    </script>
@endsection