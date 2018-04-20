<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Giới Thiệu
            <small>Chi tiết</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Giới Thiệu</a></li>
            <li class="active">Chi tiết</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết sự kiện</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <?php if ($this->session->flashdata('message_error')): ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                    <?php echo $this->session->flashdata('message_error'); ?>
                                </div>
                            <?php endif ?>
                            <?php if ($this->session->flashdata('message_success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                    <?php echo $this->session->flashdata('message_success'); ?>
                                </div>
                            <?php endif ?>
                            <div class="detail-image col-md-12">
                                <label>Hình ảnh</label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg row">
                                                <div class="col-md-2">
                                                    <span onclick="active_avatar('about', '')" style="cursor: pointer;">
                                                        <img src="<?php echo base_url('assets/upload/about/'. $detail['image']) ?>" alt="Image Detail" width="150px">
                                                    </span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 100px">Tiêu đề: </th>
                                        <td><?php echo $detail['title'] ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Slug: </th>
                                        <td><?php echo $detail['slug'] ?></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Nội dung: </th>
                                        <td><?php echo $detail['content'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
                        </div>
                        <div class="box-body">
                            <a href="<?php echo base_url('admin/about/edit/'. $detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
