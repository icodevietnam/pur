<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="<?=DIR;?>admin/~user" class="btn-link">
					<h2>Chi tiết thông tin <?= strtolower(${title}).' có tên quyền là '.$result['0']->name ?></h2>
				</a>
				<hr />
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Tên :</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->name ?>
					</div>
				</div>
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Diễn giải:</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->description ?>
					</div>
				</div>
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Hình ảnh:</strong>
					</div>
					<div class="col-lg-8">
						<? if(strpos($result[0]->icon,'glyphicon') !== false) {?>
							<span class="<?= $result[0]->icon ?>" aria-hidden="true"></span>
						<? } else if(strpos($result[0]->icon,'fa') !== false){ ?>
							<i class="<?= $result[0]->icon ?>" aria-hidden="true"></i>
						<? } else { ?>
							<?= $result[0]->icon ?>
						<? } ?>
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
    Url::templateAdminPath().'js/page/admin-show-role.js',
]);
?>