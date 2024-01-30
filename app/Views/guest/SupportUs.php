<!DOCTYPE html>
<html>
<head>
    <title>Support Us</title>
    <?= $cssJS ?>
    <base href="<?=base_url() ?>assets/guest/supportUs/">
    <link rel="stylesheet" href="css/support.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<style>
    .fot {
    width: 100%;
    display: grid;
  }
</style>
<body>
    <?= $header ?>
    <div class="main">
        <div class="content-container">
            <div class="breadcrumb-container">
                <ul class="breadcrumb">
                    <li><a href="/">HOME</a></li>
                    <li><a href="/AboutUs">About</a></li>
                    <li>Support us</li>
                </ul>
            </div>

            <?= $leftMenu ?>

            <div class="accordion-container">
                <h1 style="margin-bottom:35px"><b>Support us</b></h1>
                <img style="height: 39vh; width: 50vw;" class="img1" src="img/sup.jpg">
                
                <div style="margin-top: 20px" class="follow">
                    <p>Follow us on social networks</p>
                    <a href="https://www.facebook.com/bna.usthclub">
                    <div class="icon">
                    <box-icon type='logo' name='facebook-circle'></box-icon>
                    </div>
                    </a>    

                    <div style="margin-top: 20px" class="Donate">
                    <p>Donate for us</p>
                    <h1>Account: 1037144916(VCB)</h1>  
                    <h1>Name Account: Nguyễn Đức Trung</h1>  
                    <p>QR Code:</p>
                    <img style="height: 20vh; width: 20vh; " class="img1" src="img/stk.jpg">

                </div>
            </div>
        </div>
    </div>
    <div class="fot">
        <?= $footer ?>
    </div>
    <!-- <script src="borrow_request.js"></script> -->
</body>
</html>