<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-header">
          <p>OUR EVENTS</p>
          <p>我们的活动</p>
        </div>
        <div class="wu-body">
          <?php foreach ($events as $event) {?>
          <img src="<?php echo $event['event_background']?>" width="100%">
          <?php } ?>
        </div>
        <div class="wu-body">
          <a  data-ignore="push" class="btn btn-primary btn-outlined btn-block wu-btn-border" href="event-next">更多活动</a>
        </div>
        <div class="wu-body">
          <p>
            <a data-ignore="push" class="btn btn-primary btn-block wu-btn-primary" href="event-apply">活动申请</a>
          </p>        
        </div>
      </div>

    </div>
<?php echo $footer;?>