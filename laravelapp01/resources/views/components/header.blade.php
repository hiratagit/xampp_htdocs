<style>
    .navbar-brand img {
        width: 75px;
    }
</style>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="./">
      <img src="{{ asset('/img/laravel.png') }}" alt="">
        Honoka
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="./">Top <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Live demo
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./bootstrap-ja.html">Japanese Page</a>
              <a class="dropdown-item" href="./bootstrap.html">English Page</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://github.com/windyakin/Honoka/releases">Download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://github.com/windyakin/Honoka/wiki">Wiki</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>