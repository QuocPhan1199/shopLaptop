
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-exl-collapse">
            <span class="sr-only">Chuyển đổi</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Trang admin</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> Me <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile">
                        <i class="fa fa-fw fa-user"></i> Hồ sơ
                    </a>
                </li>
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"></i> Sản phẩm
                    </a>
                </li>
                <li>
                    <a href="index.php?view_categories">
                        <i class="fa fa-fw fa-gear"></i> Danh mục
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw fa-user"></i> Khách hàng
                    </a>
                </li>
                <li class="divider"></li>
                <li>
               <a href="../index.php">
                   <i class="fa fa-fw fa-undo"></i>  Về lại trang web
                </a>
            </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-exl-collapse">
       <ul class="nav navbar-nav side-nav">
           <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-home"></i> Trang chủ
                </a>
           </li>
           <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-tasks"></i> Sản phẩm
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_products"> Thêm sản phẩm</a>
                    </li>
                    <li>    
                        <a href="index.php?view_products"> Danh sách</a>
                     </li>
                </ul>
           </li>
           <li>
                <a href="#" data-toggle="collapse" data-target="#categories">
                    <i class="fa fa-fw fa-list"></i> Danh mục
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="categories" class="collapse">
                    <li>
                        <a href="index.php?insert_categories"> Thêm danh mục</a>
                    </li>
                    <li> 
                        <a href="index.php?view_categories"> Danh sách</a>
                     </li>
                </ul>
           </li>
           <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    <i class="fa fa-fw fa-sliders"></i> Slide 
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slides"> Thêm slide</a>
                    </li>
                    <li> 
                        <a href="index.php?view_slides"> Danh sách</a>
                     </li>
                </ul>
           </li>
           <li>
               <a href="index.php?view_customer">
                   <i class="fa fa-fw fa-users"></i>  Khách hàng
                </a>
            </li>
            <li>
               <a href="index.php?view_order">
                   <i class="fa fa-fw fa-shopping-basket"></i>  Đơn hàng
                </a>
            </li>
            <li>
            <a href="../index.php">
                   <i class="fa fa-fw fa-undo"></i>  Về lại trang web
                </a>
            </li>
       </ul>
    </div>
</nav>
