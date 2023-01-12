<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">UIN PTIPD Hi, {{ Auth::user()->role }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ Request::is('user', 'jabatan', 'pekerjaan') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="bi bi-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    @if (Auth::user()->role == 'admin')
                        <li class="{{ Request::is('user') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('user.index') }}">Daftar User</a></li>
                        <li class="{{ Request::is('jabatan') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('jabatan.index') }}">Daftar Jabatan</a></li>
                    @else
                        <li class="{{ Request::is('pekerjaan') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('pekerjaan.index') }}">Pekerjaan</a></li>
                    @endif
                </ul>
            </li>
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('lembur') ? 'active' : '' }}">
                <a href="{{ route('lembur.index') }}"><i class="bi bi-collection-fill"></i><span>Lembur</span></a>
            <li class="{{ Request::is('spk') ? 'active' : '' }}">
                <a href="{{ route('spk.index') }}"><i
                        class="bi bi-clipboard2-check-fill"></i><span>Surat Perintah</span></a>
        </ul>
    </aside>
</div>
