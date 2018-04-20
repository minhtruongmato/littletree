<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Mới Sản Phẩm
            <small>Sản Phẩm</small>
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
                            <h4 class="box-title">Sản Phẩm</h4>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Hình ảnh', 'image_shared');
                            echo form_error('image');
                            echo form_upload('image', '', 'class="form-control"');
                            ?>
                            <p class="help-block">Click để upload</p>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Tên sản phẩm', 'title');
                            echo form_error('title','<div class="error">', '</div>');
                            echo form_input('title', set_value('title'), 'class="form-control" id="title"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('slug', 'slug');
                            echo form_error('slug');
                            echo form_input('slug', set_value('slug'), 'class="form-control" id="slug" readonly');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Danh mục cha', 'category_id');
                            echo form_error('category_id');
                            ?>
                            <select name="category_id" class="form-control">
                                <option>Chọn danh mục</option>
                                <?php foreach ($category as $key => $value): ?>
                                    <?php if (count($value['sub']) > 1): ?>
                                        <optgroup label="<?php echo $value['title'] ?>">
                                            <?php foreach ($value['sub'] as $k => $val): ?>
                                                <option value="<?php echo $val['id'] ?>"><?php echo $val['title'] ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    <?php else: ?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Giá cho sản phẩm nhỏ', 'price_min');
                            echo form_error('price_min');
                            echo form_input('price_min', set_value('price_min'), 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Giá cho sản phẩm trung bình', 'price_mid');
                            echo form_error('price_mid');
                            echo form_input('price_mid', set_value('price_mid'), 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Giá cho sản phẩm lớn', 'price_max');
                            echo form_error('price_max');
                            echo form_input('price_max', set_value('price_max'), 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Giới thiệu', 'description');
                            echo form_error('description');
                            echo form_textarea('description', set_value('description', '', false), 'class="form-control" rows="5" ')
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Nội dung', 'content');
                            echo form_error('content');
                            echo form_textarea('content', set_value('content', '', false), 'class="tinymce-area form-control"')
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

