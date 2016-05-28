<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-content">
				<a href="<?=DIR;?>admin/~language" class="btn-link">
					<h2>Ngôn ngữ</h2>
				</a>
				<hr />
				<button data-toggle="modal" data-target="#newItem"class="btn btn-sm btn-primary">Tạo mới ngôn ngữ</button>
				<div class="table-responsive">
					<table id="tblItems"
							class="table table-bordered table-hover table-striped">
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
Assets::js([
    Url::templateAdminPath().'js/page/admin-list-language.js',
]);
?>