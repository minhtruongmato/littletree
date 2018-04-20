

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                Thư viện ảnh <p></p>
            </h3>
            <?php if ($this->session->flashdata('message_success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_success'); ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('message_error')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_error') ?>
                </div>
            <?php endif ?>
            <div class="row">
                <a type="button" href="<?php echo base_url('admin/category/create') ?>" class="btn btn-primary">THÊM MỚI</a>
            </div>
            <div>
                <br>
                <br>

                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />

            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top: 10px;">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Slug danh mục</th>
                                <th>Danh mục cha</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php if ($result): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($result as $key => $value): ?>
                                     <tr class="remove_<?php echo $value['id'] ?>" >
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['slug']; ?></td>
                                        <td><?php echo ($value['parent_id'] !=0)? $value['sub'] : 'Danh mục gốc' ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/category/edit/'. $value['id']) ?>" title="Sửa"><i class="fa fa-fw fa-edit"></i></a>
                                            &nbsp&nbsp&nbsp&nbsp&nbsp
                                            <a href="javascript:void(0);" title="Xóa" class="btn-remove" onclick="remove('category', <?php echo $value['id'] ?>, 'Chắc chắn xóa? (! Lưu ý khi xóa danh mục cha sẽ xóa tất cả danh mục con và các sản phẩm thuộc danh mục này)')" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- <tr class="remove_<?php echo $value['id'] ?>" >
                                        <td style="width: 100px">
                                            <img src="<?php echo base_url('assets/upload/banner/'. $value['image']) ?>" alt="" style="width: 200px">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="Xóa" class="btn-remove" onclick="remove('banner', <?php echo $value['id'] ?>)" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr> -->
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                    </table>
                    <div class="col-md-6 col-md-offset-5 page">
                        <?php echo $page_links ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>