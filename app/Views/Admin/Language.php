<div class="row">
  <div class="col-lg-12">
    <div class="ibox">
      <div class="ibox-content">
        <div class="alert"></div>
        <a href="<?=DIR;?>admin/~user" class="btn-link">
          <h2>Cài đặt thông tin ngôn ngữ</h2>
        </a>
        <hr />
        <a href="<?=DIR?>admin/~create?token=<?= Session::get('token') ?>&object=languages" data-toggle="modal" class="btn btn-sm btn-primary">Tạo mới ngôn ngữ</a>
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