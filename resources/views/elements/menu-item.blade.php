<ul class="metismenu" id="menu">
    {{-- <li class="nav-label first">Main Menu</li> --}}

    @foreach (config('temauema.menu') as $menu)
        @isset($menu['header'])
            <li class="nav-label @if($loop->first) first @endif">{{ $menu['header'] }}</li>
        @endisset
        @isset($menu['title'])
            <li>
                <a href="{{ route($menu['route']) }}" class="@isset($menu['submenu']) has-arrow @endisset ai-icon"
                    aria-expanded="false">
                    <i class="{{ $menu['icon'] }}"></i>
                    <span class="nav-text">{{ $menu['title'] }}</span>
                </a>
                @isset($menu['submenu'])
                    <ul aria-expanded="false">
                        @foreach ($menu['submenu'] as $submenu)
                            <li><a href="{{ route($submenu['route']) }}">{{ $submenu['title'] }}</a></li>
                        @endforeach
                    </ul>
                @endisset
            </li>
        @endisset
    @endforeach

    {{-- <li><a href="{!! url('/widget-basic') !!}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-settings-2"></i>
            <span class="nav-text"></span>
        </a>
    </li>

    <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-144-layout"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/index') !!}">Dashboard Light</a></li>
            <li><a href="{!! url('/index-2') !!}">Dashboard Dark</a></li>
            <li><a href="{!! url('/my-wallets') !!}">Wallet</a></li>
            <li><a href="{!! url('/tranasactions') !!}">Transactions</a></li>
            <li><a href="{!! url('/coin-details') !!}">Coin Details</a></li>
            <li><a href="{!! url('/portofolio') !!}">Portofolio</a></li>
            <li><a href="{!! url('/market-capital') !!}">Market Capital</a></li>
        </ul>
    </li>
    <li class="nav-label">Apps</li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-077-menu-1"></i>
            <span class="nav-text">Apps</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/app-profile') !!}">Profile</a></li>
            <li><a href="{!! url('/post-details') !!}">Post Details</a></li>
            <li><a href="{!! url('/page-chat') !!}">Chat<span class="badge badge-xs badge-danger">New</span></a></li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Project<span
                        class="badge badge-xs badge-danger">New</span></a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/project-list') !!}">Project List</a></li>
                    <ul>jkjk</ul>
                    <li><a href="{!! url('/project-card') !!}">Project Card</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">User<span
                        class="badge badge-xs badge-danger">New</span></a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/user-list-datatable') !!}">User List</a></li>
                    <li><a href="{!! url('/user-list-column') !!}">User Card</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Contact<span
                        class="badge badge-xs badge-danger">New</span></a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('contact-list') !!}">Contact List</a></li>
                    <li><a href="{!! url('contact-card') !!}">Contact Card</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/email-compose') !!}">Compose</a></li>
                    <li><a href="{!! url('/email-inbox') !!}">Inbox</a></li>
                    <li><a href="{!! url('/email-read') !!}">Read</a></li>
                </ul>
            </li>
            <li><a href="{!! url('/app-calender') !!}">Calendar</a></li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/ecom-product-grid') !!}">Product Grid</a></li>
                    <li><a href="{!! url('/ecom-product-list') !!}">Product List</a></li>
                    <li><a href="{!! url('/ecom-product-detail') !!}">Product Details</a></li>
                    <li><a href="{!! url('/ecom-product-order') !!}">Order</a></li>
                    <li><a href="{!! url('/ecom-checkout') !!}">Checkout</a></li>
                    <li><a href="{!! url('/ecom-invoice') !!}">Invoice</a></li>
                    <li><a href="{!! url('/ecom-customers') !!}">Customers</a></li>
                </ul>
            </li>
        </ul>
    </li>

    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-061-puzzle"></i>
            <span class="nav-text">Charts</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/chart-flot') !!}">Flot</a></li>
            <li><a href="{!! url('/chart-morris') !!}">Morris</a></li>
            <li><a href="{!! url('/chart-chartjs') !!}">Chartjs</a></li>
            <li><a href="{!! url('/chart-chartist') !!}">Chartist</a></li>
            <li><a href="{!! url('/chart-sparkline') !!}">Sparkline</a></li>
            <li><a href="{!! url('/chart-peity') !!}">Peity</a></li>
        </ul>
    </li>
    <li class="nav-label">components</li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-003-diamond"></i>
            <span class="nav-text">Bootstrap</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/ui-accordion') !!}">Accordion</a></li>
            <li><a href="{!! url('/ui-alert') !!}">Alert</a></li>
            <li><a href="{!! url('/ui-badge') !!}">Badge</a></li>
            <li><a href="{!! url('/ui-button') !!}">Button</a></li>
            <li><a href="{!! url('/ui-modal') !!}">Modal</a></li>
            <li><a href="{!! url('/ui-button-group') !!}">Button Group</a></li>
            <li><a href="{!! url('/ui-list-group') !!}">List Group</a></li>
            <li><a href="{!! url('/ui-media-object') !!}">Media Object</a></li>
            <li><a href="{!! url('/ui-card') !!}">Cards</a></li>
            <li><a href="{!! url('/ui-carousel') !!}">Carousel</a></li>
            <li><a href="{!! url('/ui-dropdown') !!}">Dropdown</a></li>
            <li><a href="{!! url('/ui-popover') !!}">Popover</a></li>
            <li><a href="{!! url('/ui-progressbar') !!}">Progressbar</a></li>
            <li><a href="{!! url('/ui-tab') !!}">Tab</a></li>
            <li><a href="{!! url('/ui-typography') !!}">Typography</a></li>
            <li><a href="{!! url('/ui-pagination') !!}">Pagination</a></li>
            <li><a href="{!! url('/ui-grid') !!}">Grid</a></li>

        </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-053-heart"></i>
            <span class="nav-text">Plugins</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/uc-select2') !!}">Select 2</a></li>
            <li><a href="{!! url('/uc-nestable') !!}">Nestedable</a></li>
            <li><a href="{!! url('/uc-noui-slider') !!}">Noui Slider</a></li>
            <li><a href="{!! url('/uc-sweetalert') !!}">Sweet Alert</a></li>
            <li><a href="{!! url('/uc-toastr') !!}">Toastr</a></li>
            <li><a href="{!! url('/map-jqvmap') !!}">Jqv Map</a></li>
            <li><a href="{!! url('/uc-lightgallery') !!}">Light Gallery</a></li>
        </ul>
    </li>
    <li><a href="{!! url('/widget-basic') !!}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-settings-2"></i>
            <span class="nav-text">Widget</span>
        </a>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-044-file"></i>
            <span class="nav-text">Forms</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/form-element') !!}">Form Elements</a></li>
            <li><a href="{!! url('/form-wizard') !!}">Wizard</a></li>
            <li><a href="{!! url('/form-editor-summernote') !!}">Summernote</a></li>
            <li><a href="{!! url('/form-pickers') !!}">Pickers</a></li>
            <li><a href="{!! url('/form-validation-jquery') !!}">Jquery Validate</a></li>
        </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">Table</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/table-bootstrap-basic') !!}">Bootstrap</a></li>
            <li><a href="{!! url('/table-datatable-basic') !!}">Datatable</a></li>
        </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-049-copy"></i>
            <span class="nav-text">Pages</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{!! url('/page-register') !!}">Register</a></li>
            <li><a href="{!! url('/page-login') !!}">Login</a></li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/page-error-400') !!}">Error 400</a></li>
                    <li><a href="{!! url('/page-error-403') !!}">Error 403</a></li>
                    <li><a href="{!! url('/page-error-404') !!}">Error 404</a></li>
                    <li><a href="{!! url('/page-error-500') !!}">Error 500</a></li>
                    <li><a href="{!! url('/page-error-503') !!}">Error 503</a></li>
                </ul>
            </li>
            <li><a href="{!! url('/page-lock-screen') !!}">Lock Screen</a></li>
        </ul>
    </li> --}}
</ul>
