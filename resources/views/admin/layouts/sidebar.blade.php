<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="/" class="app-brand-link">
			<span class="app-brand-logo demo">
				<div class="logo">
					<img src="{{ asset('temp_front') }}/img/logo-smkpenda2kra.png" alt="Logo SMK Penda 2 Karanganyar" width="50">
				</div>
			</span>
			<span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
		</a>

		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
			<a href="/admin" class="menu-link">
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div>Dashboard</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">PPDB</span>
		</li>

		<li class="menu-item {{ request()->is('admin/syarat-ppdb*') ? 'active' : '' }}">
			<a href="{{ url('admin/syarat-ppdb') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-copy-alt'></i>
				<div>Syarat PPDB</div>
			</a>
		</li>

		<li class="menu-item {{ request()->is('admin/ppdb*') ? 'active' : '' }}">
			<a href="{{ url('admin/ppdb') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-id-card'></i>
				<div>Pendaftaran</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Setting Halaman</span>
		</li>

		<li class="menu-item {{ request()->is('admin/profil*') ? 'active' : '' }}">
			<a href="{{ url('admin/profil') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxl-slack-old'></i>
				<div>Profil</div>
			</a>
		</li>
		<li class="menu-item {{ request()->is('admin/program-keahlian*') ? 'active' : '' }}">
			<a href="{{ url('admin/program-keahlian') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-graduation'></i>
				<div>Program Keahlian</div>
			</a>
		</li>
		<li class="menu-item {{ request()->is('admin/sambutan*') ? 'active' : '' }}">
			<a href="{{ url('admin/sambutan') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-message-square-edit'></i>
				<div>Sambutan Kepsek</div>
			</a>
		</li>
		{{-- <li class="menu-item {{ request()->is('admin/fasilitas*') ? 'active' : '' }}">
			<a href="{{ url('admin/fasilitas') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-school'></i>
				<div>Fasilitas Beranda</div>
			</a>
		</li> --}}
		<li class="menu-item {{ request()->is('admin/brosur*') ? 'active' : '' }}">
			<a href="{{ url('admin/brosur') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-file'></i>
				<div>Brosur</div>
			</a>
		</li>
		<li class="menu-item {{ request()->is('admin/galeri*') ? 'active' : '' }}">
			<a href="{{ url('admin/galeri') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-images'></i>
				<div>Galeri</div>
			</a>
		</li>
		<li class="menu-item {{ request()->is('admin/berita*') ? 'active' : '' }}">
			<a href="{{ url('admin/berita') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-news'></i>
				<div>Berita</div>
			</a>
		</li>
		<li class="menu-item {{ request()->is('admin/guru*') ? 'active' : '' }}">
			<a href="{{ url('admin/guru') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-user-badge'></i>
				<div>Data Guru</div>
			</a>
		</li>
		<li class="menu-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">
			<a href="{{ url('admin/siswa') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-user-pin'></i>
				<div>Data Siswa</div>
			</a>
		</li>
		<li class="menu-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">
			<a href="{{ url('admin/slider') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-slider'></i>
				<div>Slider</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">SETTING ADMIN</span>
		</li>
		<li class="menu-item {{ request()->is('admin/user') ? 'active' : '' }}">
			<a href="{{ url('admin/user') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-user-circle'></i>
				<div>User</div>
			</a>
		</li>
		<hr>
		<li class="menu-item">
			<form action="{{ route('logout') }}" method="POST">
				@csrf
				<button type="submit" class="dropdown-item">
					<i class="menu-icon tf-icons bx bx-power-off me-2"></i>
					<span class="align-middle">Log Out</span>
				</button>
			</form>
		</li>
	</ul>
</aside>
<!-- / Menu -->
