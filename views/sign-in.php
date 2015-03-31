<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-tip-box">用户登录</div>
        <div class="wu-body">
          <form method="post">
            <input type="text" name="email" placeholder="邮箱">
            <input type="password" name="password" placeholder="密码">
            <a data-ignore="push" class="btn btn-block btn-link" style="text-align:right;" href="reset-password">忘记密码</a>
            <button class="btn btn-primary btn-block wu-btn-primary">会员登录</button>
            <a data-ignore="push" class="btn btn-block" href="sign-up">会员注册</a>
          </form>
        </div>
      </div>

    </div>
<?php echo $footer;?>