<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<?php echo $page;?>
		</h1>
	</section>

	<section class="content">
		<div class="col-lg-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Kelembaban Tanah</h3>

				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive p-0">
					<form action="<?php echo base_url('User/tabel');?>" method="post">
						<div class="box-tools">
							<div class="input-group" style="width: 400px;">
								<input type="text" name="keyword" class="form-control pull-right" placeholder="Search" autocomplete="off" autofocus>

								<div class="input-group-btn">
									<input type="submit" class="btn btn-primary" name="submit">
								</div>
							</div>
						</div>
					</form>
					<div class="bootstrap-timepicker">
						<div class="form-group">
							<label>Time picker:</label>

							<div class="input-group">
								<input type="text" class="form-control timepicker">

								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->
					</div>
					<h5>Hasil Pencarian : <?php echo $total_rows;?> Data</h5>
					<table class="table table-head-fixed">
						<thead>
							<tr>
								<th style="width: 10px">NO</th>
								<th>Level Tanah</th>
								<th>Waktu</th>
							</tr>
						</thead>
						<tbody>
							<?php if(empty($isitabel)) : ?>
								<tr>
									<td colspan="4">
										<div class="alert alert-danger" role="alert">
											Data Not Found!
										</div>
									</td>
								</tr>
							<?php endif;?>
							<?php foreach ($isitabel as $isi) :?>
								<tr>
									<td><?php echo ++$start;?></td>
									<td><?php echo $isi['tanah'];?></td>
									<td><?php echo $isi['date'];?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</section>
	</div>