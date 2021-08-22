<div class="sidebar " data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/xxxx.png">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      <img style="width:25px" src="{{ asset('material') }}/img/informadent-loader.gif">{{ __('Informadent') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'roles' || $activePage == 'userdata') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i class="material-icons">manage_accounts</i>
          <p>{{ __('User Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class="material-icons">supervised_user_circle</i>
            <p>{{ __('Roles') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">people</i>
            <p>{{ __('Users') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons">badge</i>
            <p>{{ __('Profile') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'clinics' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('clinics.index') }}">
          <i class="material-icons">local_hospital</i>
            <p>{{ __('Clinics') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'practices' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('practices.index') }}">
          <i class="material-icons">foundation</i>
            <p>{{ __('Practices') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'healthinsurances' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('healthinsurances.index') }}">
          <i class="material-icons">health_and_safety</i>
            <p>{{ __('Health Insurances') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'peoplepresentat' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('peoplepresentat.index') }}">
          <i class="material-icons">emoji_people</i>
            <p>{{ __('People Present at') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'helpers' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('helpers.index') }}">
          <i class="material-icons">wheelchair_pickup</i>
            <p>{{ __('Helpers') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'patientconsents' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('patientconsents.index') }}">
          <i class="material-icons">policy</i>
            <p>{{ __('Patient Consents') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'diagnose' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('diagnose.index') }}">
          <i class="material-icons">person_search</i>
            <p>{{ __('Diagnosis') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'findings' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('findings.index') }}">
          <i class="material-icons">saved_search</i>
            <p>{{ __('Findings') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'treatmenttypes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('treatmenttypes.index') }}">
          <i class="material-icons">format_list_bulleted</i>
            <p>{{ __('Treatment Types') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'treatmentmodules' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('treatmentmodules.index') }}">
          <i class="material-icons">view_module</i>
            <p>{{ __('Treatment Modules') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'treatmentcategories' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('treatmentcategories.index') }}">
          <i class="material-icons">category</i>
            <p>{{ __('Treatment Categories') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'checkpoints' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('checkpoints.index') }}">
          <i class="material-icons">timeline</i>
            <p>{{ __('Checkpoints') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'documents' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('documents.index') }}">
          <i class="material-icons">description</i>
            <p>{{ __('Documents') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'images' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('images.index') }}">
          <i class="material-icons">image</i>
            <p>{{ __('Images') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'videos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('videos.index') }}">
          <i class="material-icons">videocam</i>
            <p>{{ __('videos') }}</p>
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
