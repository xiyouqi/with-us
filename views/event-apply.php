<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-tip-box">活动申请</div>
        <div class="wu-body">
          <form method="post">
            <input name="subject" name="" type="text" placeholder="活动主题">
            <input type="date" placeholder="举办时间">
            <input type="text" placeholder="联系人">
            <input type="text" placeholder="联系电话">
            <input type="text" placeholder="规模人数">
            <button class="btn btn-primary btn-block wu-btn-primary">提交申请</button>
          </form>
        </div>
      </div>

      <div class="wu-card">
        <div class="wu-header">
          <p>场地租用价格</p>
        </div>
        <div class="wu-body">
          <p>
          价格4000元/半天(或晚上4-6个小时)<br>
          6000元/天(6-8个小时)
          </p>
          <img src="static/img/event-apply.png" width="100%">
        </div>
      </div>

    </div>
<?php echo $footer;?>