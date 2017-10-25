<div class="navbar-fixed">
  <nav class="green darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container navbar-brand" href="{{url('/')}}" class="brand-logo">{{ config('app.name') }}</a>
      <ul class="right hide-on-med-and-down">
        @if (Sentinel::check())
          
              @if (Sentinel::getUser()->first_name == 'admin')
                  <li>
                      {!! link_to(route('administrator.index'), 'Home', ['class' => 'waves-effect waves-light white-text text-darken-3']) !!}
                  </li>
                  <ul id="dropdown1" class="dropdown-content">
                  <li>
                      {!! link_to("#administrator", "Profile", ['class' => 'waves-effect waves-light']) !!}
                  </li>
                      <li class="divider"></li>
                  <li>
                      {!! link_to("/logout", "Logout", ['class' => 'waves-effect waves-light']) !!}
                  </li>
                  </ul>
              @else
                  <li>
                      {!! link_to(route('users.index'), 'Home', ['class' => 'waves-effect waves-light white-text text-darken-3']) !!}
                  </li>
                  <ul id="dropdown1" class="dropdown-content">
                  <li>
                      {!! link_to(route('users.show', Sentinel::getUser()->id), "Profile", ['class' => 'waves-effect waves-light']) !!}
                  </li>
                  <li class="divider"></li>
                  <li>
                      {!! link_to("/logout", "Logout", ['class' => 'waves-effect waves-light']) !!}
                  </li>
              </ul>
              @endif
              
              
          <li><a class="dropdown-button white-text text-darken-3" href="#!" data-activates="dropdown1">{!! Sentinel::getUser()->first_name !!} <i class="material-icons right">arrow_drop_down</i> </a></li>
          @else
              <li>
                  {!! link_to(route('login'), 'Login', ['class' => 'waves-effect waves-light white-text text-darken-3']) !!}
              </li>
              <li>
                  {!! link_to(route('signup'), 'Register', ['class' => 'waves-effect waves-light white-text text-darken-3']) !!}
              </li>
          @endif        
      </ul>
    </div>
  </nav>
</div>