<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title><?= $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CDN Link -->
    <link href='<?= base_url(); ?>assets/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/uikit/css/uikit.min.css"/>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/animate/css/animate.min.css"/> 
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style_login.css"/> 

  </head>
<body>

    <div class="uk-container uk-flex uk-flex-center uk-flex-middle">
        
        <form class="form-login uk-box-shadow-large" method="post" action="<?= base_url(); ?>auth/login">
            <div class="uk-text-center">
                <h2 class="uk-text-lead animate__animated animate__fadeInDown">SISTEM INFORMASI</br><span class="text-green uk-text-bolder">LANGGANAN AIR</span></h2>
                <hr class="uk-divider-icon">
            </div>
            <div class="uk-margin">
                <center><label for="username">USERNAME :</label></center>
                <div class="uk-inline uk-margin-small-top">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input id="username" class="uk-input uk-form-small uk-box-shadow-small" name="username" type="text" required autofocus placeholder="Input username">
                </div>
            </div>
            <div class="uk-margin">
                <center><label for="password">PASSWORD :</label></center>
                <div class="uk-inline uk-margin-small-top">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password" class="uk-input uk-form-small uk-box-shadow-small" name="password" type="password" required autofocus placeholder="Input password">
                </div>
            </div>
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-small uk-input uk-form-small uk-margin-top ubl">LOG IN</button>
            </div>
        </form>
    </div>
    

  <!-- UIkit JS -->
  <script src="<?= base_url(); ?>assets/uikit/js/uikit.min.js"></script>
  <script src="<?= base_url(); ?>assets/uikit/js/uikit-icons.min.js"></script>

</body>
</html>
