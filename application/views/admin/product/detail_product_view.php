<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản Phẩm
            <small>Chi Tiết</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi Tiết Sản Phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<div class="row">
							<div class="detail-image col-md-6">
								<label>Hình Ảnh</label>
								<div class="row">
									<div class="item col-md-12">
										<div class="mask-lg">
											<img src="<?php echo base_url('assets/upload/product/'. $detail['slug'] .'/'. $detail['image']) ?>" width="250px">
										</div>
									</div>
								</div>
							</div>
							<div class="detail-info col-md-6">
								<div class="table-responsive">
									<label>Thông tin sản phẩm</label>
									<table class="table table-striped">
										<tr>
											<th width="170px">Tên sản phẩm: </th>
											<td><?php echo $detail['title'] ?></td>
										</tr>
										<tr>
											<th>Danh mục: </th>
											<td><?php echo $detail['cate_title'] ?></td>
										</tr>
										<?php if ($detail['price_mid'] != '' && $detail['price_max']): ?>
											<tr>
												<th>Giá cho sản phẩm nhỏ: </th>
												<td><?php echo number_format($detail['price_min']) ?> VND</td>
											</tr>
											<tr>
												<th>Giá cho sản trung bình: </th>
												<td><?php echo number_format($detail['price_mid']) ?> VND</td>
											</tr>
											<tr>
												<th>Giá cho sản phẩm lớn: </th>
												<td><?php echo number_format($detail['price_max']) ?> VND</td>
											</tr>
										<?php else: ?>
											<tr>
												<th>Giá sản phẩm: </th>
												<td><?php echo number_format($detail['price_min']) ?> VND</td>
											</tr>
										<?php endif ?>
									</table>
								</div>
							</div>
							<div class="detail-info col-md-12">
								<div class="table-responsive">
									<table class="table table-striped">
										<tr>
											<th width="150px">Giới Thiệu</th>
											<td><?php echo $detail['description'] ?></td>
										</tr>
										<tr>
											<th width="150px">Nội Dung</th>
											<td><?php echo $detail['content'] ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <!-- /.col -->
			<div class="col-md-3">
				<div class="box box-warning">
					<div class="box-header">
						<h3 class="box-title">Chỉnh sửa thông tin sản phẩm</h3>
					</div>
					<div class="box-body">
						<a href="<?php echo base_url('admin/product/edit/'. $detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
					</div>
				</div>
			</div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>

<!-- DataTables -->
<script>
    $(function () {
        $('#table').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>