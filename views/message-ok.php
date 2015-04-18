<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-tip-box blue">成功消息</div>
        <div class="wu-body">
          <form>
            <p style="font-size:18px; margin:50px 15px;"><?php echo $message;?></p>
          </form>
          <p>
            <a data-ignore="push" class="btn btn-primary btn-block wu-btn-primary" href="<?php echo $url ? $url : '/'?>">返回主页</a>
          </p>
        </div>
      </div>

    </div>
    <?php if($url && $time){ ?>
    <script>setTimeout(function(){window.location = '<?php echo $url;?>'},<?php echo $time;?> * 1000);</script>
    <?php } ?>
<?php echo $footer;?>