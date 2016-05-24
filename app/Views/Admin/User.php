<div class="row">
  <div class="col-lg-12">
    <div class="ibox">
      <div class="ibox-content">
        <code class="crud-message"></code>
        <a href="<?=DIR;?>admin/~language" class="btn-link">
          <h2>Người dùng</h2>
        </a>
        <hr />
        <a href="<?=DIR?>admin/~create?token=<?= Session::get('token') ?>&object=users" data-toggle="modal" class="btn btn-sm btn-primary">Tạo mới người dùng</a>
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
    Url::templateAdminPath().'js/page/admin-list-user.js',
]);
?>