<div class="row">
  <div class="col-lg-12">
    <div class="ibox">
      <div class="ibox-content">
        <div class="alert"></div>
        <a href="<?=DIR;?>admin/~role" class="btn-link">
          <h2>Quyền</h2>
        </a>
        <hr />
        <a href="<?=DIR?>admin/~create?token=<?= Session::get('token') ?>&object=roles" data-toggle="modal" class="btn btn-sm btn-primary">Tạo mới quyền</a>
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
    Url::templateAdminPath().'js/page/admin-list-role.js',
]);
?>