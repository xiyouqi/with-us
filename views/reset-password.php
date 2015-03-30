<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content wu-back">

      <div class="wu-card" style="margin:15px;">
        <div class="wu-tip-box">找回密码</div>
        <div class="wu-body">
          <form method="post">
            <input type="text" name="email" placeholder="邮箱">
            <input type="password" name="password" placeholder="验证码">
            <input type="password" name="password" placeholder="新密码">
            <input type="password" name="password" placeholder="确认密码">
            <a data-transition="slide-in" class="btn btn-block btn-link" href="">向邮箱发送验证码</a>
            <button class="btn btn-primary btn-block wu-btn-primary">修改密码</button>
            <a data-transition="slide-in" class="btn btn-block" href="sign-in">会员登录</a>
          </form>
        </div>
      </div>

    </div>
  </body>
</html>