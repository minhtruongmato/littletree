<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Mới Danh Mục
            <small>Danh Mục</small>
        </h1>
        <?php if ($this->session->flashdata('message_error')): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> alert!</h4>
                <?php echo $this->session->flashdata('message_error'); ?>
            </div>
        <?php endif ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Danh Mục</h4>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Tên danh mục', 'category_title');
                            echo form_error('category_title','<div class="error">', '</div>');
                            echo form_input('category_title', $blog_category_detail['title'], 'class="form-control" id="title"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('slug', 'category_slug');
                            echo form_error('category_slug');
                            echo form_input('category_slug', $blog_category_detail['slug'], 'class="form-control" id="slug" readonly');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Danh mục cha', 'parent_id');
                            echo form_error('parent_id');
                            echo form_dropdown('parent_id', $blog_category_list, $blog_category_detail['parent_id'], 'class="form-control"');
                            ?>
                        </div>

                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

