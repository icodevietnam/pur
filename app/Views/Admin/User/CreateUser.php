<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="<?=DIR;?>admin/~user" class="btn-link">
					<h2>Thêm người dùng vào</h2>
				</a>
				<hr />
				<form id='createForm' class="form-horizontal">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='username' placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name='password' placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="confirmPassword" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name='confirmPassword' placeholder="Confirm Password">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='Email' placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="fullName" class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullName" placeholder="Full Name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3 pull-right">
              <button type='<button' class="btn btn-primary">Thêm vào</button>
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