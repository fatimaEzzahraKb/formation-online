<div class="responsive-search-page " id="search-page">
    <img src="{{asset('images/close.png')}}" id="close-search" alt="">
      
      <div class="searching">

      <svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="Magnifer--Streamline-Solar-Ar" height="24" width="24"><desc>Magnifer Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M0.6628125 7.158125C0.6628125 12.158249999999999 6.0755625 15.2833125 10.4058125 12.783249999999999C12.4155 11.623000000000001 13.653500000000001 9.4786875 13.653500000000001 7.158125C13.653500000000001 2.158 8.2406875 -0.9670624999999999 3.9104375000000005 1.533C1.9008125 2.6933125 0.6628125 4.8375625 0.6628125 7.158125" stroke-width="1"></path><path d="M11.944187500000002 11.944187500000002L14.337187499999999 14.337187499999999" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>
      <input type="text" placeholder="Search..." class="search-input" id="search-input-resp"/>
      </div>
      <div class="results results-resp">
          <ul>

          </ul>
      </div>
    </div>
<header class="" >
    
     <nav class="per-container navbar">
      <a href="{{route('acceuil')}}" class="top logo-img"> <h1><span class="V"> V</span> Formations</h1>
      </a>
      
       <div class="search">
         <svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="Magnifer--Streamline-Solar-Ar" height="24" width="24"><desc>Magnifer Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M0.6628125 7.158125C0.6628125 12.158249999999999 6.0755625 15.2833125 10.4058125 12.783249999999999C12.4155 11.623000000000001 13.653500000000001 9.4786875 13.653500000000001 7.158125C13.653500000000001 2.158 8.2406875 -0.9670624999999999 3.9104375000000005 1.533C1.9008125 2.6933125 0.6628125 4.8375625 0.6628125 7.158125" stroke-width="1"></path><path d="M11.944187500000002 11.944187500000002L14.337187499999999 14.337187499999999" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>
         <input type="text" placeholder="Search..." class="search-input" id="search-input"/>
         
        </div>
        <div class="results results-desk invisible-search">
            <ul>

            </ul>
         </div>
        <menu class="menu">
        <ul class="menu-list">
         <li><a href="{{route('acceuil')}}" class="text-link">Accueil</a></li>
         <li><a href="{{route('about')}}"class="text-link" >à propos</a></li>
         <li><a href="{{route('favoris.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
         <li class="account">
            <svg id="user-info" viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="User-Circle--Streamline-Solar-Ar " height="24" width="24" ><desc>User Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M5.4488125 5.4488125C5.4488125 7.0278125000000005 7.158125 8.014687499999999 8.5255625 7.2251875C9.1601875 6.8588125 9.551187500000001 6.1816249999999995 9.551187500000001 5.4488125C9.551187500000001 3.869875 7.841875 2.883 6.4744375 3.6725000000000003C5.8398125 4.038875 5.4488125 4.716 5.4488125 5.4488125" stroke-width="1"></path><path stroke="#000000" d="M0.6628125 7.5C0.6628125 12.7633125 6.3604375 16.0528125 10.918624999999999 13.4211875C13.034062500000001 12.199875 14.337187499999999 9.9426875 14.337187499999999 7.5C14.337187499999999 2.2366875 8.6395625 -1.0528125000000002 4.0813749999999995 1.5788125C1.9659375000000001 2.800125 0.6628125 5.0573125 0.6628125 7.5" stroke-width="1"></path><path d="M11.58125 12.96975C11.4725 10.9928125 10.8671875 9.551187500000001 7.5 9.551187500000001C4.132874999999999 9.551187500000001 3.5275625 10.9928125 3.4187499999999997 12.96975" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>  
            <div class="dropdown-acc invisible" id="dropdown-acc">
                <div class="dropdown-head">
                    <h5> {{Auth::user()->username}} </h5>
                    <p> {{Auth::user()->email}} </p>
                </div>
                <hr >
                <div class="dropdown-links">
                    <ul class="dropdown-links-list">
                        <li> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <i class="bi bi-box-arrow-right"></i>
                            <a style=" text-transform:none; " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Se déconnecter</a>
                        </li>
                    </ul>
                </div>
            </div>    
        </li>
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
            <div class="top" >
              <h1><span class="V"> V</span> Formations</h1>
          
            </div>
           </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul>
           <li></li>
            <li style="display:flex; gap:15px " ><i class="bi bi-house"></i>  <a href="{{route('acceuil')}}"> Acceuil</a></li>
            <li style="display:flex; gap:15px " ><i class="bi bi-heart"></i> <a href="{{route('favoris.index')}}" >  Favoris</a></li>
            <li style="display:flex; gap:15px " ><i class="bi bi-info-square-fill"></i> <a href="{{route('about')}}">  À propos</a></li>
            <hr>
            <li><a style=" text-transform:none; " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> Se déconnecter</a>
            </li>
          </ul>  
          </div>
   
      </div>
      </div>  
     </nav>
     
   </header>

   <script>
        const drop_down_btn = document.getElementById('user-info');
        const drop_down_view = document.getElementById('dropdown-acc')
        function DropdownToggle(content,classname){
          content.classList.toggle(classname)
        }
        drop_down_btn.addEventListener('click',function(){
          DropdownToggle(drop_down_view,'invisible')
        })
        document.addEventListener('click', function(event) {
               if (!drop_down_view.contains(event.target) && !drop_down_btn.contains(event.target)) {
                drop_down_view.classList.add("invisible"); 
                }
            })
        const search_res_button = document.getElementById('responsive-search-btn')
        const close_search_btn = document.getElementById('close-search')
        const search_page = document.getElementById('search-page') ;
        function toggleRespSearch(){
            search_page.classList.toggle('visible')
        }
        search_res_button.addEventListener('click',toggleRespSearch)
        close_search_btn.addEventListener('click',toggleRespSearch)
        // NOT RESPONSIVE
        document.getElementById('search-input').addEventListener('input',function(){
          const query  = this.value;
          const results = document.querySelector('.results-desk')
          const resultsDiv = document.querySelector('.results-desk ul')

          
          if(query.length>1){
            fetch(`{{route('search')}}?query=${query}`)
              .then(response => response.json())
              .then(data=>{
                
                
                
                resultsDiv.innerHTML = "";
                results.classList.add('visible-search'); 
                results.classList.remove('invisible-search'); 
                  console.log(results.classList)
                data.forEach(item =>{
                  const resultItem = document.createElement('li');
                  const resultItemLink = document.createElement('a');
                  resultItemLink.href  = `{{route('user_formation.show',':id')}}`.replace(':id',item.id)
                  resultItem.className='result-item';
                const resultItemTitle = document.createElement('p');
                const resultItemImage = document.createElement('img');

                resultItemTitle.innerText = item.titre;
                resultItemImage.src =  `{{asset('storage/${item.image_url}')}}`
                resultItemImage.className = "search-images"
                resultItemLink.appendChild(resultItemImage);
                resultItemLink.appendChild(resultItemTitle);
                resultItem.appendChild(resultItemLink);
                resultsDiv.appendChild(resultItem);
                  
                }
                
                )
                
                if(data.length===0 ){
                resultsDiv.innerHTML = "Aucun résultat trouvée";
                } 
              })
          }
          else if(query.length === 0){
            resultsDiv.innerHTML = "";
            results.classList.remove('visible-search')
            results.classList.add('invisible-search')

          }
        })  
        // RESPONSIVE
        document.getElementById('search-input-resp').addEventListener('input',function(){
          const query  = this.value;
          const resultsDiv = document.querySelector('.results-resp ul')

          if(query.length>1){
            fetch(`{{route('search')}}?query=${query}`)
              .then(response => response.json())
              .then(data=>{
                resultsDiv.innerHTML = "";

                data.forEach(item =>{
                  const resultItem = document.createElement('li');
                  const resultItemLink = document.createElement('a');
                  resultItemLink.href  = `{{route('user_formation.show',':id')}}`.replace(':id',item.id)
                  resultItem.className='result-item';
                const resultItemTitle = document.createElement('p');
                const resultItemImage = document.createElement('img');

                resultItemTitle.innerText = item.titre;
                resultItemImage.src =  `{{asset('storage/${item.image_url}')}}`
                resultItemImage.className = "search-images-resp"
                resultItemLink.appendChild(resultItemImage);
                resultItemLink.appendChild(resultItemTitle);
                resultItem.appendChild(resultItemLink);
                resultsDiv.appendChild(resultItem);
                  
                }
                
                )
                
                if(data.length===0){
                resultsDiv.innerHTML = "Aucun résultat trouvée";

                }
              })
          }
          else{
            resultsDiv.innerHTML = "";

          }
        })
        
   </script>