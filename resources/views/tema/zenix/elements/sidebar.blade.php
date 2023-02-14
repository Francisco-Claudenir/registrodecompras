<!--**********************************
	Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
		<div class="main-profile">
			<div class="image-bx">
				<img src="{{ asset('images/Untitled-1.jpg') }}" alt="">
				<a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
			</div>
			<h5 class="name"><span class="font-w400">Hello,</span> Marquez</h5>
			<p class="email">marquezzzz@mail.com</p>
		</div>
		<ul class="metismenu" id="menu">
			<li class="nav-label first">Main Menu</li>
			<li><a href="{!! url('/tema/doc'); !!}">Documentação</a></li>
            <li>
            	<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-144-layout"></i>
					<span class="nav-text">Dashboard</span>
					
				</a>
                <ul aria-expanded="false">
					<li><a href="{!! url('/tema/index'); !!}">Dashboard Light</a></li>
					<li><a href="{!! url('/tema/index-2'); !!}">Dashboard Dark</a></li>
					<li><a href="{!! url('/tema/my-wallets'); !!}">Wallet</a></li>
					<li><a href="{!! url('/tema/tranasactions'); !!}">Transactions</a></li>
					<li><a href="{!! url('/tema/coin-details'); !!}">Coin Details</a></li>
					<li><a href="{!! url('/tema/portofolio'); !!}">Portofolio</a></li>
					<li><a href="{!! url('/tema/market-capital'); !!}">Market Capital</a></li>
				</ul>
            </li>
			<li class="nav-label">Apps</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
				<i class="flaticon-077-menu-1"></i>
					<span class="nav-text">Apps</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/tema/app-profile'); !!}">Profile</a></li>
					<li><a href="{!! url('/tema/post-details'); !!}">Post Details</a></li>
					<li><a href="{!! url('/tema/page-chat'); !!}">Chat<span class="badge badge-xs badge-danger">New</span></a></li>
					<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Project<span class="badge badge-xs badge-danger">New</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/tema/project-list'); !!}">Project List</a></li>
                            <li><a href="{!! url('/tema/project-card'); !!}">Project Card</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">User<span class="badge badge-xs badge-danger">New</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/tema/user-list-datatable'); !!}">User List</a></li>
                            <li><a href="{!! url('/tema/user-list-column'); !!}">User Card</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Contact<span class="badge badge-xs badge-danger">New</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('contact-list'); !!}">Contact List</a></li>
                            <li><a href="{!! url('contact-card'); !!}">Contact Card</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/tema/email-compose'); !!}">Compose</a></li>
							<li><a href="{!! url('/tema/email-inbox'); !!}">Inbox</a></li>
							<li><a href="{!! url('/tema/email-read'); !!}">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="{!! url('/tema/app-calender'); !!}">Calendar</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                           	<li><a href="{!! url('/tema/ecom-product-grid'); !!}">Product Grid</a></li>
							<li><a href="{!! url('/tema/ecom-product-list'); !!}">Product List</a></li>
							<li><a href="{!! url('/tema/ecom-product-detail'); !!}">Product Details</a></li>
							<li><a href="{!! url('/tema/ecom-product-order'); !!}">Order</a></li>
							<li><a href="{!! url('/tema/ecom-checkout'); !!}">Checkout</a></li>
							<li><a href="{!! url('/tema/ecom-invoice'); !!}">Invoice</a></li>
							<li><a href="{!! url('/tema/ecom-customers'); !!}">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
			
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-061-puzzle"></i>
					<span class="nav-text">Charts</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/tema/chart-flot'); !!}">Flot</a></li>
					<li><a href="{!! url('/tema/chart-morris'); !!}">Morris</a></li>
					<li><a href="{!! url('/tema/chart-chartjs'); !!}">Chartjs</a></li>
					<li><a href="{!! url('/tema/chart-chartist'); !!}">Chartist</a></li>
					<li><a href="{!! url('/tema/chart-sparkline'); !!}">Sparkline</a></li>
					<li><a href="{!! url('/tema/chart-peity'); !!}">Peity</a></li>
                </ul>
            </li>
			<li class="nav-label">components</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-003-diamond"></i>
					<span class="nav-text">Bootstrap</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/tema/ui-accordion'); !!}">Accordion</a></li>
					<li><a href="{!! url('/tema/ui-alert'); !!}">Alert</a></li>
					<li><a href="{!! url('/tema/ui-badge'); !!}">Badge</a></li>
					<li><a href="{!! url('/tema/ui-button'); !!}">Button</a></li>
					<li><a href="{!! url('/tema/ui-modal'); !!}">Modal</a></li>
					<li><a href="{!! url('/tema/ui-button-group'); !!}">Button Group</a></li>
					<li><a href="{!! url('/tema/ui-list-group'); !!}">List Group</a></li>
					<li><a href="{!! url('/tema/ui-media-object'); !!}">Media Object</a></li>
					<li><a href="{!! url('/tema/ui-card'); !!}">Cards</a></li>
					<li><a href="{!! url('/tema/ui-carousel'); !!}">Carousel</a></li>
					<li><a href="{!! url('/tema/ui-dropdown'); !!}">Dropdown</a></li>
					<li><a href="{!! url('/tema/ui-popover'); !!}">Popover</a></li>
					<li><a href="{!! url('/tema/ui-progressbar'); !!}">Progressbar</a></li>
					<li><a href="{!! url('/tema/ui-tab'); !!}">Tab</a></li>
					<li><a href="{!! url('/tema/ui-typography'); !!}">Typography</a></li>
					<li><a href="{!! url('/tema/ui-pagination'); !!}">Pagination</a></li>
					<li><a href="{!! url('/tema/ui-grid'); !!}">Grid</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-053-heart"></i>
					<span class="nav-text">Plugins</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/tema/uc-select2'); !!}">Select 2</a></li>
					<li><a href="{!! url('/tema/uc-nestable'); !!}">Nestedable</a></li>
					<li><a href="{!! url('/tema/uc-noui-slider'); !!}">Noui Slider</a></li>
					<li><a href="{!! url('/tema/uc-sweetalert'); !!}">Sweet Alert</a></li>
					<li><a href="{!! url('/tema/uc-toastr'); !!}">Toastr</a></li>
					<li><a href="{!! url('/tema/map-jqvmap'); !!}">Jqv Map</a></li>
					<li><a href="{!! url('/tema/uc-lightgallery'); !!}">Light Gallery</a></li>
                </ul>
            </li>
            <li><a href="{!! url('/tema/widget-basic'); !!}" class="ai-icon" aria-expanded="false">
					<i class="flaticon-381-settings-2"></i>
					<span class="nav-text">Widget</span>
				</a>
			</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-044-file"></i>
					<span class="nav-text">Forms</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/tema/form-element'); !!}">Form Elements</a></li>
					<li><a href="{!! url('/tema/form-wizard'); !!}">Wizard</a></li>
					<li><a href="{!! url('/tema/form-editor-summernote'); !!}">Summernote</a></li>
					<li><a href="{!! url('/tema/form-pickers'); !!}">Pickers</a></li>
					<li><a href="{!! url('/tema/form-validation-jquery'); !!}">Jquery Validate</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-network"></i>
					<span class="nav-text">Table</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/tema/table-bootstrap-basic'); !!}">Bootstrap</a></li>
					<li><a href="{!! url('/tema/table-datatable-basic'); !!}">Datatable</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-049-copy"></i>
					<span class="nav-text">Pages</span>
				</a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/tema/page-register'); !!}">Register</a></li>
					<li><a href="{!! url('/tema/page-login'); !!}">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/tema/page-error-400'); !!}">Error 400</a></li>
							<li><a href="{!! url('/tema/page-error-403'); !!}">Error 403</a></li>
							<li><a href="{!! url('/tema/page-error-404'); !!}">Error 404</a></li>
							<li><a href="{!! url('/tema/page-error-500'); !!}">Error 500</a></li>
							<li><a href="{!! url('/tema/page-error-503'); !!}">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="{!! url('/tema/page-lock-screen'); !!}">Lock Screen</a></li>
                </ul>
            </li>
        </ul>
		<div class="copyright">
			<p><strong>Zenix Crypto Admin Dashboard</strong> © 2021 All Rights Reserved</p>
			<p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
		</div>
	</div>
</div>
<!--**********************************
	Sidebar end
***********************************-->