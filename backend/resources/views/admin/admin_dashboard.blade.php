@extends('admin.layout')
@section('title','Dashboard')
@section('content')
       
            <h2 style="text-align:start;font-size:30px;font-weight:500;margin-bottom:50px"> Bienvenue {{Auth::user()->username}} 👋</h2>
            <div class="main-cards">
                <div class="card-dashboard">
                    <i class="bi bi-collection-play"></i>
                    <div>
                    <h1 id="nombre-formations"> {{$formation_total}} </h1>
                    <h4>  Formations</h4>    
                    </div>
                    
                </div>
                <div class="card-dashboard">
                    <i class="bi bi-people-fill"></i>
                    <div>
                    <h1 id="nombre-utilisateurs"> {{$user_total}} </h1>
                    <h4>  Utilisateurs</h4>
                    </div>
                </div>
                <div class="card-dashboard">
                    <i class="bi bi-card-list"></i> 
                    <div> 
                    <h1 id="nombre-categorie"> {{$categories->count()}} </h1>
                    <h4>  Catégories</h4>
                    </div>
                </div>
            </div>
            <div class="charts">
            <input type="hidden" id='charts_data' data-categories ='@json($categories_chart)' data-users = '@json($users_chart)' >
            <canvas id="myPieChart" width="100" height="100" style="font-size:50px"></canvas>
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
    </div>
@endsection
@section('scripts')
    <script>
       
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
                    label: 'Formations',
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
                        labels:{
                            font:{
                                size:15
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Nombre de formation par sous-catégorie',
                        font: {
                        size: 20 // Set font size for legend labels
                    }
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
                    label: 'Nombre d\'utilisateur ',
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
                        labels:{
                            font:{
                                size:15
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Nombre d\'utilisateur par catégorie',
                        font: {
                        size: 20 // Set font size for legend labels
                    }
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
@endsection