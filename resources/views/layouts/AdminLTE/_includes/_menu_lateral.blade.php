<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header" style="color:#fff;"> MAIN MENU <i class="fa fa-level-down"></i></li>
			<li class="
						{{ Request::segment(2) === null ? 'active' : null }}
						{{ Request::segment(2) === 'home' ? 'active' : null }}
					  ">
				<a href="{{ route('admin.home') }}" title="Dashboard"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a>
			</li>

			@if(Request::segment(2) === 'profile')

			<li class="{{ Request::segment(2) === 'profile' ? 'active' : null }}">
				<a href="{{ route('profile') }}" title="Profile"><i class="fa fa-user"></i> <span> PROFILE</span></a>
			</li>

			@endif
			<li class="treeview
				{{ Request::segment(2) === 'config' ? 'active menu-open' : null }}
				{{ Request::segment(2) === 'user' ? 'active menu-open' : null }}
				{{ Request::segment(2) === 'role' ? 'active menu-open' : null }}
				{{ Request::segment(2) === 'country' ? 'active menu-open' : null }}
				{{ Request::segment(2) === 'city' ? 'active menu-open' : null }}
				">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span>SETTINGS</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					@if (Auth::user()->role == 1)
						<li class="{{ Request::segment(2) === 'config' && Request::segment(2) === null ? 'active' : null }}">
							<a href="{{ route('config') }}" title="App Config">
								<i class="fa fa-gear"></i> <span> Settings App</span>
							</a>
						</li>
					@endif
					<li class="
						{{ Request::segment(2) === 'user' ? 'active' : null }}
						{{ Request::segment(2) === 'role' ? 'active' : null }}
						">
						<a href="{{ route('user') }}" title="Users">
							<i class="fa fa-user"></i> <span> Users</span>
						</a>
					</li>
                    <li class="
						{{ Request::segment(2) === 'country' ? 'active' : null }}
						">
						<a href="{{ route('country') }}" title="Countries">
							<i class="fa fa-globe"></i> <span> Countries</span>
						</a>
					</li>
                    <li class="
						{{ Request::segment(2) === 'city' ? 'active' : null }}
						">
						<a href="{{ route('city') }}" title="Cities">
							<i class="fa fa-building-o"></i> <span> Cities</span>
						</a>
					</li>
				</ul>
			</li>

            <li class="treeview
				{{ Request::segment(2) === 'category' ? 'active menu-open' : null }}
				{{ Request::segment(2) === 'item' ? 'active menu-open' : null }}
				">
				<a href="#">
                    <i class="fa fa-database" aria-hidden="true"></i>
					<span>Items</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="
						{{ Request::segment(2) === 'category' ? 'active' : null }}
						">
						<a href="{{ route('category') }}" title="Categories">
							<i class="fa fa-sitemap" aria-hidden="true"></i> <span> Categories</span>
						</a>
					</li>
                    <li class="
						{{ Request::segment(2) === 'item' ? 'active' : null }}
						">
						<a href="{{ route('item') }}" title="Items">
							<i class="fa fa-database" aria-hidden="true"></i> <span> Items</span>
						</a>
					</li>
				</ul>
			</li>


            <li class="treeview
				{{ Request::segment(2) === 'page' ? 'active menu-open' : null }}
				{{ Request::segment(2) === 'contact' ? 'active menu-open' : null }}
				">
				<a href="#">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
					<span>Pages</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="
						{{ Request::segment(2) === 'page' ? 'active' : null }}
						">
						<a href="{{ route('page') }}" title="Pages">
							<i class="fa fa-clone" aria-hidden="true"></i> <span> Pages</span>
						</a>
					</li>
                    <li class="
						{{ Request::segment(2) === 'contact' ? 'active' : null }}
						">
						<a href="{{ route('contact') }}" title="Contact">
							<i class="fa fa-address-book" aria-hidden="true"></i> <span> Contact</span>
						</a>
					</li>
				</ul>
			</li>


            {{-- <li class="
					    {{ Request::segment(2) === 'appointment' ? 'active' : null }}
					  ">
				<a href="{{ route('appointment') }}" title="Appointments"><i class="fa fa-calendar"></i> <span> Appointments</span></a>
			</li> --}}

		</ul>
	</section>
</aside>
