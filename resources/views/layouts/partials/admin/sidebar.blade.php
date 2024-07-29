<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }} " href="{{ route('dashboard') }}">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->

		<li class="nav-heading">Main</li>

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('bannerPrograms') ? '' : 'collapsed' }}" href="{{ route('bannerPrograms') }} " href="{{ route('bannerPrograms') }}">
				<i class="bi bi-list"></i>
				<span>Banner Programs</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('farmers.*') ? '' : 'collapsed' }}" href="{{ route('farmers.index') }}">
				<i class="bi bi-person"></i>
				<span>Farmer Profiling</span>
			</a>
		</li>

		<li class="nav-heading">Maintenance</li>

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('users.*') ? '' : 'collapsed' }}" href="{{ route('users.index') }}">
				<i class="bi bi-person"></i>
				<span>User List</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link {{ request()->routeIs('profile.*') ? '' : 'collapsed' }}" href="{{ route('profile.edit') }}">
				<i class="bi bi-gear"></i>
				<span>Settings</span>
			</a>
		</li>
		<br>

		<form class="logout-form" action="{{ route('logout') }}" method="POST" >
			@csrf
			<li class="nav-item">
				<a class=" logout nav-link collapsed" href="">
					<i class="bi bi-power"></i>
					<span>Logout</span>
				</a>
			</li>
		</form>

	</ul>

</aside><!-- End Sidebar-->
