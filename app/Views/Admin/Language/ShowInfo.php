<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="<?=DIR;?>admin/~user" class="btn-link">
					<h2>Chi tiết thông tin <?= strtolower(${title}).' có ngôn ngữ là '.$result['0']->code ?></h2>
				</a>
				<hr />
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Mã :</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->code ?>
					</div>
				</div>
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Diễn giải tiếng Anh:</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->description_en ?>
					</div>
				</div>
				<div class="row inline-show">
					<div class="col-lg-4">
						<strong>Diễn giải tiếng Việt:</strong>
					</div>
					<div class="col-lg-8">
						<?= $result[0]->description_vi ?>
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
    Url::templateAdminPath().'js/page/admin-show-language.js',
]);
?>