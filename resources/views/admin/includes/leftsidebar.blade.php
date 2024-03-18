<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="@if($generalsettings){{ asset('public/assets/images/logo') }}/{{ $generalsettings->favicon }}@endif" class="" alt="logo icon" style="width:50px">
      </div>
      <div>
        <h4 class="logo-text">Homescope</h4>
      </div>
      <div class="toggle-icon ms-auto">
        <ion-icon name="menu-sharp"></ion-icon>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="{{route('dashboard')}}" class="">
          <div class="parent-icon">
            <ion-icon name="home-sharp"></ion-icon>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      <li>
        <a href="{{route('developers.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Developers</div>
        </a>
      </li>
      <li>
        <a href="{{route('communities.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Communities</div>
        </a>
      </li>
      <li>
        <a href="{{route('amenities.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Amenities</div>
        </a>
      </li>
      <li>
        <a href="{{route('floorplans.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Floor Plans</div>
        </a>
      </li>
      <li>
        <a href="{{route('locations.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Location</div>
        </a>
      </li>
      <li>
        <a href="{{route('projects.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Projects</div>
        </a>
      </li>
      <li>
        <a href="{{route('images.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Projects Images</div>
        </a>
      </li>
      <li>
        <a href="{{route('teams.index')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Teams</div>
        </a>
      </li>
      <li>
        <a href="{{route('leads')}}" class="">
          <div class="parent-icon">
            <ion-icon name="person-add"></ion-icon>
          </div>
          <div class="menu-title">Lead</div>
        </a>
      </li>
      <li>
        <a href="{{route('settings')}}" class="">
          <div class="parent-icon">
            <ion-icon name="settings"></ion-icon>
          </div>
          <div class="menu-title">Settings</div>
        </a>
      </li>
      
    </ul>
    <!--end navigation-->
  </aside>