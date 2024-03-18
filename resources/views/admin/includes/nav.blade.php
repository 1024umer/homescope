<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
      <div class="mobile-menu-button">
        <ion-icon name="menu-sharp"></ion-icon>
      </div>
      {{-- <form class="searchbar">
        <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
          <ion-icon name="search-sharp"></ion-icon>
        </div>
        <input class="form-control" type="text" placeholder="Search for anything">
        <div class="position-absolute top-50 translate-middle-y search-close-icon">
          <ion-icon name="close-sharp"></ion-icon>
        </div>
      </form> --}}
      <div class="top-navbar-right ms-auto">

        <ul class="navbar-nav align-items-center">
          {{-- <li class="nav-item mobile-search-button">
            <a class="nav-link" href="javascript:;">
              <div class="">
                <ion-icon name="search-sharp"></ion-icon>
              </div>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link dark-mode-icon" href="javascript:;">
              <div class="mode-icon">
                <ion-icon name="moon-sharp"></ion-icon>
              </div>
            </a>
          </li>
          <li class="nav-item dropdown dropdown-user-setting">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
              <div class="user-setting">
                <img src="{{asset('public/admin-assets/images/avatar.png')}}" class="user-img" alt="">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex flex-row align-items-center gap-2">
                    <img src="{{asset('public/admin-assets/images/avatar.png')}}" alt="" class="rounded-circle" width="54" height="54">
                    <div class="">
                      <h6 class="mb-0 dropdown-user-name">{{session()->get('username')}}</h6>
                      <small class="mb-0 dropdown-user-designation text-secondary">{{session()->get('role')}}</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="person"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Edit Profile</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="key"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Change Password</span></div>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="{{route('logout')}}">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="log-out-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Logout</span></div>
                  </div>
                </a>
              </li>
            </ul>
          </li>

        </ul>

      </div>
    </nav>
  </header>