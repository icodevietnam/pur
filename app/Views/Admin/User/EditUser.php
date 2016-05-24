<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="<?=DIR;?>admin/~user" class="btn-link">
					<h2>Thêm người dùng vào</h2>
				</a>
				<hr />
				<form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name='username' value="<?= $result[0]->username ?>"  placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" value="<?= $result[0]->email ?>" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="fullName" class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='fullName' value="<?= $result[0]->fullname ?>" placeholder="Full Name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3 pull-right">
              <button class="btn btn-primary">Sửa</button>
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
  Url::templateAdminPath().'js/page/admin-create-user.js',
  ]);
?>