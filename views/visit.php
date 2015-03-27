<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content wu-back">

      <div class="wu-card" style="margin:15px;">
        <div class="wu-tip-box">预约参观</div>
        <div class="wu-body">
          <form method="post">
            <input type="text" name="visit_time" placeholder="参观时间">
            <input type="number" name="visit_num" placeholder="参观人数">
            <input type="text" name="industry" placeholder="所属行业">
            <input type="text" name="contact" placeholder="联系人">
            <input type="text" name="contact_mobile" placeholder="联系电话">
            <input type="text" name="contact_email" placeholder="邮箱">
             <button class="btn btn-primary btn-block wu-btn-primary">预约申请</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>