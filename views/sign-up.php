<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content wu-back">

      <div class="wu-card" style="margin:15px;">
        <div class="wu-tip-box">用户注册</div>
        <div class="wu-body">
          <form method="post">
            <input type="text" name="email" placeholder="邮箱">
            <input type="text" name="name" placeholder="用户名">
            <input type="password" name="password" placeholder="密码">
            <input type="password" name="repassword" placeholder="确认密码">
            <button class="btn btn-primary btn-block wu-btn-primary">免费注册</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>