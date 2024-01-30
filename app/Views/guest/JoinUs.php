<!DOCTYPE html>
<html>
   <head>
      <title>About Us</title>
      <?= $cssJS ?>
      <base href="<?=base_url() ?>assets/guest/joinUs/">
      <link rel="stylesheet" href="css/JoinUs.css"> 
   </head>
   <body>
      <?= $header ?>
      <div class="main">         
         <div class="content-container">
            <div class="breadcrumb-container">
               <ul class="breadcrumb">
                  <li><a href="/">HOME</a></li>
                  <li><a href="/AboutUs">About</a></li>
                  <li >About us</li>
               </ul>
            </div>

            <?= $leftMenu ?>

            <div style="display:flex;" class="accordion-container">
               <h1 style="margin-bottom:35px;margin-left:25vh"><b>Join us</b></h1>
               <!-- <u id="paragraph-change-sub" style="padding:35px 25px; font-size:40px; color:rgb(49, 82, 43); margin-left: 140px;" onclick="changeSub()">Eng Sub</u> -->
            </div>
            <div style="padding: 70px 70px;" class="para">

               <p id="paragraph-join-us" style="margin-left:20vh; font-size: 30px; ">
               Currently we are not recruiting any more<br>
               Follow us to update the latest information
               </p>
            </div>
         </div>
         <img src="img/bnaContact.jpg">
      </div>
      <?= $footer ?>
   </body>

</html>