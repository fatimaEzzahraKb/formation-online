@extends('user.layout')
@section('title','home')
@section('content')
   <div class="souscat-show-container container ">
    <h2 > <i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>Formations Sur le sujet  <span style="text-transform:capitalize;"> {{$souscategory->nom}} </span></h2>
   
   <div class="formations">
    <!-- les formations sous format de cards -->
     <div class="formation-cards">
        @if($souscategory->formations->isEmpty())
          <h6 style="margin:20px;" >Aucune formation pour le moment </h6 >
        @endif
        @foreach($souscategory->formations as $formation)

          <a href=" {{route('user_formation.show',$formation->id)}}?fromSubCat=true " class="formation-card">
              <input type="hidden" name="fromSubCat">
          <div class="formation-card-img">  
            <img src="	{{asset('storage/'.$formation->image_url)}}"  alt="">
          </div>
          <h4>{{$formation->titre}}</h4>
          <hr class="line-card"/>
          <p>Type de contenu: {{$formation->type}} </p>
          
          </a>    
          @endforeach
        
     </div>
   </div>
  </div>
  @endsection