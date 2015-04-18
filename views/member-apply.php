<?php echo $header;?>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="wu-back">

      <div class="wu-card">
        <div class="wu-tip-box">会员申请</div>
        <div class="wu-body">
          <form method="post">
            <select name="type" placeholder="会员类型">
              <option <?php echo ($_GET['type']==2) ? 'selected="selected"' : ''?> >Smart 钻石卡</option>
              <option <?php echo ($_GET['type']==1) ? 'selected="selected"' : ''?> >WithUs 金卡</option>
              <option <?php echo ($_GET['type']==0) ? 'selected="selected"' : ''?> >WithUs 银卡</option>
            </select>
            <input type="text" name="amount" placeholder="充值金额" readonly="true">
            <input type="text" name="member_no" placeholder="购买数量">
            <input type="text" name="contact" placeholder="联系人">
            <input type="text" name="contact_mobile" placeholder="联系电话">
            <input type="text" name="contact_email" placeholder="邮箱">
            <button class="btn btn-primary btn-block wu-btn-primary">提交申请</button>
          </form>
        </div>
      </div>

    </div>
    <script type="text/javascript">
        var amts = {
          'Smart 钻石卡':6000,
          'WithUs 金卡':4000,
          'WithUs 银卡':3600
        }; 
        var selectType = document.querySelector('select[name=type]');
        var amtInput =  document.querySelector('input[name=amount]');
        selectType.addEventListener('change', function(e){
          amtInput.value = amts[selectType.value];
        });
        amtInput.value = amts[selectType.value];
      </script>
<?php echo $footer;?>