<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-tip-box red">错误消息</div>
        <div class="wu-body">
          <form>
            <p style="font-size:18px; margin:50px 15px;"><?php echo $message;?></p>
          </form>
          <p>
            <button class="btn btn-primary btn-block wu-btn-primary" onclick="javascript:history.go(-1);">返回上一页</button>
          </p>
        </div>
      </div>

    </div>
<?php echo $footer;?>