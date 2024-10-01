<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin/dashboard.css">
    <link rel="stylesheet" href="{{asset('css/admin/user_index.css')}}">

    <!-- Sementic UI (for pagination) -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <!-- bootstrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Bootsrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="../css/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Apex charts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class="body-container ">
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
                                <li>  <a href="{{route('categories.index')}}"><i class="bi bi-card-list"></i> Catégories</a></li>
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
                    <li>  <a href="{{route('categories.index')}}"><i class="bi bi-card-list"></i> Catégories</a></li>
                    <li><a href="paramètre.html"><i class="bi bi-gear"></i>Paramètres</a></li>
                </ul>
            </nav>
        </section>
        <section class="main container">
            <h1 style="margin-bottom:50px"> Bienvenue {{Auth::user()->username}} 👋</h1>
            <div class="main-cards">
                <div class="card-dashboard">
                    <i class="bi bi-collection-play"></i>
                    <div>
                    <h1 id="nombre-formations"> {{$formations->count()}} </h1>
                    <h4>  Formations</h4>    
                    </div>
                    
                </div>
                <div class="card-dashboard">
                    <i class="bi bi-people-fill"></i>
                    <div>
                    <h1 id="nombre-utilisateurs"> {{$users->count()}} </h1>
                    <h4>  Utilisateurs</h4>
                    </div>
                </div>
                <div class="card-dashboard">
                    <i class="bi bi-card-list"></i> 
                    <div> 
                    <h1 id="nombre-categorie"> {{$categories->count()}} </h1>
                    <h4>  Catégorie</h4>
                    </div>
                </div>
            </div>
            <div class="charts">
            <input type="hidden" id='charts_data' data-categories ='@json($categories_chart)' data-users = '@json($users_chart)' >
            <canvas id="myPieChart" width="100" height="100"></canvas>
            <canvas id="myBarChart" width="100" height="100"></canvas>
            <canvas id="chart" width="100" height="100"></canvas>
            </div>
            <div class="tables-dashboard">
                <a href=" {{route('users.index')}} ">
                    <h3>Utilisateurs</h3>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Catégories</th>
                            <th scope="col">Sous-catégories</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>

                            </tr>
                                <td> {{$user->id}} </td>
                                <td> {{$user->username}} </td>
                                <td> {{$user->email}} </td>
                                <td> @if($user->category) {{$user->category->nom}} @endif </td>
                                <td> 
                                    @if($user->souscategoriesList->isEmpty())
                                        __
                                    @else
                                    {{$user->souscategoriesList->pluck('nom')->join(',')}}
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('vendor.pagination.semantic-ui') }} 
                </a>
            </div>
            <div class="tables-dashboard">
                <a href=" {{route('formations.index')}} ">
                    <h3>Formations</h3>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Catégories</th>
                            <th scope="col">Sous-catégories</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formations as $formation)
                            <tr>

                            </tr>
                                <td> {{$formation->id}} </td>
                                <td> {{$formation->titre}} </td>
                                <td> {{$formation->category->nom}} </td>
                                <td>  {{$formation->souscategory->nom}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $formations->links('vendor.pagination.semantic-ui') }} 
                </a>
            </div>
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
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const categories_pie_data = document.getElementById('charts_data').getAttribute('data-categories')
        const categories = JSON.parse(categories_pie_data)
        const pie_labels = categories.map(category => category.nom)
        const pie_data = categories.map(category => category.total)
        
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: pie_labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: pie_data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgb(205, 248, 205)',
                        "#ff8c8c",
                        '#fffed8',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        ' rgb(30, 218, 30)',
                        "#ff562c",
                        "#fffb2c",
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Nombre de formation par sous-catégorie'
                    }
                }
            }
        });
        const barCtx = document.getElementById('myBarChart').getContext('2d');
        const users_bar_data = document.getElementById('charts_data').getAttribute('data-users')
        const users = JSON.parse(users_bar_data)
        const bar_labels = users.map(user => user.nom )
        const bar_data = users.map(user => user.nom !== null ? user.total : null)
        const myBarChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: bar_labels,
                datasets: [{
                    label: 'Nombre d\'utilisateur par catégorie',
                    data: bar_data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgb(205, 248, 205)',
                        "#ff8c8c",
                        '#fffed8',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        ' rgb(30, 218, 30)',
                        "#ff562c",
                        "#fffb2c",
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Nombre d\'utilisateur par catégorie'
                    }
                }
            }
        });
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: bar_data
            }],
            xaxis: {
                categories: bar_labels
            }
            }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
        </script>
</body>
</html>