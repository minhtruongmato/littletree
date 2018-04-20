<style type="text/css">
.image-file{
    display: none;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Giới Thiệu
            <small>Chỉnh Sửa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Giới Thiệu</a></li>
            <li class="active">Chỉnh Sửa</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cập nhật giới thiệu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-image col-md-12">
                                <img src="<?php echo base_url('assets/upload/about/'. $detail['image']) ?>" alt="Image Detail" width="150px">
                            </div>

                            <?php
                            echo form_open_multipart('', array('class' => 'form-horizontal'));
                            ?>
                            <div class="detail-info col-xs-12">
                                <?php
                                echo form_label('Thay đổi hình ảnh (ảnh không quá 1200 KB)', 'image');
                                echo form_error('image');
                                echo form_upload('image','','class="form-control" id="image"');
                                ?>
                                <span style="color: red"><?php echo $this->session->flashdata('message_error_image'); ?></span>
                                <br>
                                <br>
                            </div>

                            <div class="detail-info col-md-12">
                                <?php
                                echo form_label('Tiêu đề', 'title');
                                echo form_error('title');
                                echo form_input('title', $detail['title'], 'class="form-control" id="title"');
                                ?>
                            </div>
                            <div class="detail-info col-md-12">
                                <?php
                                echo form_label('Slug', 'slug');
                                echo form_error('slug');
                                echo form_input('slug', $detail['slug'], 'class="form-control" id="slug" readonly');
                                ?>
                            </div>
                            <div class="detail-info col-md-12">
                                <?php
                                echo form_label('Nội dung', 'content');
                                echo form_error('content');
                                echo form_textarea('content', $detail['content'], 'class="form-control tinymce-area"')
                                ?>
                                <br>
                            </div>
                            <div class="detail-info">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-10 btn-submit">
                                        <button type="submit" class="btn btn-primary">
                                            OK
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
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
