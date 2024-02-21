          <!--begin::Sidebar-->
          <div
            id="kt_app_sidebar"
            class="app-sidebar"
            data-kt-drawer="true"
            data-kt-drawer-name="app-sidebar"
            data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-overlay="true"
            data-kt-drawer-width="auto"
            data-kt-drawer-direction="start"
            data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
          >
            <!--begin::Sidebar primary-->
            <div class="app-sidebar-primary">
              

              <!--begin::Primary menu-->
              <!--end::Primary menu-->

              <!--begin::Footer-->
              <div
                class="d-flex flex-column flex-center pb-4 mt-5 pb-lg-8"
                id="kt_app_sidebar_footer"
              >
                <!--begin::User menu-->
                <div
                  class="cursor-pointer symbol symbol-40px mb-9"
                  data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                  data-kt-attach="parent"
                  data-kt-menu-placement="right-end"
                >
                  <img src="{{ asset('user/media/avatars/300-2.jpg') }}" alt="user" />
                </div>
                <!--begin::User account menu-->
                <div
                  class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                  data-kt-menu="true"
                >
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                      <!--begin::Avatar-->
                      <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="{{ asset('user/media/avatars/300-2.jpg') }}" />
                      </div>
                      <!--end::Avatar-->
                      <!--begin::Username-->
                      <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                        {{ Auth::user()->name }}
                          
                        </div>
                        <a
                          href="#"
                          class="fw-semibold text-muted text-hover-primary fs-7"
                          >{{ Auth::user()->email }}</a
                        >
                      </div>
                      <!--end::Username-->
                    </div>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu separator-->
                  <div class="separator my-2"></div>
                  <!--end::Menu separator-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-5">
                    <a href="#" class="menu-link px-5"
                      >My Profile</a
                    >
                  </div>
                  <!--end::Menu item-->
                  
                  
                      <!--begin::Menu separator-->
                      <div class="separator my-2"></div>
                      <!--end::Menu separator-->

                  <!--begin::Menu item-->
                  <div
                    class="menu-item px-5"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="left-start"
                    data-kt-menu-offset="-15px, 0"
                  >
                    <a href="#" class="menu-link px-5">
                      <span class="menu-title position-relative"
                        >Mode
                        <span
                          class="ms-5 position-absolute translate-middle-y top-50 end-0"
                        >
                          <i
                            class="ki-outline ki-night-day theme-light-show fs-2"
                          ></i>
                          <i
                            class="ki-outline ki-moon theme-dark-show fs-2"
                          ></i> </span
                      ></span>
                    </a>
                    <!--begin::Menu-->
                    <div
                      class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                      data-kt-menu="true"
                      data-kt-element="theme-mode-menu"
                    >
                      <!--begin::Menu item-->
                      <div class="menu-item px-3 my-0">
                        <a
                          href="#"
                          class="menu-link px-3 py-2"
                          data-kt-element="mode"
                          data-kt-value="light"
                        >
                          <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-night-day fs-2"></i>
                          </span>
                          <span class="menu-title">Light</span>
                        </a>
                      </div>
                      <!--end::Menu item-->
                      <!--begin::Menu item-->
                      <div class="menu-item px-3 my-0">
                        <a
                          href="#"
                          class="menu-link px-3 py-2"
                          data-kt-element="mode"
                          data-kt-value="dark"
                        >
                          <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-moon fs-2"></i>
                          </span>
                          <span class="menu-title">Dark</span>
                        </a>
                      </div>
                      <!--end::Menu item-->
                      <!--begin::Menu item-->
                      <div class="menu-item px-3 my-0">
                        <a
                          href="#"
                          class="menu-link px-3 py-2"
                          data-kt-element="mode"
                          data-kt-value="system"
                        >
                          <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-screen fs-2"></i>
                          </span>
                          <span class="menu-title">System</span>
                        </a>
                      </div>
                      <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-5">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background-color:white; border:1px solid white;" class="menu-link px-5">Sign Out</button>
                  </form>
                    
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::User account menu-->

                <!--begin::Action-->
                <div class="app-navbar-item">
                  <!--begin::Link-->
                  <a
                    href="authentication/layouts/corporate/sign-in.html"
                    class=""
                  >
                    <i class="ki-outline ki-exit-right fs-1"></i>
                  </a>
                  <!--end::Link-->
                </div>
                <!--end::Action-->
              </div>
              <!--end::Footer-->

            </div>
            <!--end::Sidebar primary-->


            <!--begin::Sidebar secondary-->
            <div class="app-sidebar-secondary">

              <!--begin::Logo-->
              <div
                class="app-sidebar-logo d-none d-md-flex flex-center pt-10 pb-2"
                id="kt_app_sidebar_logo"
              >
                <!--begin::Logo image-->
                <a href="{{ route('dashboard') }}">
                  <img
                    alt="Logo"
                    src="{{ asset ('assets/images/logo/logo_w_t.png') }}"
                    class="h-30px"
                  />
                </a>
                <!--end::Logo image-->
              </div>
              <!--end::Logo-->

              <!--begin::Sidebar secondary menu-->
              <div
                class="menu menu-sub-indention menu-rounded menu-column fw-semibold fs-6 py-4 py-lg-6"
                id="kt_app_sidebar_secondary_menu"
                data-kt-menu="true"
              >
              
                <div
                  id="kt_app_sidebar_secondary_menu_wrapper"
                  class="hover-scroll-y mx-3 px-4"
                  data-kt-scroll="true"
                  data-kt-scroll-activate="{default: true, lg: true}"
                  data-kt-scroll-height="auto"
                  data-kt-scroll-wrappers="#kt_app_sidebar_secondary_menu"
                  data-kt-scroll-offset="20px"
                >
                
                  <!--begin:Menu item-->
                  <div class="menu-item">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                      <span class="menu-section fs-5 fw-bolder ps-1 py-1"
                        >Admin Dashboard</span
                      >
                    </div>
                    <!--end:Menu content-->
                  </div>
                  <!--end:Menu item-->

                  <!--begin:Menu item-->
                  <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link  active" href="{{ route('dashboard') }}">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->
                  </div>
                  <!--end:Menu item-->

                  <!--begin:Menu item-->
                  <div
                    data-kt-menu-trigger="click"
                    class="menu-item menu-accordion"
                  >
                    <!--begin:Menu link-->
                    <span class="menu-link active mt-5">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Users</span>
                      <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                      <!--begin:Menu item-->
                      <div class="menu-item">

                        <!--begin:Menu link-->
                        <a
                          class="menu-link"
                          href="pages/user-profile/overview.html"
                        >
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">add user</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->

                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a
                          class="menu-link"
                          href="pages/user-profile/projects.html"
                        >
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">View User</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->

                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a
                          class="menu-link"
                          href="pages/user-profile/campaigns.html"
                        >
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">Edit User</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->

                      
                    </div>
                    <!--end:Menu sub-->
                  </div>
                  <!--end:Menu item-->

                  <!--begin:Menu item-->
                  <div
                    data-kt-menu-trigger="click"
                    class="menu-item  menu-accordion"
                  >
                    <!--begin:Menu link-->
                    <span class="menu-link active mt-5">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Applications</span>
                      <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="account/overview.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">add application</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="account/settings.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">view application</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="account/security.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">edit application</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->

                      
                    </div>
                    <!--end:Menu sub-->
                  </div>
                  <!--end:Menu item-->

      
                    
                  <!--begin:Menu item-->
                  <div
                    data-kt-menu-trigger="click"
                    class="menu-item menu-accordion"
                  >
                    <!--begin:Menu link-->
                    <span class="menu-link active mt-5">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Payments</span>
                      <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="pages/about.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">View Payments</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="pages/team.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">Edit payment</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      
                      
                    </div>
                    <!--end:Menu sub-->
                  </div>
                  <!--end:Menu item-->


                  <!--begin:Menu item-->
                  <div
                    data-kt-menu-trigger="click"
                    class="menu-item menu-accordion"
                  >
                    <!--begin:Menu link-->
                    <span class="menu-link active mt-5">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Appointments</span>
                      <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('showappointment') }}">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">View appointments</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="pages/social/activity.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">edit appointments</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="pages/social/followers.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">edit appointment</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      
                    </div>
                    <!--end:Menu sub-->
                  </div>
                  <!--end:Menu item-->

                  <!--begin:Menu item-->
                  <div
                    data-kt-menu-trigger="click"
                    class="menu-item menu-accordion"
                  >
                    <!--begin:Menu link-->
                    <span class="menu-link active mt-5">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Notifications</span>
                      <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="pages/blog/home.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">notification management</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      
                    </div>
                    <!--end:Menu sub-->
                  </div>
                  <!--end:Menu item-->

                  <!--begin:Menu item-->
                  <div
                    data-kt-menu-trigger="click"
                    class="menu-item menu-accordion"
                  >
                    <!--begin:Menu link-->
                    <span class="menu-link active mt-5">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">blog</span>
                      <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="pages/careers/list.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">add blog</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="pages/careers/apply.html">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">edit blog</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                  </div>
                  <!--end:Menu item-->
                </div>
              </div>
              <!--end::Sidebar secondary menu-->
            </div>
            <!--end::Sidebar secondary-->
            <!--begin::Sidebar secondary toggle-->
            <button
              id="kt_app_sidebar_secondary_toggle"
              class="app-sidebar-secondary-toggle btn btn-sm btn-icon bg-body btn-color-gray-600 btn-active-color-primary position-absolute translate-middle z-index-1 start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex mb-4"
              data-kt-toggle="true"
              data-kt-toggle-state="active"
              data-kt-toggle-target="body"
              data-kt-toggle-name="app-sidebar-secondary-collapse"
            >
              <i class="ki-outline ki-arrow-left fs-2 rotate-180"></i>
            </button>
            <!--end::Sidebar secondary toggle-->
          </div>
          <!--end::Sidebar-->