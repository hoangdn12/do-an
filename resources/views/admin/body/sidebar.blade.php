@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ url('admin/dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Flimart</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ ($route == 'dashboard')? 'active':'' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>



            <li class="treeview {{ ($prefix == '/product')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="plus-circle"></i>
                        <span>Sản phẩm</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'add-product')? 'active':'' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i>Thêm sản phẩm</a></li>
                        <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Quản lý sản phẩm</a></li>
                    </ul>
                </li>

                <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="truck"></i>
                        <span>Đơn hàng </span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i> Chờ xác nhận</a></li>
                        <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i> Đã xác nhận</a></li>
                        <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i> Chờ lấy hàng</a></li>
                        <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Đang giao</a></li>
                        <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Đã giao thành công</a></li>
                        <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Đã hủy</a></li>
                    </ul>
                </li>


                <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="alert-circle"></i>
                        <span>Đơn hàng hoàn trả</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Yêu cầu hoàn trả</a></li>
                        <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>Đơn hàng đã hoàn</a></li>
                    </ul>
                </li>


                

                <li class="treeview {{ ($prefix == '/brand')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Thương hiệu</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>Tất cả thương hiệu</a></li>
                    </ul>
                </li>



                <li class="treeview {{ ($prefix == '/category')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Danh mục </span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>Tất cả danh mục</a></li>
                        <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Tất cả danh mục con</a></li>
                        <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Tất cả nhóm sản phẩm</a></li>
                    </ul>
                </li>







                <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="image"></i>
                        <span>Slide</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Quản lý Slider</a></li>
                    </ul>
                </li>




                <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="gift"></i>
                        <span>Mã giảm giá</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Quản lý mã giảm giá</a></li>
                    </ul>
                </li>




                

                <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="activity"></i>
                        <span>Thống kê </span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>Tất cả thống kê</a></li>
                    </ul>
                </li>



                <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
          <a href="#">
            <i data-feather="globe"></i>
            <span>Bài viết</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Danh mục</a></li>
          <!-- <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Thêm bài viết</a></li> -->
        <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>Danh sách bài viết</a></li>

     
  
          </ul>
        </li>   


        
                

                <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Kho hàng </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Tất cả sản phẩm</a></li>

        
          </ul>
        </li>   




                <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="user"></i>
                        <span>Người dùng </span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>Tất cả người dùng</a></li>
                    </ul>
                </li>

                



            
        </ul>
    </section>
    <div class="sidebar-footer">
        <!-- item-->
        <a href="{{ route('admin.profile') }}" class="link" data-toggle="tooltip" title="" data-original-title="Cài đặt" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href=" " class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Đăng xuất"><i class="ti-lock"></i></a>
    </div>
</aside>
