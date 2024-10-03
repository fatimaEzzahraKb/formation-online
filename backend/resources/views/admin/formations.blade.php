@extends('admin.layout')
@section('title','Formations Détails')
@section('content')
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            @endif
            <div class="users">
                <h1><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Formations</h1>
                @if(Auth::user()->permission==="super_admin")
                    <div class="btn-add text-end" ><button class="btn btn-info "> <a href="{{route('formations.create')}}" style="color:white; text-transform:none;">Ajouter une Formation</a> </button></div>
                @endif
                <div class="table-users-container" style="overflow-x:auto;">
                <table id="example" class="ui celled table users-table " style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Titre</th>
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
                        @foreach ($formations as $formation)
                        <tr class="user-row">
                            <td> 
                            <img style='height:50px;' src="{{ asset('storage/'.$formation->image_url) }}" alt="">
                        
                            </td>
                            <td><a href="{{route('formations.show',$formation->id)}}">  {{$formation->titre }}   </a></td>
                            <!-- <td id="" > <textarea name="" id="description-textarea" style='height:150px;padding:5px' id=""> {{$formation->description }}</textarea></td> -->
                            <td>{{$formation->souscategory->nom}}</td>
                            <td>{{$formation->category->nom}}</td>
                            <td class="actions">
                            <a href="{{route('formations.edit',$formation->id)}}"> <i class="bi bi-pencil-square " style="color: rgb(0, 155, 103)"></i> </a>
                            @if( Auth::user()->permission==="super_admin" )
                                    <form action="{{route('formations.destroy',$formation->id)}}" method="post" style="display:inline;" onsubmit="return confirm('Vous êtes sûr que vous voulez supprimer cet utilisateur')">
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
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('scripts')
<script> 

new DataTable('#example');
</script>
@endsection