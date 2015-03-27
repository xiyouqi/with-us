<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content wu-back">

      <div class="wu-card" style="margin:15px;">
        <div class="wu-tip-box">会员申请</div>
        <div class="wu-body">
          <form method="post">
            <select name="type" placeholder="会员类型">
              <option>Smart 会员</option>
              <option>WithUs 会员</option>
            </select>
            <input type="text" name="amount" placeholder="充值金额">
            <input type="text" name="member_no" placeholder="购买数量">
            <input type="text" name="contact" placeholder="联系人">
            <input type="text" name="contact_mobile" placeholder="联系电话">
            <input type="text" name="contact_email" placeholder="邮箱">
            <button class="btn btn-primary btn-block wu-btn-primary">提交申请</button>
          </form>
        </div>
      </div>

    </div>
  </body>
</html>