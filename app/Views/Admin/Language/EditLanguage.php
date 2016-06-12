<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="javascript:createUserForm.currentUrl();" class="btn-link">
					<h2>Sửa thông tin ngôn ngữ</h2>
				</a>
				<hr />
				<form id='editForm' class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Mã</label>
            <div class="col-sm-10">
              <input type="text" class="hide form-control" name='id' value="<?= $result[0]->id ?>" >
              <input type="text" class="form-control" name='code' value="<?= $result[0]->code ?>"  placeholder="Tên">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Diễn giải tiếng Anh</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='desc_en' value="<?= $result[0]->description_en ?>" placeholder="Diễn giải">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Diễn giải tiếng Việt</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='desc_vi' value="<?= $result[0]->description_vi ?>" placeholder="Diễn giải">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3 pull-right">
              <button type="button" onclick="updateLanguageForm.submit()" class="btn btn-primary">Sửa</button>
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
  Url::templateAdminPath().'js/page/admin-update-language.js',
  ]);
?>