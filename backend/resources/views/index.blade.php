<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- css links  -->
 <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
 <link rel="stylesheet" href="{{asset('css/index/hero.css')}}">
 <link rel="stylesheet" href="{{asset('css/footer.css')}}">
  <link rel="stylesheet" href="{{asset('css/index/formation.css')}}">

 <!-- font links -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link rel="stylesheet" href="{{asset('css/bootstrap-5.3.3-dist/css/bootstrap.min.css')}}">

 <!-- bootstrap links -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js')}}"></script>
 
 <title>Document</title>
</head>
<body >
   <div class="responsive-search-page " id="search-page">
      <img src="images/close.png" id="close-search" alt="">
      <div class="searching">

      <svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="Magnifer--Streamline-Solar-Ar" height="24" width="24"><desc>Magnifer Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M0.6628125 7.158125C0.6628125 12.158249999999999 6.0755625 15.2833125 10.4058125 12.783249999999999C12.4155 11.623000000000001 13.653500000000001 9.4786875 13.653500000000001 7.158125C13.653500000000001 2.158 8.2406875 -0.9670624999999999 3.9104375000000005 1.533C1.9008125 2.6933125 0.6628125 4.8375625 0.6628125 7.158125" stroke-width="1"></path><path d="M11.944187500000002 11.944187500000002L14.337187499999999 14.337187499999999" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>
      <input type="text" placeholder="Search..." class="search-input"/>
      </div>
      <div class="results">

      </div>
    </div>
    <header class="" >
    
     <nav class="per-container navbar">
      <a href="index.html" class="logo-img"> <img src="images/logo-udemy.png" alt="logo"></a>
      
       <div class="search">
         <svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="Magnifer--Streamline-Solar-Ar" height="24" width="24"><desc>Magnifer Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M0.6628125 7.158125C0.6628125 12.158249999999999 6.0755625 15.2833125 10.4058125 12.783249999999999C12.4155 11.623000000000001 13.653500000000001 9.4786875 13.653500000000001 7.158125C13.653500000000001 2.158 8.2406875 -0.9670624999999999 3.9104375000000005 1.533C1.9008125 2.6933125 0.6628125 4.8375625 0.6628125 7.158125" stroke-width="1"></path><path d="M11.944187500000002 11.944187500000002L14.337187499999999 14.337187499999999" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>
         <input type="text" placeholder="Search..." class="search-input" />
        </div>
        <menu class="menu">
        <ul>
         <li><a href="index.html" class="text-link">Acceuil</a></li>
         <li><a href=""class="text-link" >à propos</a></li>
         <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
         <li class="account"><a ><svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="User-Circle--Streamline-Solar-Ar" height="24" width="24"><desc>User Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M5.4488125 5.4488125C5.4488125 7.0278125000000005 7.158125 8.014687499999999 8.5255625 7.2251875C9.1601875 6.8588125 9.551187500000001 6.1816249999999995 9.551187500000001 5.4488125C9.551187500000001 3.869875 7.841875 2.883 6.4744375 3.6725000000000003C5.8398125 4.038875 5.4488125 4.716 5.4488125 5.4488125" stroke-width="1"></path><path stroke="#000000" d="M0.6628125 7.5C0.6628125 12.7633125 6.3604375 16.0528125 10.918624999999999 13.4211875C13.034062500000001 12.199875 14.337187499999999 9.9426875 14.337187499999999 7.5C14.337187499999999 2.2366875 8.6395625 -1.0528125000000002 4.0813749999999995 1.5788125C1.9659375000000001 2.800125 0.6628125 5.0573125 0.6628125 7.5" stroke-width="1"></path><path d="M11.58125 12.96975C11.4725 10.9928125 10.8671875 9.551187500000001 7.5 9.551187500000001C4.132874999999999 9.551187500000001 3.5275625 10.9928125 3.4187499999999997 12.96975" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg></a></li>  
        </ul>
       </menu>
       <div class="responsive-menu">
        <div class="responsive-search-btn" id="responsive-search-btn">
          <svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="Magnifer--Streamline-Solar-Ar" height="24" width="24"><desc>Magnifer Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M0.6628125 7.158125C0.6628125 12.158249999999999 6.0755625 15.2833125 10.4058125 12.783249999999999C12.4155 11.623000000000001 13.653500000000001 9.4786875 13.653500000000001 7.158125C13.653500000000001 2.158 8.2406875 -0.9670624999999999 3.9104375000000005 1.533C1.9008125 2.6933125 0.6628125 4.8375625 0.6628125 7.158125" stroke-width="1"></path><path d="M11.944187500000002 11.944187500000002L14.337187499999999 14.337187499999999" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>
  
        </div>
       
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>
      
      <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel" class="user-icon-resp">       
            <a href=""><svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="User-Circle--Streamline-Solar-Ar" height="40" width="40"><desc>User Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M5.4488125 5.4488125C5.4488125 7.0278125000000005 7.158125 8.014687499999999 8.5255625 7.2251875C9.1601875 6.8588125 9.551187500000001 6.1816249999999995 9.551187500000001 5.4488125C9.551187500000001 3.869875 7.841875 2.883 6.4744375 3.6725000000000003C5.8398125 4.038875 5.4488125 4.716 5.4488125 5.4488125" stroke-width="1"></path><path stroke="#000000" d="M0.6628125 7.5C0.6628125 12.7633125 6.3604375 16.0528125 10.918624999999999 13.4211875C13.034062500000001 12.199875 14.337187499999999 9.9426875 14.337187499999999 7.5C14.337187499999999 2.2366875 8.6395625 -1.0528125000000002 4.0813749999999995 1.5788125C1.9659375000000001 2.800125 0.6628125 5.0573125 0.6628125 7.5" stroke-width="1"></path><path d="M11.58125 12.96975C11.4725 10.9928125 10.8671875 9.551187500000001 7.5 9.551187500000001C4.132874999999999 9.551187500000001 3.5275625 10.9928125 3.4187499999999997 12.96975" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg></a>        
             <h4>Users Name</h4>
           </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul>
           <li></li>
            <li><a href="index.html">Acceuil</a></li>
            <li><a href="">Mon Apprentissage</a></li>
            <li><a href="">Favoris</a></li>             
            <li><a href="">Historique</a></li>             
          </ul>  
          </div>
   
      </div>
      </div>  
     </nav>
     
   </header>
   <div class="hero per-container">
    <h3>Nous sommes ravis de vous retrouver, 'nom utilisateur'</h3>
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
        <!-- <div class="card-list">
          <article class="card">
          <figure class="card-image">
            <img src="https://images.unsplash.com/photo-1494253109108-2e30c049369b?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYyNDcwMTUwOQ&ixlib=rb-1.2.1&q=85" alt="An orange painted blue, cut in half laying on a blue background" />
          </figure>
          <div class="card-header">
            <a href="#"> Python : la formation la plus complète avec 15 projets</a>
            <button class="icon-button">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
              </svg>
        
            </button>
          </div>
          <div class="card-footer">
            <div class="card-meta card-meta--views">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="EyeOpen">
                <path d="M21.257 10.962c.474.62.474 1.457 0 2.076C19.764 14.987 16.182 19 12 19c-4.182 0-7.764-4.013-9.257-5.962a1.692 1.692 0 0 1 0-2.076C4.236 9.013 7.818 5 12 5c4.182 0 7.764 4.013 9.257 5.962z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
              2,465
            </div>
            <div class="card-meta card-meta--date">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
                <rect x="2" y="4" width="20" height="18" rx="4" />
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <path d="M2 10h20" />
              </svg>
              Jul 26, 2019
            </div>
          </div>
        </article>
        </div> -->
        <a href="" class="formation-card">
        
          <img src="	https://img-c.udemycdn.com/course/240x135/1011114_a6c2.jpg  " alt="">
          <h4>Python: La formation complète Avec 15 projets</h4>
          <hr class="line-card"/>
          <div class="card-meta card-meta--date">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
              <rect x="2" y="4" width="20" height="18" rx="4" />
              <path d="M8 2v4" />
              <path d="M16 2v4" />
              <path d="M2 10h20" />
            </svg>
            Jul 26, 2019
          </div>
          
        </a>    
        <a href="" class="formation-card">
        
    <img src="	https://img-c.udemycdn.com/course/240x135/1184692_84bb_2.jpg  " alt="">
    <h4>Python: La formation complète Avec 15 projets</h4>
    <hr class="line-card"/>
    <div class="card-meta card-meta--date">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
        <rect x="2" y="4" width="20" height="18" rx="4" />
        <path d="M8 2v4" />
        <path d="M16 2v4" />
        <path d="M2 10h20" />
      </svg>
      Jul 26, 2019
    </div>
    
      </a>   
      <a href="" class="formation-card">
              
        <img src="	https://img-c.udemycdn.com/course/240x135/805992_d306_8.jpg   " alt="">
        <h4>Python: La formation complète Avec 15 projets</h4>
        <hr class="line-card"/>
        <div class="card-meta card-meta--date">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
            <rect x="2" y="4" width="20" height="18" rx="4" />
            <path d="M8 2v4" />
            <path d="M16 2v4" />
            <path d="M2 10h20" />
          </svg>
          Jul 26, 2019
        </div>
        
      </a>   
      <a href="" class="formation-card">
              
        <img src="	https://img-c.udemycdn.com/course/240x135/1011114_a6c2.jpg  " alt="">
        <h4>Python: La formation complète Avec 15 projets</h4>
        <hr class="line-card"/>
        <div class="card-meta card-meta--date">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
            <rect x="2" y="4" width="20" height="18" rx="4" />
            <path d="M8 2v4" />
            <path d="M16 2v4" />
            <path d="M2 10h20" />
          </svg>
          Jul 26, 2019
        </div>
        
      </a>   
      <a href="" class="formation-card">
              
        <img src="	https://img-c.udemycdn.com/course/240x135/1011114_a6c2.jpg  " alt="">
        <h4>Python: La formation complète Avec 15 projets</h4>
        <hr class="line-card"/>
        <div class="card-meta card-meta--date">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
            <rect x="2" y="4" width="20" height="18" rx="4" />
            <path d="M8 2v4" />
            <path d="M16 2v4" />
            <path d="M2 10h20" />
          </svg>
          Jul 26, 2019
        </div>
        
      </a>   
      <a href="" class="formation-card">
              
        <img src="	https://img-c.udemycdn.com/course/240x135/1011114_a6c2.jpg  " alt="">
        <h4>Python: La formation complète Avec 15 projets</h4>
        <hr class="line-card"/>
        <div class="card-meta card-meta--date">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
            <rect x="2" y="4" width="20" height="18" rx="4" />
            <path d="M8 2v4" />
            <path d="M16 2v4" />
            <path d="M2 10h20" />
          </svg>
          Jul 26, 2019
        </div>
        
      </a>   
      <a href="" class="formation-card">
              
        <img src="	https://img-c.udemycdn.com/course/240x135/1011114_a6c2.jpg  " alt="">
        <h4>Python: La formation complète Avec 15 projets</h4>
        <hr class="line-card"/>
        <div class="card-meta card-meta--date">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
            <rect x="2" y="4" width="20" height="18" rx="4" />
            <path d="M8 2v4" />
            <path d="M16 2v4" />
            <path d="M2 10h20" />
          </svg>
          Jul 26, 2019
        </div>
        
      </a>   
      <a href="" class="formation-card">
              
        <img src="	https://img-c.udemycdn.com/course/240x135/805992_d306_8.jpg " alt="">
        <h4>Python: La formation complète Avec 15 projets </h4>
        <hr class="line-card"/>
        <div class="card-meta card-meta--date">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
            <rect x="2" y="4" width="20" height="18" rx="4" />
            <path d="M8 2v4" />
            <path d="M16 2v4" />
            <path d="M2 10h20" />
          </svg>
          Jul 26, 2019
        </div>
        
      </a>   
      <a href="" class="formation-card">
              
        <img src="	https://img-c.udemycdn.com/course/240x135/1011114_a6c2.jpg  " alt="">
        <h4>Python: La formation complète Avec 15 projets</h4>
        <hr class="line-card"/>
        <div class="card-meta card-meta--date">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
            <rect x="2" y="4" width="20" height="18" rx="4" />
            <path d="M8 2v4" />
            <path d="M16 2v4" />
            <path d="M2 10h20" />
          </svg>
          Jul 26, 2019
        </div>
        
      </a>   
      
     </div>
   </div>
  </div>
   <footer> 
  
    <div class="container ">
      <div class="footer-infos">
         <div class="nos-services ">
      <h4>Nos Services</h4>
      <a href="#">- Nettoyage pour les particuliers</a>
     <a href="#"> - Nettoyage pour les professionnels</a>
     <a href="#">- Nettoyage fin de chantier Casablanca</a>    
      <a href="#">- Nettoyage industriel Casablanca</a>    
      <a href="#">- Nettoyage de moquette Casablanca</a>    
      <a href="#">- Nettoyage du parquet Casablanca</a>    
      <a href="#"> - Nettoyage des vitres Casablanca </a>
      
        <a href="#"> - Cristallisation du marbre Casablanca </a>
      </div>
      <div class="sites-contact">
        <div class="intro">
            <h4>Société de nettoyage Casablanca</h4>
            <p>Notre société de nettoyage sur Casablanca attache une grande importance à l’image de vos locaux et un vrai savoir-faire dans le secteur du nettoyage et le ménage pour cela nous vous offrons des services de qualité et des prix attractifs, par un nombre de sites partout au Maroc.
            </p>
          </div>
          <div class="sites">
              <h4>Notre site web</h4>
              <a href=""> - Accueil</a> 
              <a href="">- Devis en ligne</a>
              <a href="">- Produits de Nettoyage</a>
          </div> 
      </div>
     
        <div class="contact">
        <h4>Contact</h4>
        <ul>
          <li>Mobile : +212 668 31 19 </li>
          <li>Fixe : +212 606 38 38 58</li>
          <li>Fax : +212 522 38 82 38</li>
          <li> Adresse 1 : 46 BD Zarktouni, 6éme ETG Casablanca.</li>
          <li> Adresse 2 : Rue Ahmed Touki N° 7 étage 2 Casablanca.</li>
          <li> Adresse 3 : 10 Rue ghandi R202 Rabat.</li>
          <li>Email: pnsmaroc@gmail.com</li>
        </ul>
      </div>
    </div>
    <div class="footer-underline">
      <hr class="line-footer">
      <p class="copy-right">© 2018. Buy PNS.</p>
    </div>
    </div> 
  
  </footer>
   <script src="js/search.js"></script>
</body>
</html>