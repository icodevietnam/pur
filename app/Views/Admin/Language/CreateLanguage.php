<div class="row">
	<div class="col-lg-7">
		<div class="ibox">
			<div class="ibox-content">
				<div class="alert"></div>
				<a href="javascript:createRoleForm.currentUrl();" class="btn-link">
					<h2>Thêm ngôn ngữ</h2>
				</a>
				<hr />
				<form id='createForm' class="form-horizontal">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Mã ngôn ngữ</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='code' placeholder="Mã ngôn ngữ">
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Diễn giải English</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='desc_en' placeholder="Diễn giải English">
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Diễn giải Việt</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='desc_vi' placeholder="Diễn giải Việt">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3 pull-right">
              <button type='button' onclick='createLanguageForm.submit();' class="btn btn-primary">Thêm vào</button>
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
    Url::templateAdminPath().'js/page/admin-create-language.js',
  ]);
?>