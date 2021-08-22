<head>
    <!-- CSS Files -->
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/css/material-dashboard.css" rel="stylesheet">
</head>
<div class="sidebar " data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/xxxx.png">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      <img style="width:25px" src="{{ asset('material') }}/img/informadent-loader.gif">{{ __('Informadent') }}
    </a>
  </div><br>
  <div class="sidebar-wrapper">
    <div class="user">
      <div style="width: 30px; height: 30px;" class="photo">
        <img src="/storage/../material/img/faces/avatar.jpg">
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span style="font-size: 15px;">
             {{ Auth::user()->user_salutation }} {{ Auth::user()->user_lastname }} {{ Auth::user()->user_firstname }}
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="https://material-dashboard-pro-laravel.creative-tim.com/profile">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> S </span>
                <span class="sidebar-normal"> Settings </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('consultation.dashboard') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
    </li>
      <li class="nav-item{{ $activePage == 'consultation' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('consultation.edit') }}">
          <i class="material-icons">edit_note</i>
            <p>{{ __('Edit Mode') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'practices' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('practices.index') }}">
          <i class="material-icons">present_to_all</i>
            <p>{{ __('Presentation Mode') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="https://www.informadent.de/">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Informadent Webiste') }}</p>
        </a>
      </li>
     
    </ul>
  </div>
</div>
