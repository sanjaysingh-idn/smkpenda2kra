<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg text-white bg-egyptian-blue sticky-top">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			<span><img src="{{ asset('temp_front') }}/img/navbarlogo-smkpenda2kra.png" class="d-inline-block align-text-top me-2"
					alt="" width="50" height="70"></span>
		</a>
		<button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class='bx bxs-down-arrow'></i>
		</button>
		<div class="collapse navbar-collapse py-3" id="navbarNav">
			<ul class="navbar-nav ms-auto fs-6">
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/') }}">Beranda</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<span class="{{ request()->is('profil*') ? 'text-citrine' : '' }}">Profil</span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						@foreach ($profils as $p)
							<li>
								<a class="dropdown-item" href="{{ url('profil/' . $p->slug) }}">
									<span class="{{ request()->is('profil/' . $p->slug) ? 'text-citrine' : '' }}">{{ $p->title }}</span>
								</a>
							</li>
						@endforeach
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<span class="{{ request()->is('program-keahlian*') ? 'text-citrine' : '' }}">
							Program Keahlian
						</span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						@foreach ($programs as $pk)
							<li>
								<a class="dropdown-item" href="{{ url('program-keahlian/' . $pk->slug) }}">
									<span class="{{ request()->is('program-keahlian/' . $pk->slug) ? 'text-citrine' : '' }}">
										{{ $pk->nama_program }} ({{ $pk->singkatan }})
									</span>
								</a>
							</li>
						@endforeach
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<span class="{{ request()->is('informasi*') ? 'text-citrine' : '' }}">
							Informasi
						</span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li>
							<a class="dropdown-item" href="{{ url('informasi/berita') }}">
								<span class="{{ request()->is('informasi/berita') ? 'text-citrine' : '' }}">
									Berita
								</span>
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="{{ url('informasi/galeri') }}">
								<span class="{{ request()->is('informasi/galeri') ? 'text-citrine' : '' }}">
									Galeri
								</span>
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="{{ url('akademik/data-guru') }}">
								<span class="{{ request()->is('akademik/data-guru') ? 'text-citrine' : '' }}">
									Data Guru
								</span>
							</a>
						</li>
					</ul>
				</li>
				{{-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<span class="{{ request()->is('akademik*') ? 'text-citrine' : '' }}">
							Akademik
						</span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li>
							<a class="dropdown-item" href="{{ url('akademik/data-guru') }}">
								<span class="{{ request()->is('akademik/data-guru') ? 'text-citrine' : '' }}">
									Data Guru
								</span>
							</a>
						</li>
						@if (Auth::check())
						<li>
                            <a class="dropdown-item" href="{{ url('akademik/data-siswa') }}">
                                <span class="{{ request()->is('akademik/data-siswa') ? 'text-citrine' : '' }}">
                                    Data Siswa
                                </span>
                            </a>
                        </li>
						@endif
					</ul>
				</li> --}}
				<li class="nav-item me-2">
					<a class="nav-link" href="{{ url('/') }}#kontak-kami">Kontak Kami</a>
				</li>
				{{-- @if (Auth::check())
                <li class="nav-item">
                    <a href="{{ url('pendaftaran-siswa') }}" class="btn bg-citrine text-egyptian-blue fw-bold"><i class='bx bx-user-plus text-dark'></i> <span class="text-dark">Pendaftaran Siswa (PPDB)</span></a>
                </li>
                @endif --}}
				@if (Auth::check())
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bx bx-user"></i>
							<strong>{{ Auth::user()->name }}</strong>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							@if (Auth::user()->role == 'siswa')
								<li>
									<a class="dropdown-item" href="{{ route('panel-siswa', ['id' => Auth::id()]) }}">
										<span>
											Halaman Panel Siswa
										</span>
									</a>
								</li>
								<li>
									<a href="{{ url('pendaftaran-siswa') }}" class="dropdown-item">
										{{-- <i class='bx bx-user-plus '></i>  --}}
										<span class="">Pendaftaran Siswa (PPDB)</span>
									</a>
								</li>
							@endif
							@if (Auth::user()->role == 'admin')
								<li>
									<a class="dropdown-item" href="{{ url('/admin') }}">
										<span>
											Halaman Admin
										</span>
									</a>
								</li>
							@endif
							<li class="text-center my-3">
								<form action="{{ route('logout') }}" method="POST">
									@csrf
									<button type="submit" class="btn bg-citrine text-egyptian-blue fw-bold btn-xs">
										<i class="bx bx-power-off "></i>
										<span class="align-middle">Log Out</span>
									</button>
								</form>
							</li>
						</ul>
					</li>
				@else
					<li class="nav-item me-2">
						<a class="nav-link btn btn-warning text-egyptian-blue" href="{{ route('login') }}"><i class="bx bx-log-in"></i>
							Login</a>
					</li>
				@endif
			</ul>

			{{-- @if (Auth::check())
            @if (Auth::user()->role == 'siswa')
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn bg-citrine text-egyptian-blue fw-bold">
                <i class="bx bx-power-off "></i>
                <span class="align-middle">Log Out</span>
            </button>
            </form>
            @endif
            @endif --}}
		</div>
	</div>
</nav>
