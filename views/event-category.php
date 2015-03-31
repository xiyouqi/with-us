<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-body wu-event-item">
          <a data-ignore="push" href="event-next">
            UPCOMING EVENTS <br> 即将举行的活动
          </a>
          <img src="static/img/event-next.jpg" width="100%">
        </div>
        <div class="wu-body wu-event-item">
          <a data-ignore="push" href="event-pre">
            EVENTS REVIEW <br> 历届活动回顾
          </a>
          <img src="static/img/event-pre.jpg" width="100%">
        </div>
        <div class="wu-body">
          <a data-ignore="push" class="btn btn-primary btn-block wu-btn-primary" href="event-apply">活动申请</a>
        </div>
      </div>

    </div>
<?php echo $footer;?>