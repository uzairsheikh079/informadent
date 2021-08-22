<div class="wrapper ">
  @include('layouts2.navbars.sidebar')
  <div class="main-panel">
    @include('layouts2.navbars.navs.auth')
    @yield('content')
    @include('layouts2.footers.auth')
  </div>
</div>