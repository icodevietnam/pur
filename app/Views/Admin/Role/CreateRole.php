<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="javascript:createRoleForm.currentUrl();" class="btn-link">
					<h2>Thêm quyền vào</h2>
				</a>
				<hr />
				<form id='createForm' class="form-horizontal">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Tên</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='name' placeholder="Tên">
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Diễn giải</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='description' placeholder="Diễn giải">
            </div>
          </div>
          <div class="form-group">
            <label for="icon" class="col-sm-2 control-label">Hình ảnh</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='icon' placeholder="Hình ảnh">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3 pull-right">
              <button type='button' onclick='createRoleForm.submit();' class="btn btn-primary">Thêm vào</button>
              <button type="reset" class="btn btn-default">Xóa</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<p class="hidden object">
	<?= $obj ?>
</p>

<?php
Assets::js([
    Url::templateAdminPath().'js/page/admin-create-role.js',
  ]);
?>