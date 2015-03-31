<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-tip-box blue">会议室预约</div>
        <div class="wu-body">
          <form method="post">
            <input type="date" placeholder="使用时间">
            <input type="text" placeholder="会议室编号">
            <input type="text" placeholder="联系人">
            <input type="text" placeholder="联系电话">
            <input type="text" placeholder="规模人数">
            <button class="btn btn-primary btn-block wu-btn-primary">提交申请</button>
          </form>
        </div>
      </div>

      <div class="wu-card">
        <div class="wu-header">
          <p>会议室租用价格</p>
        </div>
        <div class="wu-body">
          <p>
          大会议室 <br>
          200RMB/hour <br>
          800RMB/day
          </p>
          <p>
            使用大会议室请找前台提前1-2 天交钱预订呦。
            如果遇到特殊情况不再需要使用会议室可以找前台协商退费，
            但是请不要爽约次数过多消耗掉大家刚刚建立的信任感，
            不然我们会无情的优先考虑别家的预订。
          </p>
          <img src="static/img/room.png" width="100%">
          <p>
          中、小会议室 <br>
          Free <br>
          无需预订
          </p>
          <p>
            但是，据说2个小时的会议时间正合适，
            超过2小时以外的会议时间大多是无建设性的。
            请合理安排会议时间，不要把会议室也变成了办公桌。
          </p>
          <img src="static/img/room-free.png" width="100%">
          <p>
            注：会议室白板内容请随会议结束一并拍照带走，我们不做保留。
            使用完会议室请将自己的东西拿出会议室，并关闭一切用电设备。
          </p>
          <p>
            在您提交之后，我们的工作人员会第一时间联系您。
          </p>
        </div>
      </div>

    </div>
<?php echo $footer;?>