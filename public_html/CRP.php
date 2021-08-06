<?php
  require_once __DIR__ . '/../vendor/autoload.php';
  $app = new App\Solution();
?>
<html>
  <?php include_once './include/head.php'; ?>
  <body>
    <div class="uk-padding uk-text-lead uk-light">
      <div class="uk-text-center">
        <a href="/">
          <img src="/img/logo.svg" style="width: 128px;" />
        </a>
        <div class="uk-container">
          <h2>Help this user<br/>develop their projects</h2>
          <span>Send him <a href="https://cryptoncoin.cash">Crypton</a> =)</span>
        </div>

        <div class="uk-width-xlarge" style="margin: 15px auto;">
          <div>
          <?php
            $address = $app->parseDataForQR();
            echo '<img class="crpQR" src="'.(new \chillerlan\QRCode\QRCode)->render($address).'" alt="QR Code" />';
          ?>
          </div>
          <p><?php
            echo wordwrap($address, 16, '<br/>', true);
          ?></p>
          <button class="uk-button uk-button-default uk-display-block uk-width-medium uk-text-center uk-border-rounded btn-copy" style="margin: auto;" data-clipboard-text="<?php echo $address; ?>" onclick="copied();">copy</button>
        </div>

        <br/>
        <hr/>
        <?php include_once './include/crypton.php'; ?>

      </div>
    </div>
    <?php include_once './include/scripts.php'; ?>
  </body>
</html>
