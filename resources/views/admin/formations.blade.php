@extends('admin.layout')
@section('title','Formations Détails')
@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Formations Vidéos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Formations Audios</button>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="users">
                <h1><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Formations Vidéos</h1>
                @if(Auth::user()->permission==="super_admin")
                    <div class="btn-add text-end" ><button class="btn btn-info "> <a href="{{route('formations.create')}}" style="color:white; text-transform:none;">Ajouter une Formation Vidéo</a> </button></div>
                @endif
                <div class="table-users-container" style="overflow-x:auto;">
                    @if($formationsVideos->isEmpty())
                        <h4 style="text-align:center;"> Aucune Formation vidéos pour le moment </h4>
                    @endif
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
                        @foreach ($formationsVideos as $formation)
                            <tr class="user-row">
                                <td> 
                                <img style='height:50px;' src="{{ asset('storage/'.$formation->image_url) }}" alt="">
                            
                                </td>
                                <td><a href="{{route('formations.show',$formation->id)}}">  {{$formation->titre }}   </a></td>
                                <td>{{$formation->category->nom}}</td>
                                <td>{{$formation->souscategory->nom}}</td>
                                <td class="actions">
                                <a href="{{route('formations.edit',$formation->id)}}"> <i class="bi bi-pencil-square " style="color: rgb(0, 155, 103)"></i> </a>
                                @if( Auth::user()->permission==="super_admin" )
                                        <form action="{{route('formations.destroy',$formation->id)}}" method="post" style="display:inline;" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" style="border:none; background:none; padding:0;" onclick="confirmDelete(this)">
                                                <i href="" class="bi bi-trash3 text-danger"></i></button>
                                        </form>
                                @endif
                                    </td>
                            
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                
                </table>
                </div>
            </div></div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><div class="users">
                <h1><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Formations Audios</h1>
                @if(Auth::user()->permission==="super_admin")
                    <div class="btn-add text-end" ><button class="btn btn-info "> <a href="{{route('formations_audio.create')}}" style="color:white; text-transform:none;">Ajouter une Formation Audios</a> </button></div>
                @endif
                <div class="table-users-container" style="overflow-x:auto;">
                @if($formationsAudios->isEmpty())

                    <h4 style="text-align:center;">Aucune Formation Audio pour le moment</h4>
                @else
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
                            
                        
                            @foreach ($formationsAudios as $formation)
                            <tr class="user-row">
                                <td> 
                                <img style='height:50px;' src="{{ asset('storage/'.$formation->image_url) }}" alt="">
                            
                                </td>
                                <td><a href="{{route('formations.show',$formation->id)}}">  {{$formation->titre }}   </a></td>
                                <td>{{$formation->category->nom}}</td>
                                <td>{{$formation->souscategory->nom}}</td>
                                <td class="actions">
                                <a href="{{route('formations.edit',$formation->id)}}"> <i class="bi bi-pencil-square " style="color: rgb(0, 155, 103)"></i> </a>
                                @if( Auth::user()->permission==="super_admin" )
                                        <form action="{{route('formations.destroy',$formation->id)}}" method="post" style="display:inline;" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" style="border:none; background:none; padding:0;" onclick="confirmDelete(this)">
                                                <i href="" class="bi bi-trash3 text-danger"></i></button>
                                        </form>
                                @endif
                                    </td>
                            
                                
                            </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                @endif
                </div>
            </div></div>
 </div>
            
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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