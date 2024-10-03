<section class="sidebar">
            <div class="top">
                <h1><span class="V"> V</span> Formations</h1>
                <!-- <img src="{{asset('images/logo-udemy.png')}}" alt=""> -->
            </div>
            <hr class="line"/>
        
            <nav>
                <ul>
                    <li  class="{{ request()->is('admin') ? 'active-sidebar' : '' }}"> <a href="{{route('admin')}}"><i class="bi bi-speedometer2"></i>Dashboard</a></li>
                    <li class = " {{request()->is('users*') ? 'active-sidebar' : ''}} "><a href="{{route('users.index')}}"><i class="bi bi-person"></i>Utilisateurs</a></li>
                    <li  class="{{ request()->is('formation*') ? 'active-sidebar' : '' }}"><a href="{{route('formations.index')}}"><i class="bi bi-person-video3"></i>Formations</a></li>
                    <li  class="{{ request()->is('categories*') ? 'active-sidebar' : '' }}">  <a href="{{route('categories.index')}}"><i class="bi bi-card-list"></i> Catégories</a></li>
                    <li  class="{{ request()->is('settings') ? 'active-sidebar' : '' }}"><a href="{{route('settings')}}"><i class="bi bi-gear"></i>Paramètres</a></li>
                </ul>
            </nav>
        </section>
        