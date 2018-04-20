<?php
if($this->ion_auth->logged_in()) {
?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
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
                <li class="header">MAIN NAVIGATION</li>
                <li class="">
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <!--
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-home"></i>
                        <span>Homepage</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('admin/homepage') ?>"><i class="fa fa-desktop"></i> Overview</a></li>
                        <li><a href="<?php echo base_url('admin/homepage/slider') ?>"><i class="fa fa-picture-o"></i> Slider</a></li>
                        <li><a href="<?php echo base_url('admin/homepage/featured') ?>"><i class="fa fa-star-o"></i> Featured</a></li>
                    </ul>
                </li>
                -->
                <li class="">
                    <a href="<?php echo base_url('admin/about') ?>">
                        <i class="fa fa-user-circle-o"></i>
                        <span>Giới Thiệu</span>
                    </a>
                </li>

				<li class="<?php echo ($this->uri->segment(2) == 'banner')? 'active' : '' ?>">
					<a href="<?php echo base_url('admin/banner') ?>">
						<i class="fa fa-image"></i>
						<span>Slider</span>
					</a>
				</li>
                <li class="<?php echo ($this->uri->segment(2) == 'our_food')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/our_food') ?>">
                        <i class="fa fa-cutlery"></i>
                        <span>Món Ăn Của Chúng Tôi</span>
                    </a>
                </li>
				<!--
                <li class="<?php echo ($this->uri->segment(2) == 'food')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/food') ?>">
                        <i class="fa fa-bars"></i>
                        <span>Danh Sách Món Ăn</span>
                    </a>
                </li>
				-->
                <li class="<?php echo ($this->uri->segment(2) == 'event')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/event') ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span>Sự Kiện</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'library')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/library') ?>">
                        <i class="fa fa-picture-o"></i>
                        <span>Thư Viện Ảnh</span>
                    </a>
                </li>
                <li class="treeview <?php echo ($this->uri->segment(2) == 'order')? 'active' : '' ?>">
                    <a href="">
                        <i class="fa fa-file-text-o"></i>
                        <span>Đặt Bàn</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ($this->uri->segment(3) == '' || $this->uri->segment(3) == 'index')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/order') ?>">
                                <i class="fa fa-refresh"></i> Chờ Xác Nhận
                            </a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(3) == 'success')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/order/success') ?>">
                                <i class="fa fa-check-square-o"></i> Đã Xác Nhận
                            </a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(3) == 'cancel')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/order/cancel') ?>">
                                <i class="fa fa-ban"></i> Đã hủy bỏ
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="header">DOCUMENTATION</li>
                <li>
                    <a href="<?php echo base_url('admin/documentation') ?>">
                        <i class="fa fa-book"></i> <span>Documentation</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php } ?>



