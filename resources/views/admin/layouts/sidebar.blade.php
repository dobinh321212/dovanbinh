


     <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::check())
                    <img src="/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>
                    @if(Auth::check())
                        {{Auth::user()->name}}
                    @endif
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">TÙY CHỌN</li>
            <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-th"></i> <span>QL DANH MỤC</span></a></li>
            <li><a href="http://dovanbinh.com/admin/vendor"><i class="fa fa-cube"></i> <span>QL NHÀ CUNG CẤP</span></a></li>
            <li><a href="http://dovanbinh.com/admin/product"><i class="fa fa-database"></i> <span>QL SẢN PHẨM</span></a></li>
            <li><a href="http://dovanbinh.com/admin/banner"><i class="fa fa-photo"></i> <span>QL Banner</span></a></li>
            <li><a href="http://dovanbinh.com/admin/user"><i class="fa fa-database"></i> <span>QL Người Dùng</span></a></li>
            <li><a href="http://dovanbinh.com/admin/article"><i class="fa fa-database"></i> <span>QL Tin Tức</span></a></li>
            <li><a href="http://dovanbinh.com/admin/setting"><i class="fa fa-photo"></i> <span>Cấu Hình Website</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
