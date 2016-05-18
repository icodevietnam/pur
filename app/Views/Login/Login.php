<form class="form" action="<?=DIR ?>admin/login" method="post" >
    <input type="text" placeholder="Tên đăng nhập" name="username" />
    <input type="password" placeholder="Mật khẩu" name="password" />
    <button type="submit" class='btn-submit'>Đăng nhập</button>
    <br/>
    <span class="error"><?= $error ?></span>
    <!-- <a href="#"> <p> Don't have an account? Register </p></a> -->
</form>