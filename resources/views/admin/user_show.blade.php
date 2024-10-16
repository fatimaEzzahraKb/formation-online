@extends('admin.layout')

@section('title',"Informations dur l'utilisateur")

@section('content')
            <div class="container ">
                <div class="main-body">
                
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{route('admin')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href=" {{route('users.index')}} ">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                    <!-- /Breadcrumb -->
                
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                            <i class="bi bi-person-circle" class="rounded-circle" style='font-size:80px;'></i>
                                <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                                <div class="mt-3">
                                <h4>{{$user->username}}</h4>
                                <p class="text-muted font-size-sm" style='text-transform: capitalize;'> {{$user->permission}} </p>
                                <p class="text-secondary mb-1" style='text-transform: capitalize; '>{{ $user->category ? $user->category->nom : '' }}</p>
                                
                                <!-- <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Nom Complèt</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                {{$user->username}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                {{$user->email}}
                                </div>
                            </div>
                            <hr>@if($user->created_at)
                            <div class="row"> 
                                <div class="col-sm-3">
                                <h6 class="mb-0">Member depuis</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   
                                {{$user->created_at->format('Y-M-d')}}
                                
                                </div>
                            </div>
                            <hr>@endif
                            @if(Auth::user()->permission === "super_admin")
                                <div class="row">
                                    <div class="" style="display:flex; justify-content:space-between;">
                                        <form action="{{route('users.edit', $user->id)}}" method="GET" style="display:inline;">
                                            @csrf
                                            <button class="btn btn-info" type="submit">
                                                Editer
                                            </button>
                                        </form>
                                        <form action="{{route('users.destroy', $user->id)}}" method="post" style="display:inline;" onsubmit="return confirm('Vous êtes sûr que vous voulez supprimer cet utilisateur')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            </div>
                        </div>

                        


                        </div>
                    </div>
                    @if($user->souscategoriesList->isNotEmpty()) 
                            <div class=" card col-8">
                                <div class="list">
                                    <h2>Sous Catégories attachées:</h2>
                            
                                    <ul>
                                        @foreach( $user->souscategoriesList as $souscategory)
                                            <li style="text-transform:capitalize;"> <a href="" ><span>{{ $souscategory->nom}}</span></a> </li>
                                            
                                        @endforeach 
                                    </ul>
                                </div>
                        </div>
                        
                    @endif
            </div>
        
@endsection
