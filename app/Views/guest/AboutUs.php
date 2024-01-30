<!DOCTYPE html>
<html>
   <head>
      <title>About Us</title>
      <?= $cssJS ?>
      <base href="<?=base_url() ?>assets/guest/aboutUs/">
      <link rel="stylesheet" href="css/about.css">
      <link rel="icon" type="image/x-icon" href="/res/4.Logo-of-BnA_nen-trong-trang_.ico">
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
                  <li >About us</li>
               </ul>
            </div>

            <?= $leftMenu ?>

            <div class="pic">
               <img src="res/images.jpg">
            </div>

            <div style="display:flex;" class="accordion-container">
               <h1 style="margin-bottom:35px;margin-left:25vh"><b>About us</b></h1>
               <!-- <u id="paragraph-change-sub" style="padding:35px 25px; font-size:40px; color:rgb(49, 82, 43); margin-left: 140px;" onclick="changeSub()">Eng Sub</u> -->
            </div>
            <div style="padding: 70px 70px;" class="para">

               <p id="paragraph-about-us" style="margin-left:20vh; font-size: 30px; ">
               The USTH Books and Actions Club was born on 31/07/2019 with the aim of building reading habits and spirit of action for young people in general and USTH students in particular. 
               By creating a student book space, organizing activities about books, campaigns, events that have an impact on the community, we hope to be able to contribute a small part of the 
               effort to spread the reading culture as well as the spirit of responsibility: 'Say it - Do it' widely in the community.
               </p>

               <div style="margin-left:20vh; font-size: 30px; " class="para2">
                   <p>Who we are</p>
                   <h2>Welcome to USTH's Book Club! Join us to explore books, engage in discussions, and attend author talks. Enhance knowledge, make friends, and ignite the love for books at USTH!</h1>
                   <b>Locaion</b>
                     <li>⏰️Time: 8am-5pm, 27-28/10/2022</li>
                     <li>🏤 Venue: 6th floor, Building A21, Vietnam Academy of Science and Technology, 18 Hoang Quoc Viet, Cau Giay, Hanoi</li>
                     <li>🙋🏻‍♂️Target audience: Everyone residing in Hanoi city.</li>                 
                </div>
            
            </div>
         </div>
      </div>
      </div>
      <?= $footer ?>
   </body>
   <!-- <script src="js/aboutUsEngSub.js"></script> -->
</html>