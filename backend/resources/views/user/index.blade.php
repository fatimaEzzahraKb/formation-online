@extends('user.layout')
@section('title','home')
@section('content')
   <div class="hero per-container">
    <h3>Nous sommes ravis de vous retrouver, {{Auth::user()->username}} </h3>
    
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
     <div class="carousel-inner">
      <div id="first-carousel" class="carousel-item active">
       <div class="image-hero">
          <img src="images/slider1.jpg" alt="hero slider">
        </div>
        <div class="body-carousel">
        
        <h3>Prépare vous pour un bon carrière professionnel</h3>
        <p>Commencez à apprendre pour obtenir la certification Marketing, la certification C et plus encore.</p>
       </div>
      

     </div>
     <div class="carousel-item " id="second-carousel">
      <div class="image-hero">
        <img src="images/slider2.jpg" alt="hero slider">
      </div>
      <div class="body-carousel">
       <h3>Prépare vous pour un bon carrière professionnel</h3>
       <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio facilis corrupti numquam fugit praesentium temporibus, modi error porro veritatis ut, dignissimos assumenda dolorem? Dicta, voluptate! Commodi culpa atque dicta aliquid!</p>
      </div>
    </div>
    <div class="carousel-item " id="third-carousel">
      <div class="image-hero">
        <img src="images/slider3.jpg" alt="hero slider">
      </div>
     <div class="body-carousel">
      <h3>Prépare vous pour un bon carrière professionnel</h3>
      <p>Commencez à apprendre pour obtenir la certification Marketing, la certification C et plus encore.</p>
     </div>
   </div>
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Next</span>
     </button>
   </div>
   </div>
   </div>
   <div class="formations-container ">
    <h1>Formations</h1>
   
   <div class="formations">
    <!-- les formations sous format de cards -->
     <div class="formation-cards">
        
        @php
          $souscategoryIds = Auth::user()->souscategoriesList->pluck('id')->toArray()
        @endphp
        @foreach($formations as $formation)
          @if( in_array($formation->souscategory_id, $souscategoryIds) )

          <a href=" {{route('user_formation.show',$formation->id)}} " class="formation-card">
              
          <div class="formation-card-img">  
            <img src="	{{asset('storage/'.$formation->image_url)}}"  alt="">
          </div>
          <h4>{{$formation->titre}}</h4>
          <hr class="line-card"/>
          <div class="card-meta card-meta--date">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
              <rect x="2" y="4" width="20" height="18" rx="4" />
              <path d="M8 2v4" />
              <path d="M16 2v4" />
              <path d="M2 10h20" />
            </svg>
            {{$formation->created_at->format('Y-m-d')}}
          </div>
          
          </a>    
              @endif
          @endforeach
        
     </div>
   </div>
  </div>
  <div class=" categories">
    
        <h2>  Catégorie: <span id="cat-name"> {{Auth::user()->category->nom}}</span> </h2>
        <p> Sous-catégories que vous pouvez parcourir: </p>
          <div class="category-item">
    
        
        <div class="ag-format-container ">
            <div class="ag-courses_box">
        @foreach( Auth::user()->souscategoriesList as $souscategory)

              <div class="ag-courses_item purple">
                <a href="" class="ag-courses-item_link">
                  <div class="ag-courses-item_bg"></div>
          
                  <div class="ag-courses-item_title" style="text-transform:capitalize">
                    {{$souscategory->nom}}
                   
                  </div>
                  <div class="ag-courses-item_date-box">
                    <span class="ag-courses-item_date">
                      {{$souscategory->formations->count()}}
                    </span>
                    Formations
                  </div> 
                  
                </a>
               
              </div>
                    
          @endforeach
          </div>
        </div>
      </div>

  
  </div>
  @endsection