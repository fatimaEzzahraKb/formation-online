<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin/dashboard.css">
    <link rel="stylesheet" href="../css/admin/form_user.css">

    <!-- bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bootsrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <div class="body-container">
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
                                <li><a href="formations.html"><i class="bi bi-person-video3"></i>Formations</a></li>
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
                    <li><a href="{{route('users.index')}}"><i class="bi bi-person-video3"></i>Formations</a></li>
                    <li>  <a href="{{route('users.index')}}"><i class="bi bi-card-list"></i> Catégories</a></li>
                    <li><a href="paramètre.html"><i class="bi bi-gear"></i>Paramètres</a></li>
                </ul>
            </nav>
        </section>
        <section class="main">
            
            <h1>Ajouter Un Nouveau utilisateur</h1>
            <div class="form-main-container">
                <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="mb-3  row-forms ">
                    <label for="username" class="form-label">Username : </label>
                    <div class="">
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                    @error('username')
                            <p class="error"> {{$message}} </p>
                        @enderror
                    </div>
                    
                </div>
                <div class="mb-3 row-forms ">
                    <label for="exampleInputEmail1" class="form-label">Email address : </label>
                    <div class="inputs">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                            <p class="error"> {{$message}} </p>
                    @enderror
                    </div>
                    
                </div>
                <div class="mb-3 row-forms">
                    <label for="exampleInputPassword1" class="form-label">Password : </label>
                    <div class="inputs">
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    
                        @error('password')
                                    <p class="error"> {{$message}} </p>
                            @enderror
                    </div>
                    
                </div>
                <div class="mb-3 row-forms">
                    <label for="confirmation" class="form-label">Verifier le mot de passe : </label>
                    <div class="inputs">
                        <input type="password"  name="password_confirmation" class="form-control" id="confirmation">
                    @error('password_confirmation')
                            <p class="error"> {{$message}} </p>
                    @enderror
                    </div>
                
                </div>
                <div class="permission-radio ">
                   <label for="">Permission : </label> 
                   <div class="checks">
                        <div class="form-check">
                            <input class="form-check-input"  type="radio" value="stagiaire" name="permission" >
                            <p class="form-check-label" for="stagiaire">
                                Stagiaire
                            </p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input"  type="radio" value="admin" name="permission" >
                            <p class="form-check-label" for="admin">
                                Admin
                            </p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input"  type="radio" value="super_admin" name="permission" >
                            <p class="form-check-label" for="super_admin">
                                Super admin
                            </p>
                        </div>
                   </div>
                    
                    @error('permission')
                            <p class="error"> {{$message}} </p>
                    @enderror
                    </div>
                    
                    <div class="row-flex" id="category">
                            <label for="">Catégorie : </label> 
                                <select class="form-select" name="category_id" id="category-select" aria-label="Default select example" onchange="updateSubcategories()">
                                    <option ></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" data-souscategories='@json($category->souscategories)'>{{ $category->nom }}</option>
                                    @endforeach
                                </select>
                        </div>
                            @error('category_id')
                                    <p class="error"> {{$message}} </p>
                            @enderror
                        
                            <div id="subcategory-container" style="display:none;">
                                <label for="">Sous-catégorie</label> 
                                    <div id="subcategory-select">

                                    </div>
                            </div>

                            </div>
                            <button type="submit" class="col-2 btn btn-primary submit-add-user">Submit</button>

                        </form>
                        
        </section>
    </div>

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
const permissionRadios = document.querySelectorAll('input[name="permission"]');
const categorySelect = document.getElementById('category');

function ToggleCategory() {
    const isStagiaireSelected = Array.from(permissionRadios).some(radio => radio.value === 'stagiaire' && radio.checked);
    const subcategoryContainer = document.getElementById('subcategory-container');
    categorySelect.style.display = isStagiaireSelected ? "flex" : "none";
    categorySelect.style.gap='30px'
    categorySelect.style.margin='10px'
    subcategoryContainer.style.display = isStagiaireSelected ? 'none' : 'none';
    if (!isStagiaireSelected) {
        subcategoryContainer.style.display = 'none';
        document.getElementById('category-select').selectedIndex = 0; // Reset category selection
        document.getElementById('subcategory-select').innerHTML = ''; // Clear previous subcategories
    }
}
permissionRadios.forEach(radio => {
    radio.addEventListener('change', ToggleCategory);
});

ToggleCategory();
function updateSubcategories() {
    const categorySelect = document.getElementById('category-select');
    const subcategorySelect = document.getElementById('subcategory-select');
    const subcategoryContainer = document.getElementById('subcategory-container');

    const selectedOption = categorySelect.options[categorySelect.selectedIndex];
    const subcategories = selectedOption ? JSON.parse(selectedOption.dataset.souscategories) : [];


    if (subcategories.length > 0) {
        subcategories.forEach(subcategory => {
            const checkbox = document.createElement('input');
            const label = document.createElement('p')
            checkbox.setAttribute('type','checkbox')
            checkbox.value = subcategory.id;
            checkbox.name = "souscategories[]";
            label.textContent = subcategory.nom;
            label.style.marginBottom='0px'
            subcategorySelect.appendChild(checkbox);
            subcategorySelect.appendChild(label);
        });
        subcategorySelect.style.display = 'flex'; 
        subcategoryContainer.style.display = 'flex'; 
        subcategoryContainer.style.gap = '30px'; 
        subcategorySelect.style.gap = '10px'; 
        subcategoryContainer.style.alignItems = 'center'; 
        subcategorySelect.style.alignItems = 'center'; 
    } else {
        subcategoryContainer.style.display = 'none'; 
    }

}


    </script>
</body>
</html>