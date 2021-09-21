<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="{{ request()->is('/') ? 'active' : '' }}"> <a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    @if (auth()->user()->level==1)
        <li class="{{ request()->is('admin') ? 'active' : '' }}"> <a href="/admin"><i class="fa fa-book"></i> <span>Admin</span></a></li>
        <li class="{{ request()->is('guru') ? 'active' : '' }}"> <a href="/guru"><i class="fa fa-book"></i> <span>Guru</span></a></li>
        <li class="{{ request()->is('siswa') ? 'active' : '' }}"> <a href="/siswa"><i class="fa fa-book"></i> <span>Siswa</span></a></li>
        <li class="{{ request()->is('tagihan') ? 'active' : '' }}"> <a href="/tagihan"><i class="fa fa-book"></i> <span>Tagihan</span></a></li>
    @elseif (auth()->user()->level==2)
    @elseif (auth()->user()->level==3)
    @endif



  </ul>
