<?php
  require_once __DIR__ . '/../vendor/autoload.php';
  $app = new App\Solution();
?>
<html>
  <?php include_once './include/head.php'; ?>
  <body>
    <div class="uk-padding uk-text-lead uk-light">
      <div class="uk-text-center">
        <img src="/img/logo.svg" style="width: 128px; height: 128px;" />
        <div class="uk-container">
          <h2>Create your donation link<br/>in Crypton</h2>
        </div>

        <div class="uk-width-medium" style="margin: 15px auto;">
          <form class="uk-form-large uk-padding-small" style="height: initial;" method="GET" action="GET">
            <div class="uk-margin">
              <input class="uk-input uk-display-block" type="text" placeholder="Crypton address..." name="address" style="border-radius: 5px 5px 0 0;" />
              <button class="uk-button uk-button-primary uk-display-block uk-width-1-1 uk-text-center" style="border-radius: 0 0 5px 5px;">Create</button>
            </div>
            <div class="uk-margin">
              <h4>optional</h4>
              <input class="uk-input uk-display-block" type="text" placeholder="alias" name="alias" style="border-radius: 5px 5px 0 0;" />
              <small>beautiful name for an address</small>
            </div>
          </form>
        </div>

        <hr/>
        <?php include_once './include/crypton.php'; ?>

      </div>
    </div>
    <?php include_once './include/scripts.php'; ?>
  </body>
</html>
