@extends('admin.layout')

@section('title','Utilisateurs')

@section('content')
           
            <div class="users">
                <h1><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i> Utilisateurs</h1>
                @if(Auth::user()->permission==="super_admin")
                    <div class="btn-add text-end" ><button class="btn btn-info "> <a href="{{route('users.create')}}" style="color:white; text-transform:none;">Ajouter un utilisateur</a> </button></div>
                @endif
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
                        @foreach ($users as $user)
                        <tr class="user-row">
                            <td> {{$user->id}} </td>
                            <td> <a href="{{route('users.show',$user->id)}}"> {{$user->username}}</a></td>
                            <td> {{$user->email}} </td>
                            <td style="text-align:center;">
                                @if($user->permission  === 'admin' ) 
                                <span class=" badge text-bg-success">
                                @elseif($user->permission  === 'super_admin') 
                                <span class="badge text-bg-info">
                                @elseif($user->permission  === 'stagiaire') 
                                <span class="badge text-bg-secondary">
                                @endif
                                {{$user->permission }} </span>  </td>
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
        </div>

@endsection
@section('scripts')

    <script> 
    new DataTable('#example');
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