<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="javascript:createUserForm.currentUrl();" class="btn-link">
					<h2>Sửa thông tin người dùng</h2>
				</a>
				<hr />
				<form id='editForm' class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
            <div class="col-sm-10">
              <input type="text" class="hide form-control" name='id' value="<?= $result[0]->id ?>" >
              <input type="text" class="form-control" readonly name='username' value="<?= $result[0]->username ?>"  placeholder="Tên đăng nhập">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Thư điện tử</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='email' value="<?= $result[0]->email ?>" placeholder="Thư điện tử">
            </div>
          </div>
          <div class="form-group">
            <label for="fullName" class="col-sm-2 control-label">Họ và tên</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='fullName' value="<?= $result[0]->fullname ?>" placeholder="Tên đầy đủ">
            </div>
          </div>
          <div class="form-group">
            <label for="fullName" class="col-sm-2 control-label">Trạng thái</label>
            <div class="col-sm-10">
              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-xs btn-default <?= $result[0]->active==1?'active':'' ?>">
                  <input <?= $result[0]->active==1?'checked':'' ?> type="radio" name="active" value="1" autocomplete="off" > Hoạt động
                </label>
                <label class="btn btn-xs btn-default <?= $result[0]->active==0?'active':'' ?>">
                  <input <?= $result[0]->active==0?'checked':'' ?> type="radio" name="active" value="0" autocomplete="off"> Không hoạt động
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3 pull-right">
              <button type="button" onclick="updateUserForm.submit()" class="btn btn-primary">Sửa</button>
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
  Url::templateAdminPath().'js/page/admin-update-user.js',
  ]);
?>