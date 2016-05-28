<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="<?=DIR;?>admin/~user" class="btn-link">
					<h2>Chi tiết thông tin <?= strtolower(${title}).' có tên đăng nhập là '.$result['0']->username ?></h2>
				</a>
				<hr />
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Tên đăng nhập:</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->username ?>
					</div>
				</div>
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Tên đầy đủ:</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->fullname ?>
					</div>
				</div>
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Thư điện tử:</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->email ?>
					</div>
				</div>
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Hoạt động:</strong>
					</div>
					<div class="col-lg-8">
						<? if($result[0]->active=='1'){
								echo "Đang hoạt động";
							} else {
								echo "Chưa kích hoạt";
							}?>
					</div>
				</div>
				<div class="row inline-show">
					<button onclick='History.back();' class="btn btn-sm btn-default">Về trang trước</button>
				</div>
			</div>
		</div>
	</div>
</div>
<p class="hidden object">
	<?= $obj ?>
</p>

<?php
Assets::js([
    Url::templateAdminPath().'js/page/admin-show-user.js',
]);
?>