<nav class="navbar navbar-dark bg-dark fixed-top px-2">
  <div class="container-fluid">
    <h2>
        <a class="navbar-brand" href="{{route('product.index')}}">olma.uz</a>
    </h2>
    <div class="d-flex gap-3 align-items-center">
    <form action="{{route('locale')}}" method="POST">
        @csrf
        <select name="locale" class="text-uppercase form-select" onchange="this.form.submit()">
            <option value="{{$current_locale}}">{{$current_locale}}</option>
            @foreach ($all_locales as $lang)
                @if ($lang!=$current_locale)
                    <option value="{{$lang}}">{{$lang}}</option>
                @endif
            @endforeach
        </select>
    </form>
    @auth
    <span class="text-primary">
      {{auth()->user()->name}}
    </span>
    <a href="{{route('product.create')}}" class="btn btn-outline-warning rounded-pill py-2 px-4">
        {{__("Create product")}}
    </a>

    <form action="{{route('logout')}}" method="POST">
      @csrf
      <button class="btn btn-outline-danger rounded-pill py-2 px-4">{{__("Log out")}}</button>
    </form>
    @else
    <a href="{{route('login')}}" class="btn btn-outline-warning rounded-pill py-2 px-4">
        {{__("Log in")}}
    </a>
    @endauth
    

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <span class="text-white">{{__("Category")}}</span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{__("Category")}}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        @foreach ($categories as $category)  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__("$category->name")}}
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="{{route('brandAll',[$category->id])}}" class="dropdown-item">{{__('All')}}</a></li>
            @foreach ($category->brands as $brand)
            <li><a class="dropdown-item" href="{{route('brand',[$brand->id])}}">{{$brand->name}}</a></li>           
            @endforeach
          </ul>
        </li>
        @endforeach
        </ul>
      </div>
      </div>
    </div>
  </div>
</nav>