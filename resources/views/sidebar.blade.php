<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(\App\Http\Helpers\Base::getProfPic() ? \App\Http\Helpers\Base::getProfPic() : "assets/img/default_profpic.png") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ \App\Http\Helpers\Base::getUserName() }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            
            <li>
                <a href="{{ url ('user', [\App\Http\Helpers\Base::getUserID()]) }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <!-- Data Rumah Kos -->
            <li class="header">DATA RUMAH KOS</li>

            <li>
                <a href="{{ url ('house') }}">
                    <i class="fa fa-home"></i>
                    <span>Rumah</span>
                </a>
            </li>

            <!-- Data Penghuni -->
            <li class="header">DATA PENGHUNI</li>
                
            <li>
                <a href="{{ url ('occupant') }}">
                    <i class="fa fa-users"></i>
                    <span>Penghuni</span>
                </a>
            </li>

            <li>
                <a href="{{ url ('transaction') }}">
                    <i class="fa fa-money"></i>
                    <span>Pembayaran</span>
                </a>
            </li>

            <!-- Data Pengguna -->
            <li class="header">DATA PENGGUNA</li>

            <li>
                <a href="{{ url ('user') }}">
                    <i class="fa fa-user"></i>
                    <span>Pengguna</span>
                </a>
            </li>

            <li>
                <a href="{{ url ('role') }}">
                    <i class="fa fa-user"></i>
                    <span>Peran</span>
                </a>
            </li>

        </ul>
    </section>

</aside>
