<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/admin/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/user_index.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/user_show.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/categories.css')}}">
    <!-- bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bootsrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.semanticui.css">
    <title>Document</title>
</head>
<body>
    <div class="full-container">

    
    <div class="body-container  ">
    <section class="navbar">
            <nav>
                <div class="responsive-menu">
                   
                    <button type="button" class="menu-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                  </button>
                  
                  <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            <div class="top">
                            <img src="../images/logo-udemy.png" alt="">
                        

                        </div><hr class="line"/>
                      </div>
                    <div class="offcanvas-header sidebar">
                        
                    
                        <nav>
                            <ul>
                                <li> <a href="{{route('admin')}}"><i class="bi bi-speedometer2"></i>Dashboard</a></li>
                                <li><a href="{{route('users.index')}}"><i class="bi bi-person"></i>Utilisateurs</a></li>
                                <li><a href="{{route('formations.index')}}"><i class="bi bi-person-video3"></i>Formations</a></li>
                                <li>  <a href="categories.html"><i class="bi bi-card-list"></i> Catégories</a></li>
                                <li><a href="paramètre.html"><i class="bi bi-gear"></i>Paramètres</a></li>
                            </ul>
                        </nav>
               
                  </div>
                  </div>  
                </div>
                <div class="search">
                <svg viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="Magnifer--Streamline-Solar-Ar" height="24" width="24"><desc>Magnifer Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M0.6628125 7.158125C0.6628125 12.158249999999999 6.0755625 15.2833125 10.4058125 12.783249999999999C12.4155 11.623000000000001 13.653500000000001 9.4786875 13.653500000000001 7.158125C13.653500000000001 2.158 8.2406875 -0.9670624999999999 3.9104375000000005 1.533C1.9008125 2.6933125 0.6628125 4.8375625 0.6628125 7.158125" stroke-width="1"></path><path d="M11.944187500000002 11.944187500000002L14.337187499999999 14.337187499999999" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>
                    <input type="text" id="serach-input" placeholder="Search..." class="search-input">
                </div>
                <div class="account">
                    <svg id="account-btn" viewBox="-0.5 -0.5 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="User-Circle--Streamline-Solar-Ar" height="24" width="24"><desc>User Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#000000" d="M5.4488125 5.4488125C5.4488125 7.0278125000000005 7.158125 8.014687499999999 8.5255625 7.2251875C9.1601875 6.8588125 9.551187500000001 6.1816249999999995 9.551187500000001 5.4488125C9.551187500000001 3.869875 7.841875 2.883 6.4744375 3.6725000000000003C5.8398125 4.038875 5.4488125 4.716 5.4488125 5.4488125" stroke-width="1"></path><path stroke="#000000" d="M0.6628125 7.5C0.6628125 12.7633125 6.3604375 16.0528125 10.918624999999999 13.4211875C13.034062500000001 12.199875 14.337187499999999 9.9426875 14.337187499999999 7.5C14.337187499999999 2.2366875 8.6395625 -1.0528125000000002 4.0813749999999995 1.5788125C1.9659375000000001 2.800125 0.6628125 5.0573125 0.6628125 7.5" stroke-width="1"></path><path d="M11.58125 12.96975C11.4725 10.9928125 10.8671875 9.551187500000001 7.5 9.551187500000001C4.132874999999999 9.551187500000001 3.5275625 10.9928125 3.4187499999999997 12.96975" stroke="#000000" stroke-linecap="round" stroke-width="1"></path></svg>
                    <div id="account-dropdown" class="account-dropdown invisible">
                        <div class="info-acc" style=" padding-bottom:5px">
                            <h6 style='width:150px;'>Welcome {{Auth::user()->username}} </h6>
                            <p> @if(Auth::check())
                                 {{ Auth::user()->email }}
                            @else
                                Welcome, Guest
                            @endif</p>
                        </div>
                        <hr  style="margin:0px">
                        <ul>
                            <li><i class="bi bi-person-fill"></i>Profile</li>
                            <li><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                <i class="bi bi-box-arrow-right"></i>
                                <a style="color:gray; text-transform:none; " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out</a> 
                            </li>  
                        </ul>
                    </div>
                
                
            </div>
            </nav>
            
        </section>
        <section class="sidebar">
            <div class="top">
                <img src="../images/logo-udemy.png" alt="">
            </div>
            <hr class="line"/>
        
            <nav>
                <ul>
                    <li> <a href="{{route('admin')}}"><i class="bi bi-speedometer2"></i>Dashboard</a></li>
                    <li><a href="{{route('users.index')}}"><i class="bi bi-person"></i>Utilisateurs</a></li>
                    <li><a href="{{route('formations.index')}}"><i class="bi bi-person-video3"></i>Formations</a></li>
                    <li>  <a href="{{route('users.index')}}"><i class="bi bi-card-list"></i> Catégories</a></li>
                    <li><a href="paramètre.html"><i class="bi bi-gear"></i>Paramètres</a></li>
                </ul>
            </nav>
        </section>
        <section class="main">
            <div class="container ">
                <div class="main-body">
                
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{route('admin')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href=" {{route('formations.index')}} ">Formations</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> {{$formation->titre}} </li>
                        </ol>
                    </nav>
                    <!-- /Breadcrumb -->
                
                    <div class="row gutters-sm">
                        <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                            <img src=" {{asset('storage/'.$formation->image_url)}} " style=' height:150px;' alt="">
                                
                                <div class="mt-3">
                                <h4>{{$formation->titre}}</h4>
                                <p class="text-muted font-size-sm" style='text-transform: capitalize;'> {{$formation->category->nom}} </p>
                                <p class="text-secondary mb-1" style='text-transform: capitalize; '>{{ $formation->souscategory->nom }}</p>
                                
                                <!-- <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                            <p> {{$formation->description}} </p>
                            <hr>
                           <div style="text-align:end; display:flex; justify-content:end; gap:10px;"> <h5 > Catégorie: </h5>  <p> {{$formation->category->nom}}</p> </div>
                           <div style="text-align:end; display:flex; justify-content:end; gap:10px;"> <h5 >  Souscatégorie: </h5>  <p> {{$formation->souscategory->nom}}</p> </div>
                            
                            

                            </div>
                        </div>

                        


                        </div>
                        @if(Auth::user()->permission === "super_admin")
                                <div class="row mt-6">
                                    <div class="" style="display:flex; justify-content:space-between;">
                                        <form action="{{route('formations.edit', $formation->id)}}" method="GET" style="display:inline;">
                                            @csrf
                                            <button class="btn btn-info" type="submit">
                                                Modifier
                                            </button>
                                        </form>
                                        <form action="{{route('formations.destroy', $formation->id)}}" method="post" style="display:inline;" onsubmit="return confirm('Vous êtes sûr que vous voulez supprimer cet utilisateur')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <div class=" mt-3">
                        <div class="card mb-3 mt-8">
                            <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                            <img src=" {{asset('storage/'.$formation->image_url)}} " style=' height:150px;' alt="">
                                
                                <div class="mt-3">
                                <h4>{{$formation->titre}}</h4>
                                <p class="text-muted font-size-sm" style='text-transform: capitalize;'> {{$formation->category->nom}} </p>
                                <p class="text-secondary mb-1" style='text-transform: capitalize; '>{{ $formation->souscategory->nom }}</p>
                                
                                <!-- <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    
            </div>
        </section>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script> 
        	const account_btn = document.getElementById('account-btn')
        const account_dropdown = document.getElementById("account-dropdown")
            function ToggleClass(classname,element){
                element.classList.toggle(classname)
                
            }
            account_btn.addEventListener('click',function(){
                ToggleClass("invisible",account_dropdown)
            })
            document.addEventListener('click', function(event) {
               if (!account_btn.contains(event.target) && !account_dropdown.contains(event.target)) {
                    account_dropdown.classList.add("invisible"); 
                }
    });

    </script>
</body>
</html>