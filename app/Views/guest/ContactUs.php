<!DOCTYPE html>
<html>
   <head>
      <title>Contact Us</title>
      <?= $cssJS ?>
      <base href="<?=base_url() ?>assets/guest/contactUs/">
      <link rel="stylesheet" href="css/Contactus.css">
      <link rel="icon" type="image/x-icon" href="/res/ico/4.Logo-of-BnA_nen-trong-trang_.ico">
      <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
   </head>
   <body>
      <div class="main">
         <?= $header ?>
         <div class="content-container">
            <div class="breadcrumb-container">
               <ul class="breadcrumb">
                  <li><a href="/">HOME</a></li>
                  <li><a href="/AboutUs">About</a></li>
                  <li >Contact us</li>
               </ul>
            </div>
            <?= $leftMenu ?>
            <div class="container-2">
               <div class="accordion-container">
                  <h1><b>Contact us</b></h1>
               </div>
               <div class="choose-contact-option-container">
                  <p>Choose from a variety of options to get in touch with us.</p>
                  <button><a href="#"> Make a suggestion for our club </a></button>
               </div>
               <div class="phone-address-container">
                  <h1>Phone and Address</h1>
                  <p>Reach the general information at: <a href="#">bna@st.usth.edu.vn</a>
                     <br>
                     <br>
                     <b>Books and Actions-USTH</b>
                     <br>
                     6th floor, Building A21, Vietnam Academy of Science and Technology, 18 Hoang Quoc Viet, Cau Giay, Hanoi
                  </p>
               </div>
               <div class="social-media-container">
                  <h1>Connect on Social Media</h1>
                  <div class="social-media-icon-container">
                     <button style="border:none;">
                     <a href="https://www.facebook.com/bna.usthclub"><img src="res/fb.jpg" style="width: 4vw; height: 7vh;"></a>
                     </button>
                     <button style="border:none;">
                     <a href="https://www.instagram.com/_bnausth_/"><img src="res/insta.jpg" style="width: 4vw; height: 7vh;"></a>
                     </button>
                     <button style="border:none;">
                     <a href="https://m.youtube.com/channel/UCKqlSVN1K3NHhHvFe-rlblw"><img src="res/yt.jpg" style="width: 4vw; height: 7vh;"></a>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?= $footer ?>
   </body>
</html>