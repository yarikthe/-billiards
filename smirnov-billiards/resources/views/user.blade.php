 @extends('layouts.user')

@section('content')
<div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="../assets/images/profile/male/image_1.png" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{ Auth::user()->name }}</p>
            <h6 class="display-income">$3,400,00</h6>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          <li>
            <a href="index.html">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <li>
            <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Sample Pages</span>
              <i class="mdi mdi-flask link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
              <li>
                <a href="pages/sample-pages/login_1.html" target="_blank">Login</a>
              </li>
              <li>
                <a href="pages/sample-pages/error_2.html" target="_blank">Error</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">UI Elements</span>
              <i class="mdi mdi-bullseye link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="ui-elements">
              <li>
                <a href="pages/ui-components/buttons.html">Buttons</a>
              </li>
              <li>
                <a href="pages/ui-components/tables.html">Tables</a>
              </li>
              <li>
                <a href="pages/ui-components/typography.html">Typography</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="pages/forms/form-elements.html">
              <span class="link-title">Forms</span>
              <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
          </li>
          <li>
            <a href="pages/charts/chartjs.html">
              <span class="link-title">Charts</span>
              <i class="mdi mdi-chart-donut link-icon"></i>
            </a>
          </li>
          <li>
            <a href="pages/icons/material-icons.html">
              <span class="link-title">Icons</span>
              <i class="mdi mdi-flower-tulip-outline link-icon"></i>
            </a>
          </li>
          <li class="nav-category-divider">DOCS</li>
          <li>
            <a href="../docs/docs.html">
              <span class="link-title">Documentation</span>
              <i class="mdi mdi-asterisk link-icon"></i>
            </a>
          </li>
        </ul>

      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <div class="row">
              <div class="col-12 py-5">
                <h4>Dashboard</h4>
                <p class="text-gray">Welcome aboard, Allen Clerk</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>30%</p>
                      <p>+06.2%</p>
                    </div>
                    <p class="text-black">Traffic</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="45" id="stat-line_1"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>43%</p>
                      <p>+15.7%</p>
                    </div>
                    <p class="text-black">Conversion</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="45" id="stat-line_2"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>23%</p>
                      <p>+02.7%</p>
                    </div>
                    <p class="text-black">Bounce Rate</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="45" id="stat-line_3"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-6 equel-grid">
                <div class="grid">
                  <div class="grid-body text-gray">
                    <div class="d-flex justify-content-between">
                      <p>75%</p>
                      <p>- 53.34%</p>
                    </div>
                    <p class="text-black">Marketing</p>
                    <div class="wrapper w-50 mt-4">
                      <canvas height="45" id="stat-line_4"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 equel-grid">
                <div class="grid">
                  <div class="grid-body d-flex flex-column h-100">
                    <div class="wrapper">
                      <div class="d-flex justify-content-between">
                        <div class="split-header">
                          <img class="img-ss mt-1 mb-1 mr-2" src="../assets/images/social-icons/instagram.svg" alt="instagram">
                          <p class="card-title">Followers Growth</p>
                        </div>
                        <div class="wrapper">
                          <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-access-point text-muted mdi-2x"></i></button>
                          <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-cloud-download-outline text-muted mdi-2x"></i></button>
                        </div>
                      </div>
                      <div class="d-flex align-items-end pt-2 mb-4">
                        <h4>16.2K</h4>
                        <p class="ml-2 text-muted">New Followers</p>
                      </div>
                    </div>
                    <div class="mt-auto">
                      <canvas class="curved-mode" id="followers-bar-chart" height="220"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 equel-grid">
                <div class="grid">
                  <div class="grid-body">
                    <p class="card-title">Campaign</p>
                    <div id="radial-chart"></div>
                    <h4 class="text-center">$23,350.00</h4>
                    <p class="text-center text-muted">Used balance this billing cycle</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 equel-grid">
                <div class="grid table-responsive">
                  <table class="table table-stretched">
                    <thead>
                      <tr>
                        <th>Symbol</th>
                        <th>Price</th>
                        <th>Change</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <p class="mb-n1 font-weight-medium">AAPL</p>
                          <small class="text-gray">Apple Inc.</small>
                        </td>
                        <td class="font-weight-medium">198.18</td>
                        <td class="text-danger font-weight-medium">
                          <div class="badge badge-success">-1.39%</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-n1 font-weight-medium">NKE</p>
                          <small class="text-gray">Nike,Inc.</small>
                        </td>
                        <td class="font-weight-medium">03.95</td>
                        <td class="text-danger font-weight-medium">
                          <div class="badge badge-danger">-1.17%</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-n1 font-weight-medium">NSEI</p>
                          <small class="text-gray">Nifty 50</small>
                        </td>
                        <td class="font-weight-medium">11,278</td>
                        <td class="text-danger font-weight-medium">
                          <div class="badge badge-success">-0.24%</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-n1 font-weight-medium">BA</p>
                          <small class="text-gray">The Boeing Company</small>
                        </td>
                        <td class="font-weight-medium">354.67</td>
                        <td class="text-success font-weight-medium">
                          <div class="badge badge-success">+0.15%</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-n1 font-weight-medium">SBUX</p>
                          <small class="text-gray">Starbucks Corporation</small>
                        </td>
                        <td class="font-weight-medium">08.42</td>
                        <td class="text-success font-weight-medium">
                          <div class="badge badge-success">+0.67%</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-5 col-md-6 col-sm-12 equel-grid">
                <div class="grid">
                  <div class="grid-body">
                    <div class="split-header">
                      <p class="card-title">Available Balance</p>
                      <span class="btn action-btn btn-xs component-flat" data-toggle="tooltip" data-placement="left" title="Available balance since the last week">
                        <i class="mdi mdi-information-outline text-muted mdi-2x"></i>
                      </span>
                    </div>
                    <div class="d-flex align-items-end mt-2">
                      <h3>26.00453100</h3>
                      <p class="ml-1 font-weight-bold">BTC</p>
                    </div>
                    <div class="d-flex mt-2">
                      <div class="wrapper d-flex pr-4">
                        <small class="text-success font-weight-medium mr-2">USD</small>
                        <small class="text-gray">$103,342.50</small>
                      </div>
                      <div class="wrapper d-flex">
                        <small class="text-primary font-weight-medium mr-2">EUR</small>
                        <small class="text-gray">$91,105.00</small>
                      </div>
                    </div>
                    <div class="d-flex flex-row mt-4 mb-4">
                      <button class="btn btn-outline-light text-gray component-flat w-50 mr-2" type="button">SEND</button>
                      <button class="btn btn-primary w-50 ml-2" type="button">RECEIVE</button>
                    </div>
                    <div class="d-flex mt-5 mb-3">
                      <small class="mb-0 text-primary">Recent Transaction (3)</small>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-2">
                      <p class="text-black">Received Bitcoin</p>
                      <p class="text-gray">+0.00005462 BTC</p>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-2">
                      <p class="text-black">Sent Bitcoin</p>
                      <p class="text-gray">-0.00001446 BTC</p>
                    </div>
                    <div class="d-flex justify-content-between pt-2">
                      <p class="text-black">Sent Bitcoin</p>
                      <p class="text-gray">-0.00003573 BTC</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 col-md-12 equel-grid">
                <div class="grid widget-revenue-card">
                  <div class="grid-body d-flex flex-column h-100">
                    <div class="split-header">
                      <p class="card-title">Server Load</p>
                      <div class="content-wrapper v-centered">
                        <small class="text-muted">2h ago</small>
                        <span class="btn action-btn btn-refresh btn-xs component-flat">
                          <i class="mdi mdi-autorenew text-muted mdi-2x"></i>
                        </span>
                      </div>
                    </div>
                    <div class="mt-auto">
                      <canvas id="cpu-performance" height="80"></canvas>
                      <h3 class="font-weight-medium mt-4">69.05%</h3>
                      <p class="text-gray">Storage is getting full</p>
                      <div class="w-50">
                        <div class="d-flex justify-content-between text-muted mt-3">
                          <small>Usage</small> <small>35.62 GB / 2TB</small>
                        </div>
                        <div class="progress progress-slim mt-2">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
              <ul class="text-gray">
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2020 <a href="#" target="_blank">Smirnov - Biliard</a>. All rights reserved</small>
              <small class="text-gray mt-2">Made With <i class="mdi mdi-heart text-danger"></i> by Lukyanchuk Media</small>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
@endsection
