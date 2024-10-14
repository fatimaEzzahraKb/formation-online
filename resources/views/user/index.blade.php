@extends('user.layout')
@section('title','Acceuil ')
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
   <div class="formations-container container">
    <h1 style="    text-decoration: underline  rgb(0, 204, 255);"> Formations</h1>
    <h2><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i> Formations Vidéos </h2> 
   
   <div class="formations">
    <!-- les formations sous format de cards -->
     <div class="formation-cards">
        
        @php
          $souscategoryIds = Auth::user()->souscategoriesList->pluck('id')->toArray()
        @endphp
        @foreach($formations_video as $formation)
          @if( in_array($formation->souscategory_id, $souscategoryIds) )

          <a href=" {{route('user_formation.show',$formation->id)}} " class="formation-card">
              
          <div class="formation-card-img">  
            <img src="	{{asset('storage/'.$formation->image_url)}}"  alt="">
          </div>
          <h4>{{$formation->titre}}</h4>
          <hr class="line-card"/>
         
          </a>  
              @endif
          @endforeach
        
     </div>
   </div>
   <h2><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i> Formations Audios </h2> 

   <div class="formations">
    <!-- les formations sous format de cards -->
     <div class="formation-cards">
        
        @foreach($formations_audio as $formation)
          @if( in_array($formation->souscategory_id, $souscategoryIds) )

          <a href=" {{route('user_formation.show',$formation->id)}} " class="formation-card">
              
          <div class="formation-card-img">  
            <img src="	{{asset('storage/'.$formation->image_url)}}"  alt="">
          </div>
          <h4>{{$formation->titre}}</h4>
          <hr class="line-card"/>
         
          </a>  
              @endif
          @endforeach
        
     </div>
   </div>
  </div>
  <div class=" categories container">
    
        <h2><i class="bi bi-caret-right-fill" style="color:rgb(0, 204, 255)"></i>  Catégorie: <span id="cat-name"> {{Auth::user()->category->nom}}</span> </h2>
        <p> Les sujets que vous pouvez parcourir: </p>
          <div class="category-item">
    
        
        <div class="ag-format-container ">
            <div class="ag-courses_box">
        @foreach( Auth::user()->souscategoriesList as $souscategory)

              <div class="ag-courses_item purple">
                <a href="{{route('souscategories_formations',$souscategory->id)}}" class="ag-courses-item_link">
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