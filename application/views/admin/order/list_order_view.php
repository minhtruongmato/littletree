<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                Danh sách mua hàng <p></p>
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
                <div class="col-md-6">
                    
                </div>

                <div class="col-md-6">
                    <form action="<?php echo base_url('admin/order/'. $temp) ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search" value="<?php echo $keywords ?>">
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                            </span>
                        </div>
                    </form>
                </div>
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
                                <th>Mã giao dịch</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php if ($result): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($result as $key => $value): ?>
                                     <tr class="remove_<?php echo $value['id'] ?>" >
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $value['unique_code']; ?></td>
                                        <td><?php echo $value['customer_name']; ?></td>
                                        <td><?php echo date("d-m-Y / H:i:s",strtotime($value['created_at'])); ?></td>
                                        <td>
                                            <?php
                                                switch ($value['status']) {
                                                    case 0:
                                                        echo '<span class="label label-warning">Chờ xác nhận</span>';
                                                        break;
                                                    case 1:
                                                        echo '<span class="label label-primary">Đã xác nhận</span>';
                                                        break;
                                                    case 2:
                                                        echo '<span class="label label-success">Hoàn thành</span>';
                                                        break;
                                                    case 99:
                                                        echo '<span class="label label-danger">Đã hủy</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="label label-warning">Chờ xác nhận</span>';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td><a href="<?php echo base_url('admin/order/detail/'. $value['id']) ?>" title="Chi tiết" class="btn btn-primary">Xem</a></td>
                                        <td>
                                            <?php if ($value['status'] == 0): ?>
                                                <a href="javascript:void(0);" title="Xác nhận" class="btn btn-primary" onclick="ongoing('order', <?php echo $value['id'] ?>, 'Chắc chắn xác nhận đơn hàng?')">Xác Nhận</a>
                                            <?php elseif($value['status'] == 1): ?>
                                                <a href="javascript:void(0);" title="Xác nhận" class="btn btn-success" onclick="complete('order', <?php echo $value['id'] ?>, 'Đóng đơn hàng này?')">Hoàn Thành</a>
                                            <?php endif ?>
                                            
                                            &nbsp&nbsp&nbsp&nbsp&nbsp
                                            <a href="javascript:void(0);" title="Xác nhận" class="btn btn-danger" onclick="cancel('order', <?php echo $value['id'] ?>, 'Chắc chắn hủy đơn hàng?')">Hủy Bỏ</a>
                                        </td>
                                    </tr>
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
