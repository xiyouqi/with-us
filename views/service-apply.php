<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-tip-box">创意服务</div>
        <div class="wu-body">
          <form method="post">
            <input type="text" name="service_name" placeholder="服务名称">
            <input type="text" placeholder="服务时间">
            <input type="text" placeholder="联系人">
            <input type="text" placeholder="联系电话">
            <input type="text" placeholder="邮箱">
            <button class="btn btn-primary btn-block wu-btn-primary">提交申请</button>
          </form>
        </div>
      </div>
    </div>
<?php echo $footer;?>