<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                Chi Tiết Mua Hàng <p></p>
            </h3>
            <div class="row">
                <h4 style="color: #5392FB">Thông tin khách hàng</h4>
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 30%"><strong>Mã Giao Dịch: </strong></td>
                                <td><?php echo $detail['unique_code'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><strong>Ngày Đặt Hàng: </strong></td>
                                <td><?php echo date("d-m-Y / H:i:s",strtotime($detail['created_at'])) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Họ Tên: </strong></td>
                                <td><?php echo $detail['customer_name'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Địa Chỉ Email: </strong></td>
                                <td><?php echo $detail['customer_email'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Số Điện Thoại: </strong></td>
                                <td><?php echo '0'.$detail['customer_phone'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Địa Chỉ: </strong></td>
                                <td><?php echo $detail['customer_address'] ?> - <?php echo $detail['customer_district'] ?> - <?php echo $detail['customer_city'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Phương Thức Thanh Toán: </strong></td>
                                <td><?php echo ($detail['payment_method'] == 1)? 'COD' : 'Bank' ?></td>
                            </tr>
                            <tr>
                                <td><strong>Trạng Thái Đơn Hàng: </strong></td>
                                <td>
                                    <?php
                                        switch ($detail['status']) {
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
                            </tr>
                            <tr>
                                <td><strong>Lời Nhắn Của Khác Hàng: </strong></td>
                                <td><?php echo $detail['customer_content'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <br>
                <br>

                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />

            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top: 10px;">
                    <h4 style="color: #5392FB">Sản Phẩm Của Đơn Hàng</h4>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Loại sản phẩm mua</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php if ($detail): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($detail['order_product'] as $key => $value): ?>
                                     <tr class="remove_" >
                                        <td><?php echo $i++ ?></td>
                                        <td style="width: 20%"><img src="<?php echo base_url('assets/upload/product/'. $value['slug'] .'/'. $value['product_image']); ?>" style="width: 90%"></td>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <td><?php echo number_format($value['price_min']) ?> VND</td>
                                        <td>Loại nhỏ</td>
                                        <td><?php echo $value['product_quantity'] ?></td>
                                        <td><?php echo number_format($value['price_min'] * $value['product_quantity']) ?> VND</td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <?php
                                        $count = count($detail['order_product']);
                                        $total = 0;
                                        $price_total = 0;
                                        for ($i=0; $i < $count; $i++) { 
                                            $total += $detail['order_product'][$i]['product_quantity'];
                                            $price_total += $detail['order_product'][$i]['product_quantity'] * $detail['order_product'][$i]['price_min'];
                                        }
                                    ?>
                                    <td>Tổng Số Lượng: <strong> <?php echo $total ?></strong></td>
                                    <td>Tổng Tiền: <strong> <?php echo number_format($price_total); ?> VND</strong></td>
                                </tr>
                            </tbody>
                    </table>
                    <div class="col-md-6 col-md-offset-5 page">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
