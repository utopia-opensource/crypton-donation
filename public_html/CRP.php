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

        <h4 class="uk-margin-small-top">Have not yet installed a wallet?</h4>
        <p class="uk-text-small">Let's do it, it won't take long.<br/>Install the Utopia client with built-in Crypton wallet!</p>
        <center>
            <div class="uk-width-large">
                <ul class="uk-list uk-text-left">
                    <li>
                        <span>1. Click on your operating system icon:</span>
                        <div class="uk-text-center">
                            <a href="https://update.u.is/downloads/macos/utopia-latest.dmg" class="icon-link">
                                <img src="/img/icons/mac-client.png" width="48" />
                            </a>
                            <a href="https://u.is/en/download.html#win" target="_blank" class="icon-link">
                                <img src="/img/icons/windows-client.png" width="48" />
                            </a>
                            <a href="https://u.is/en/download.html#linux" target="_blank" class="icon-link">
                              <img src="/img/icons/linux-client.png" width="48" />
                            </a>
                        </div>
                    </li>
                    <li>2. Install the app</li>
                    <li>3. Create your account, log in</li>
                </ul>
                <p class="uk-text-center uk-text-default">
                    <span>Done! You are awesome!</span>
                    <span uk-icon="icon: happy"></span>
                </p>
            </div>
        </center>

        <hr/>

        <center>
          <h4 class="uk-margin-small-top">Don’t have access to your PC now?</h4>
          <div class="uk-margin-bottom">
              <span>Not a problem.</span><br/>
              <span>Save link to download later</span>
          </div>

          <script src="https://yastatic.net/share2/share.js"></script>
          <div class="ya-share2" data-curtain data-size="l" data-services="facebook,telegram,twitter,whatsapp"></div>
        </center>

        <hr/>

        <?php include_once './include/crypton.php'; ?>

      </div>
    </div>
    <?php include_once './include/scripts.php'; ?>
  </body>
</html>
