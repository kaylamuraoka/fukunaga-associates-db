<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include('registration/helper.php');

$user = array();
// If the user is not logged in redirect to the login page...
if(isset($_SESSION['userID'])){
  require('config/db.php');
  $user = get_user_info($conn, $_SESSION['userID']);
} else {
  header('Location: login.php');
	exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font Awesome kit's code -->
  <script src="https://kit.fontawesome.com/b7705bf7e8.js" crossorigin="anonymous"></script>
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="assets/css/main.css">
  <title>Dashboard</title>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
  <div class="wrapper">
    <nav id="sidebar" class="sidebar">
      <div class="sidebar-content js-simplebar" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
          <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
          </div>
          <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
              <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                <div class="simplebar-content" style="padding: 0px;">
                  <a href="index.php" class="sidebar-brand">
                    <i class="fas fa-stream"></i>
                    <span class="align-middle mr-3">Fukunaga & Associates</span>
                  </a>
                  <ul class="sidebar-nav">
                    <li class="sidebar-header">Pages</li>
                    <li class="sidebar-item active">
                      <a href="#dashboards" class="sidebar-link" data-toggle="collapse">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="align-middle">Dashboards</span>
                        <span class="badge badge-sidebar-primary">5</span>
                      </a>
                      <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="dashboard-default.php">Default</a>
                        </li>
                        <li class="sidebar-item active">
                          <a class="sidebar-link" href="dashboard-analytics.php">Analytics</a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="dashboard-saas.php">Saas</a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="dashboard-social.php">Social</a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="dashboard-crypto.php">Crypto</a>
                        </li>
                      </ul>
                    </li>
                    <li class="sidebar-item">
                      <a href="#projects" data-toggle="collapse" class="sidebar-link">
                        <i class="fas fa-folder"></i>
                        <span class="align-middle">Projects</span>
                      </a>
                      <ul id="projects" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="projects-active.php">Active Projects</a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="projects-closed.php">Finished Projects</a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="projects-new.php">New Projects</a>
                        </li>
                        <li class="sidebar-item">
                          <a href="#projects" data-toggle="collapse" class="sidebar-link collapsed"
                            aria-expanded="false">Projects</a>
                          <ul id="projects" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                              <a class="sidebar-link" href="pages-projects-list.html">List <span
                                  class="badge badge-sidebar-primary">100</span></a>
                            </li>
                            <li class="sidebar-item">
                              <a class="sidebar-link" href="pages-projects-detail.html">Detail <span
                                  class="badge badge-sidebar-primary">New</span></a>
                            </li>
                          </ul>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="pages-tasks.html">Tasks</a>
                        </li>
                      </ul>
                    </li>
                    <li class="sidebar-header">Schools</li>
                    <li class="sidebar-item">
                      <a href="#ui" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                        <i class="fas fa-street-view"></i>
                        <span class="align-middle">Districts</span>
                        <span class='badge badge-sidebar-primary'></span>
                      </a>
                      <ul id="ui" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="ui-alerts.html">Honolulu
                            <span class="badge badge-sidebar-primary">10+</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="ui-general.html">Central
                            <span class="badge badge-sidebar-primary">10+</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="ui-general.html">Leeward
                            <span class="badge badge-sidebar-primary">10+</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="ui-general.html">Windward
                            <span class="badge badge-sidebar-primary">10+</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="ui-general.html">Hawaii
                            <span class="badge badge-sidebar-primary">10+</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="ui-general.html">Maui
                            <span class="badge badge-sidebar-primary">10+</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="ui-general.html">Kauai
                            <span class="badge badge-sidebar-primary">10+</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="sidebar-header">Plugin &amp; Addons</li>
                    <li class="sidebar-item">
                      <a href="#calendar" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="align-middle">Calendar</span>
                      </a>
                      <ul id="calendar" data-toggle="collapse" class="sidebar-link collapsed list-unstyled collapse"
                        data-parent="#sidebar">
                        <li class="sidebar-item">
                          <a href="#multi-2" data-toggle="collapse" class="sidebar-link collapsed"
                            aria-expanded="false">Meetings</a>
                        </li>
                        <li class="sidebar-item">
                          <a href="#multi-2" data-toggle="collapse" class="sidebar-link collapsed"
                            aria-expanded="false">Schedule</a>
                        </li>
                      </ul>
                    </li>
                    <li class="sidebar-item">
                      <a href="#charts" data-toggle="collapse" class="sidebar-link" aria-expanded="true">
                        <i class="fas fa-tasks"></i>
                        <span class="align-middle">Tasks</span>
                        <span class="badge badge-sidebar-primary">New</span>
                      </a>
                      <ul id="charts" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="charts-chartjs.html">Chart.js</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="charts-apexcharts.html">ApexCharts <span
                              class="badge badge-sidebar-primary">New</span></a></li>
                      </ul>
                    </li>
                    <li class="sidebar-item">
                      <a href="#charts" data-toggle="collapse" class="sidebar-link" aria-expanded="true">
                        <i class="fas fa-bell"></i>
                        <span class="align-middle">News & Updates</span>
                        <span class="badge badge-sidebar-primary">New</span>
                      </a>
                      <ul id="charts" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="charts-chartjs.html">Chart.js</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="charts-apexcharts.html">ApexCharts <span
                              class="badge badge-sidebar-primary">New</span></a></li>
                      </ul>
                    </li>
                  </ul>
                  <div class="sidebar-cta">
                    <div class="sidebar-cta-content">
                      <strong class="d-inline-block mb-2">Monthly Sales Report</strong>
                      <div class="mb-3 text-sm">
                        Your monthly sales report is ready for download!
                      </div>
                      <a href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/"
                        class="btn btn-primary btn-block" target="_blank">Download</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="simplebar-placeholder" style="width: auto; height: 1447px;"></div>
        </div>

        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>

        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="height: 0px; display: none; transform: translate3d(0px, 0px, 0px);">
          </div>
        </div>

      </div>
    </nav>
    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle">
          <i class="navbar-toggler-icon align-self-center"></i>
        </a>
        <form class="d-none d-sm-inline-block">
          <!-- content -->
          <div class="input-group input-group-navbar">
            <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
            <div class="input-group-append">
              <button class="btn" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
        <div class="navbar-collapse collapse">
          <!-- contnet -->
          <ul class="navbar-nav navbar-align">
            <!-- Messages -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-icon dropdown-toggle" id="messagesDropdown" data-toggle="dropdown"
                aria-expanded="false">
                <div class="position-relative">
                  <i class="far fa-comment"></i>
                  <span class="indicator">4</span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                <div class="dropdown-menu-header">
                  <div class="position-relative">4 New Messages</div>
                </div>
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <img src="assets/images/profile/default_avatar.png" class="avatar img-fluid rounded-circle"
                          alt="Ashley Briggs">
                      </div>
                      <div class="col-10 pl-2">
                        <div class="text-dark">Ashley Briggs</div>
                        <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                        <div class="text-muted small mt-1">15m ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <img src="assets/images/profile/default_avatar.png" class="avatar img-fluid rounded-circle"
                          alt="Carl Jenkins">
                      </div>
                      <div class="col-10 pl-2">
                        <div class="text-dark">Carl Jenkins</div>
                        <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                        <div class="text-muted small mt-1">2h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <img src="assets/images/profile/default_avatar.png" class="avatar img-fluid rounded-circle"
                          alt="Stacie Hall">
                      </div>
                      <div class="col-10 pl-2">
                        <div class="text-dark">Stacie Hall</div>
                        <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                        <div class="text-muted small mt-1">4h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <img src="assets/images/profile/default_avatar.png" class="avatar img-fluid rounded-circle"
                          alt="Bertha Martin">
                      </div>
                      <div class="col-10 pl-2">
                        <div class="text-dark">Bertha Martin</div>
                        <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.
                        </div>
                        <div class="text-muted small mt-1">5h ago</div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-menu-footer">
                  <a href="#" class="text-muted">Show all messages</a>
                </div>
              </div>
            </li>
            <!-- Notifications -->
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown"
                aria-expanded="false">
                <div class="position-relative">
                  <i class="fas fa-bell"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                <div class="dropdown-menu-header">4 New Notifications</div>
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <i class="fas fa-exclamation-circle text-danger"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">Update completed</div>
                        <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                        <div class="text-muted small mt-1">2h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <i class="fas fa-bell text-warning"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">Lorem ipsum</div>
                        <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                        <div class="text-muted small mt-1">6h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <i class="fas fa-home text-primary"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">Login from 192.186.1.1</div>
                        <div class="text-muted small mt-1">8h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row no-gutters align-items-center">
                      <div class="col-2">
                        <i class="fas fa-user-plus text-success"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">New connection</div>
                        <div class="text-muted small mt-1">Anna accepted your request.</div>
                        <div class="text-muted small mt-1">12h ago</div>
                      </div>
                    </div>
                  </a>

                </div>
                <div class="dropdown-menu-footer">
                  <a href="#" class="text-muted">Show all notifications</a>
                </div>
              </div>
            </li>

            <!-- Profile -->
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
              </a>
              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown"
                aria-expanded="false">
                  <img class="avatar img-fluid rounded-circle mr-1" src="<?php echo isset($user['profileImg']) ? $user['profileImg']:'assets/images/profile/default_avatar.png';?>" alt="Profile">
                  <span class="text-dark">
                    <?php
                      if(isset($user['firstName'])){
                        printf('%s %s', $user['firstName'], $user['lastName']);
                      }
                    ?>
                  </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">
                  <i class="fas fa-user align-middle mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages-settings.html">Settings &amp; Privacy</a>
                <a class="dropdown-item" href="#">Help</a>
                <a class="dropdown-item" href="logout.php">Sign out</a>
              </div>
            </li>

          </ul>
        </div>
      </nav>

      <main class="content">
        <!-- Content -->
        <div class="container-fluid p-0">
          <!-- Row 1 -->
          <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
              <h3>Dashboard</h3>
            </div>
            <div class="col-auto ml-auto text-right mt-n1">
              <span class="dropdown mr-2">
                <button class="btn btn-light bg-white shadow-sm dropdown-toggle" id="day" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-calendar align-middle mt-n1"></i>
                  Today
                </button>
                <div class="dropdown-menu" aria-labelledby="day">
                  <h6 class="dropdown-header">Settings</h6>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </span>
              <button class="btn btn-primary shadow-sm">
                <i class="fas fa-filter align-middle"></i>
              </button>
              <button class="btn btn-primary shadow-sm">
                <i class="fas fa-sync-alt align-middle"></i>
              </button>
            </div>
          </div>
          <!-- Row 2 -->
          <div class="row">
            <div class="col-12 col-sm-6 col-xxl d-flex">
              <div class="card illustration flex-fill">
                <div class="card-body p-0 d-flex flex-fill">
                  <div class="row no-gutters w-100">
                    <div class="col-12">
                      <div class="illustration-text p-3 m-1">
                        <h4 class="illustration-text">Welcome Back,  
                          <?php
                            if(isset($user['firstName'])){
                              printf('%s %s', $user['firstName'], $user['lastName']);
                            }
                          ?>!
                        </h4>
                        <p class="mb-0">Fukunaga & Associates Dashboard</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-xxl d-flex">
              <div class="card flex-fill">
                <div class="card-body py-4">
                  <div class="media">
                    <div class="media-body">
                      <h3 class="mb-2">$ 24.300</h3>
                      <p class="mb-2">Total Earnings</p>
                      <div class="mb-0">
                        <span class="badge badge-soft-success mr-2"> <i class="mdi mdi-arrow-bottom-right"></i> +5.35%
                        </span>
                        <span class="text-muted">Since last week</span>
                      </div>
                    </div>

                    <div class="d-inline-block ml-3">
                      <div class="stat">
                        <i class="fas fa-dollar-sign align-middle text-success"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-xxl d-flex">
              <div class="card flex-fill">
                <div class="card-body py-4">
                  <div class="media">
                    <div class="media-body">
                      <h3 class="mb-2">43</h3>
                      <p class="mb-2">Pending Orders</p>
                      <div class="mb-0">
                        <span class="badge badge-soft-danger mr-2">
                          <i class="mdi mdi-arrow-bottom-right"></i>-4.25%
                        </span>
                        <span class="text-muted">Since last week</span>
                      </div>
                    </div>
                    <div class="d-inline-block ml-3">
                      <div class="stat">
                        <i class="fas fa-shopping-bag align-middle"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-xxl d-flex">
              <div class="card flex-fill">
                <div class="card-body py-4">
                  <div class="media">
                    <div class="media-body">
                      <h3 class="mb-2">$ 18.700</h3>
                      <p class="mb-2">Total Revenue</p>
                      <div class="mb-0">
                        <span class="badge badge-soft-success mr-2">
                          <i class="mdi mdi-arrow-bottom-right"></i>+8.65%
                        </span>
                        <span class="text-muted">Since last week</span>
                      </div>
                    </div>
                    <div class="d-inline-block ml-3">
                      <div class="stat">
                        <i class="fas fa-dollar-sign align-middle text-info"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row 3 -->
          <div class="row">
            <div class="col-12 col-lg-8 d-flex">
              <div class="card flex-fill w-100">
                <div class="card-header">
                  <div class="card-actions float-right">
                    <div class="dropdown show">
                      <a href="#" data-toggle="dropdown" data-display="static">
                        <i class="fas fa-ellipsis-h"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                  <h5 class="card-title mb-0">Sales / Revenue</h5>
                </div>
                <div class="card-body d-flex w-100">
                  <div class="align-self-center chart chart-lg">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
                    <canvas id="chartjs-dashboard-bar" style="display: block; height: 350px; width: 729px;" width="1458"
                      height="700" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4 d-flex">
              <div class="card flex-fill w-100">
                <div class="card-header">
                  <span class="badge badge-info float-right">Today</span>
                  <h5 class="card-title mb-0">Daily feed</h5>
                </div>
                <div class="card-body">
                  <div class="media">
                    <img src="assets/images/profile/default_avatar.png" width="36" height="36"
                      class="rounded-circle mr-2" alt="Ashley Briggs">
                    <div class="media-body">
                      <small class="float-right text-navy">5m ago</small>
                      <strong>Ashley Briggs</strong> started following <strong>Stacie Hall</strong>
                      <br>
                      <small class="text-muted">Today 7:51 pm</small>
                      <br>
                    </div>
                  </div>
                  <hr>
                  <div class="media">
                    <img src="assets/images/profile/default_avatar.png" width="36" height="36"
                      class="rounded-circle mr-2" alt="Chris Wood">
                    <div class="media-body">
                      <small class="float-right text-navy">30m ago</small>
                      <strong>Chris Wood</strong> posted something on <strong>Stacie Hall</strong>'s timeline<br>
                      <small class="text-muted">Today 7:21 pm</small>
                      <div class="border text-sm text-muted p-2 mt-1">
                        Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit
                        amet adipiscing...
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="media">
                    <img src="assets/images/profile/default_avatar.png" width="36" height="36"
                      class="rounded-circle mr-2" alt="Stacie Hall">
                    <div class="media-body">
                      <small class="float-right text-navy">1h ago</small>
                      <strong>Stacie Hall</strong> posted a new blog<br>
                      <small class="text-muted">Today 6:35 pm</small>
                    </div>
                  </div>
                  <hr>
                  <a href="#" class="btn btn-primary btn-block">Load more</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Row 4 -->
          <div class="row">
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="card-actions float-right">
                    <div class="dropdown show">
                      <a href="#" data-toggle="dropdown" data-display="static">
                        <i class="fas fa-ellipsis-h"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                  <h5 class="card-title mb-0">Calendar</h5>
                </div>
                <div class="card-body d-flex">
                  <div class="align-self-center w-100">
                    <div class="chart">
                      <div id="datetimepicker-dashboard">
                        <div class="bootstrap-datetimepicker-widget usetwentyfour">
                          <ul class="list-unstyled">
                            <li class="show">
                              <div class="datepicker">
                                <div class="datepicker-days">
                                  <table class="table table-sm">
                                    <thead>
                                      <tr>
                                        <th class="prev" data-action="previous">
                                          <span class="fas fa-chevron-left" title="Previous Month"></span>
                                        </th>
                                        <th class="picker-switch" data-action="pickerSwitch" colspan="5"
                                          title="Select Month">January 2021</th>
                                        <th class="next" data-action="next">
                                          <span class="fas fa-chevron-right" title="Next Month"></span>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th class="dow">Su</th>
                                        <th class="dow">Mo</th>
                                        <th class="dow">Tu</th>
                                        <th class="dow">We</th>
                                        <th class="dow">Th</th>
                                        <th class="dow">Fr</th>
                                        <th class="dow">Sa</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td data-action="selectDay" data-day="11/29/2020" class="day old weekend">29
                                        </td>
                                        <td data-action="selectDay" data-day="11/30/2020" class="day old">30</td>
                                        <td data-action="selectDay" data-day="12/01/2020" class="day">1</td>
                                        <td data-action="selectDay" data-day="12/02/2020" class="day">2</td>
                                        <td data-action="selectDay" data-day="12/03/2020" class="day">3</td>
                                        <td data-action="selectDay" data-day="12/04/2020" class="day">4</td>
                                        <td data-action="selectDay" data-day="12/05/2020" class="day weekend">5</td>
                                      </tr>
                                      <tr>
                                        <td data-action="selectDay" data-day="12/06/2020" class="day weekend">6</td>
                                        <td data-action="selectDay" data-day="12/07/2020" class="day">7</td>
                                        <td data-action="selectDay" data-day="12/08/2020" class="day">8</td>
                                        <td data-action="selectDay" data-day="12/09/2020" class="day">9</td>
                                        <td data-action="selectDay" data-day="12/10/2020" class="day">10</td>
                                        <td data-action="selectDay" data-day="12/11/2020" class="day">11</td>
                                        <td data-action="selectDay" data-day="12/12/2020" class="day weekend">12</td>
                                      </tr>
                                      <tr>
                                        <td data-action="selectDay" data-day="12/13/2020" class="day weekend">13</td>
                                        <td data-action="selectDay" data-day="12/14/2020" class="day">14</td>
                                        <td data-action="selectDay" data-day="12/15/2020" class="day">15</td>
                                        <td data-action="selectDay" data-day="12/16/2020" class="day">16</td>
                                        <td data-action="selectDay" data-day="12/17/2020" class="day">17</td>
                                        <td data-action="selectDay" data-day="12/18/2020" class="day">18</td>
                                        <td data-action="selectDay" data-day="12/19/2020" class="day weekend">19</td>
                                      </tr>
                                      <tr>
                                        <td data-action="selectDay" data-day="12/20/2020" class="day weekend">20</td>
                                        <td data-action="selectDay" data-day="12/21/2020" class="day">21</td>
                                        <td data-action="selectDay" data-day="12/22/2020" class="day">22</td>
                                        <td data-action="selectDay" data-day="12/23/2020" class="day">23</td>
                                        <td data-action="selectDay" data-day="12/24/2020" class="day">24</td>
                                        <td data-action="selectDay" data-day="12/25/2020" class="day">25</td>
                                        <td data-action="selectDay" data-day="12/26/2020" class="day weekend">26</td>
                                      </tr>
                                      <tr>
                                        <td data-action="selectDay" data-day="12/27/2020" class="day weekend">27</td>
                                        <td data-action="selectDay" data-day="12/28/2020" class="day">28</td>
                                        <td data-action="selectDay" data-day="12/29/2020" class="day">29</td>
                                        <td data-action="selectDay" data-day="12/30/2020" class="day">30</td>
                                        <td data-action="selectDay" data-day="12/31/2020" class="day">31</td>
                                        <td data-action="selectDay" data-day="01/01/2021" class="day new">1</td>
                                        <td data-action="selectDay" data-day="01/02/2021" class="day new weekend">2</td>
                                      </tr>
                                      <tr>
                                        <td data-action="selectDay" data-day="01/03/2021"
                                          class="day new active weekend">3</td>
                                        <td data-action="selectDay" data-day="01/04/2021" class="day new today">4</td>
                                        <td data-action="selectDay" data-day="01/05/2021" class="day new">5</td>
                                        <td data-action="selectDay" data-day="01/06/2021" class="day new">6</td>
                                        <td data-action="selectDay" data-day="01/07/2021" class="day new">7</td>
                                        <td data-action="selectDay" data-day="01/08/2021" class="day new">8</td>
                                        <td data-action="selectDay" data-day="01/09/2021" class="day new weekend">9</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="datepicker-months">
                                  <table class="table-condensed">
                                    <thead>
                                      <tr>
                                        <th class="prev" data-action="previous"><span class="fas fa-chevron-left"
                                            title="Previous Year"></span></th>
                                        <th class="picker-switch" data-action="pickerSwitch" colspan="5"
                                          title="Select Year">2021</th>
                                        <th class="next" data-action="next"><span class="fas fa-chevron-right"
                                            title="Next Year"></span></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="7"><span data-action="selectMonth"
                                            class="month active">Jan</span><span data-action="selectMonth"
                                            class="month">Feb</span><span data-action="selectMonth"
                                            class="month">Mar</span><span data-action="selectMonth"
                                            class="month">Apr</span><span data-action="selectMonth"
                                            class="month">May</span><span data-action="selectMonth"
                                            class="month">Jun</span><span data-action="selectMonth"
                                            class="month">Jul</span><span data-action="selectMonth"
                                            class="month">Aug</span><span data-action="selectMonth"
                                            class="month">Sep</span><span data-action="selectMonth"
                                            class="month">Oct</span><span data-action="selectMonth"
                                            class="month">Nov</span><span data-action="selectMonth"
                                            class="month">Dec</span></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="datepicker-years">
                                  <table class="table-condensed">
                                    <thead>
                                      <tr>
                                        <th class="prev" data-action="previous"><span class="fas fa-chevron-left"
                                            title="Previous Decade"></span></th>
                                        <th class="picker-switch" data-action="pickerSwitch" colspan="5"
                                          title="Select Decade">2020-2029</th>
                                        <th class="next" data-action="next"><span class="fas fa-chevron-right"
                                            title="Next Decade"></span></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="7"><span data-action="selectYear" class="year old">2019</span><span
                                            data-action="selectYear" class="year">2020</span><span
                                            data-action="selectYear" class="year active">2021</span><span
                                            data-action="selectYear" class="year">2022</span><span
                                            data-action="selectYear" class="year">2023</span><span
                                            data-action="selectYear" class="year">2024</span><span
                                            data-action="selectYear" class="year">2025</span><span
                                            data-action="selectYear" class="year">2026</span><span
                                            data-action="selectYear" class="year">2027</span><span
                                            data-action="selectYear" class="year">2028</span><span
                                            data-action="selectYear" class="year">2029</span><span
                                            data-action="selectYear" class="year old">2030</span></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="datepicker-decades">
                                  <table class="table-condensed">
                                    <thead>
                                      <tr>
                                        <th class="prev" data-action="previous"><span class="fas fa-chevron-left"
                                            title="Previous Century"></span></th>
                                        <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                                        <th class="next" data-action="next"><span class="fas fa-chevron-right"
                                            title="Next Century"></span></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="7"><span data-action="selectDecade" class="decade old"
                                            data-selection="2006">1990</span><span data-action="selectDecade"
                                            class="decade" data-selection="2006">2000</span><span
                                            data-action="selectDecade" class="decade active"
                                            data-selection="2016">2010</span><span data-action="selectDecade"
                                            class="decade active" data-selection="2026">2020</span><span
                                            data-action="selectDecade" class="decade"
                                            data-selection="2036">2030</span><span data-action="selectDecade"
                                            class="decade" data-selection="2046">2040</span><span
                                            data-action="selectDecade" class="decade"
                                            data-selection="2056">2050</span><span data-action="selectDecade"
                                            class="decade" data-selection="2066">2060</span><span
                                            data-action="selectDecade" class="decade"
                                            data-selection="2076">2070</span><span data-action="selectDecade"
                                            class="decade" data-selection="2086">2080</span><span
                                            data-action="selectDecade" class="decade"
                                            data-selection="2096">2090</span><span data-action="selectDecade"
                                            class="decade old" data-selection="2106">2100</span></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </li>
                            <li class="picker-switch accordion-toggle"></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4 d-none d-xl-flex">
              <div class="card flex-fill w-100">
                <div class="card-header">
                  <div class="card-actions float-right">
                    <div class="dropdown show">
                      <a href="#" data-toggle="dropdown" data-display="static">
                        <i class="fas fa-ellipsis-h align-middle"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                  <h5 class="card-title mb-0">Weekly sales</h5>
                </div>
                <div class="card-body d-flex">
                  <div class="align-self-center w-100">
                    <div class="py-3">
                      <div class="chart chart-xs">
                        <div class="chartjs-size-monitor">
                          <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                          </div>
                          <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                          </div>
                        </div>
                        <canvas id="chartjs-dashboard-pie" width="580" height="300" class="chartjs-render-monitor"
                          style="display: block; height: 150px; width: 290px;"></canvas>
                      </div>
                    </div>
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>Source</th>
                          <th class="text-right">Revenue</th>
                          <th class="text-right">Value</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><i class="fas fa-square-full text-primary"></i> Direct</td>
                          <td class="text-right">$ 2602</td>
                          <td class="text-right text-success">+43%</td>
                        </tr>
                        <tr>
                          <td><i class="fas fa-square-full text-warning"></i> Affiliate</td>
                          <td class="text-right">$ 1253</td>
                          <td class="text-right text-success">+13%</td>
                        </tr>
                        <tr>
                          <td><i class="fas fa-square-full text-danger"></i> E-mail</td>
                          <td class="text-right">$ 541</td>
                          <td class="text-right text-success">+24%</td>
                        </tr>
                        <tr>
                          <td><i class="fas fa-square-full text-dark"></i> Other</td>
                          <td class="text-right">$ 1465</td>
                          <td class="text-right text-success">+11%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
              <div class="card flex-fill w-100">
                <div class="card-header">
                  <div class="card-actions float-right">
                    <div class="dropdown show">
                      <a href="#" data-toggle="dropdown" data-display="static">
                        <i class="fas fa-ellipsis-h align-middle"></i>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                  <h5 class="card-title mb-0">Appointments</h5>
                </div>
                <div class="card-body">
                  <ul class="timeline">
                    <li class="timeline-item">
                      <strong>Chat with Carl and Ashley</strong>
                      <span class="float-right text-muted text-sm">30m ago</span>
                      <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet
                        iaculis,
                        ipsum. Sed aliquam
                        ultrices mauris...</p>
                    </li>
                    <li class="timeline-item">
                      <strong>The big launch</strong>
                      <span class="float-right text-muted text-sm">2h ago</span>
                      <p>Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut,
                        mauris. Praesent
                        adipiscing. Phasellus ullamcorper ipsum rutrum
                        nunc...</p>
                    </li>
                    <li class="timeline-item">
                      <strong>Coffee break</strong>
                      <span class="float-right text-muted text-sm">3h ago</span>
                      <p>Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas
                        malesuada...</p>
                    </li>
                    <li class="timeline-item">
                      <strong>Chat with team</strong>
                      <span class="float-right text-muted text-sm">30m ago</span>
                      <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet
                        iaculis,
                        ipsum...</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card flex-fill">
            <div class="card-header">
              <div class="card-actions float-right">
                <div class="dropdown show">
                  <a href="#" data-toggle="dropdown" data-display="static">
                    <i class="fas fa-ellipsis-h"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <h5 class="card-title mb-0">Latest Projects</h5>
            </div>
            <div class="dataTables_wrapper dt-bootstrap4 no-footer" id="datatables-dashboard-projects_wrapper">
              <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-striped my-0 dataTable no-footer" id="datatables-dashboard-projects"
                    role="grid" aria-describedby="datatables-dashboard-projects_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1"
                          colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name
                        </th>
                        <th class="d-none d-xl-table-cell sorting" tabindex="0"
                          aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1"
                          aria-label="Start Date: activate to sort column ascending">Start Date</th>
                        <th class="d-none d-xl-table-cell sorting" tabindex="0"
                          aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1"
                          aria-label="End Date: activate to sort column ascending">End Date</th>
                        <th class="sorting" tabindex="0" aria-controls="datatables-dashboard-projects" rowspan="1"
                          colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                        <th class="d-none d-md-table-cell sorting" tabindex="0"
                          aria-controls="datatables-dashboard-projects" rowspan="1" colspan="1"
                          aria-label="Assignee: activate to sort column ascending">Assignee</th>
                      </tr>
                    </thead>
                    <tbody>









                      <tr role="row" class="odd">
                        <td class="sorting_1">Project Apollo</td>
                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                        <td><span class="badge badge-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Carl Jenkins</td>
                      </tr>
                      <tr role="row" class="even">
                        <td class="sorting_1">Project Fireball</td>
                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                        <td><span class="badge badge-danger">Cancelled</span></td>
                        <td class="d-none d-md-table-cell">Bertha Martin</td>
                      </tr>
                      <tr role="row" class="odd">
                        <td class="sorting_1">Project Hades</td>
                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                        <td><span class="badge badge-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Stacie Hall</td>
                      </tr>
                      <tr role="row" class="even">
                        <td class="sorting_1">Project Nitro</td>
                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                        <td><span class="badge badge-warning">In progress</span></td>
                        <td class="d-none d-md-table-cell">Carl Jenkins</td>
                      </tr>
                      <tr role="row" class="odd">
                        <td class="sorting_1">Project Phoenix</td>
                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                        <td><span class="badge badge-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Bertha Martin</td>
                      </tr>
                      <tr role="row" class="even">
                        <td class="sorting_1">Project Romeo</td>
                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                        <td><span class="badge badge-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Ashley Briggs</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="datatables-dashboard-projects_info" role="status" aria-live="polite">
                    Showing 1 to 6
                    of 9 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="datatables-dashboard-projects_paginate">
                    <ul class="pagination">
                      <li class="paginate_button page-item previous disabled"
                        id="datatables-dashboard-projects_previous"><a href="#"
                          aria-controls="datatables-dashboard-projects" data-dt-idx="0" tabindex="0"
                          class="page-link">Previous</a></li>
                      <li class="paginate_button page-item active"><a href="#"
                          aria-controls="datatables-dashboard-projects" data-dt-idx="1" tabindex="0"
                          class="page-link">1</a></li>
                      <li class="paginate_button page-item "><a href="#" aria-controls="datatables-dashboard-projects"
                          data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                      <li class="paginate_button page-item next" id="datatables-dashboard-projects_next"><a href="#"
                          aria-controls="datatables-dashboard-projects" data-dt-idx="3" tabindex="0"
                          class="page-link">Next</a></li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>

          </div>



        </div>

      </main>

      <!-- Footer -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-left">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="text-muted" href="#">Support</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="#">Help Center</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="#">Privacy</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="#">Terms of Service</a>
                </li>
              </ul>
            </div>
            <div class="col-6 text-right">
              <p class="mb-0">© 2020 - <a href="index.html" class="text-muted">Fukunaga & Associates</a>
              </p>
            </div>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

</body>

</html>