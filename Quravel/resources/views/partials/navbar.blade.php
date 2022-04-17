<link rel="stylesheet" type="text/css" href="/css/main.css">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success" >
  <div class="container">
    <a style="font-size:50px"class="navbar-brand" href="#">Quravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a style="font-size:20px" class="nav-link {{ ($title==="home") ? 'active':''}}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a style="font-size:20px" class="nav-link {{ ($title==="touristattraction") ? 'active':''}}" aria-current="page" href="/deskripsi">Tourist Attraction</a>
        </li>
        <li class="nav-item">
            <a style="font-size:20px" class="nav-link {{ ($title==="post") ? 'active':''}}" aria-current="page" href="/post">Post</a>
        </li>
        <form action="/" class="d-flex ">
            <input class="form-control me-1" type="search" placeholder="Search"
            name="search"aria-label="Search" style="width:400px">
            <button class="btn me-5" style="font-size:20px; color:white"type="submit">Search</button>
        </form>
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-size:20px">
                    <img src="{{ url('images/username.png') }}" alt="username" style="width:30px; height:30px "> &nbsp  {{ auth()->user()->name }}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <form action="/mypost">
                        @csrf
                        <button class="dropdown-item">My Post</button>
                    </form>
                </li>
                <li><hr class="dropdown-divider"></li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item">Log Out</button>
                    </form>
                </ul>
            </li>

        @else
            <li class="nav-item ">
                <a style="font-size:20px" class="nav-link {{ ($title==="login") ? 'active':''}}"  href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a style="font-size:20px" class="nav-link {{ ($title==="register") ? 'active':''}} " href="/register">Register</a>
            </li>
        @endauth

      </ul>

    </div>
  </div>
</nav>
