<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="javascript:createUserForm.currentUrl();" class="btn-link">
					<h2>Thêm người dùng vào</h2>
				</a>
				<hr />
				<form id='createForm' class="form-horizontal">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Tên đăng nhập</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='username' placeholder="Tên đăng nhập">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Mật khẩu</label>
            <div class="col-sm-10">
              <input type="password" class="password form-control" name='password' placeholder="Mật khẩu">
            </div>
          </div>
          <div class="form-group">
            <label for="confirmPassword" class="col-sm-2 control-label">Xác nhận mật khẩu</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name='confirmPassword' placeholder="Xác nhận mật khẩu">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Thư điện tử</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='email' placeholder="Thư điện tử">
            </div>
          </div>
          <div class="form-group">
            <label for="fullName" class="col-sm-2 control-label">Họ và tên</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullName" placeholder="Họ và tên">
            </div>
          </div>
          <div class="form-group">
            <label for="fullName" class="col-sm-2 control-label">Trạng thái</label>
            <div class="col-sm-10">
              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-xs btn-default active">
                  <input checked type="radio" name="active" value="1" autocomplete="off" > Hoạt động
                </label>
                <label class="btn btn-xs btn-default">
                  <input type="radio" name="active" value="0" autocomplete="off"> Không hoạt động
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3 pull-right">
              <button type='button' onclick='createUserForm.submit();' class="btn btn-primary">Thêm vào</button>
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