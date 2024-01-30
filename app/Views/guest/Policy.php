<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Policy</title>
      <?= $cssJS ?>
      <base href="<?=base_url() ?>assets/guest/policy/">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="main">
         <?= $header ?>
         <div class="content-container">
            <div class="breadcrumb-container">
               <ul class="breadcrumb">
                  <li><a href="/">HOME</a></li>
                  <li><a href="/AboutUs">About</a></li>
                  <li>Policy</li>
               </ul>
            </div>
            <?= $leftMenu ?>
            <div class="accordion-container">
               <div class="pname">
                  <b style="font-size: 40px; ">BnA Policy</b> <br>
                  <div class="doanvan">
                     <h2><i>HOW TO BORROW BOOKS:</i></h2>
                     <h2><u>For Books on Cabinets</u></h2>
                     <div class="step">Step 1:</div>
                     <p>Please choose your desired book and fill in the information in the green QR form according to the instructions.</p>
                     <div class="step">Step 2:</div>
                     <p>Carefully check your email, the books you borrowed, and enjoy them.</p>
                     <div class="step">Step 3:</div>
                     <p>Return the book to the locker on time. BnA USTH will contact you, and a reminder email to return the book will be sent the week before your loan expires.</p>
                  </div>
                  <div class="container2">
                     <h2><u>For Books in Our Stock</u></h2>
                     <div class="step">Step 1:</div>
                     <p>Please choose your desired book and fill in the information in the green QR form according to the instructions.</p>
                     <div class="step">Step 2:</div>
                     <p>Please check your email carefully, and please come and receive the book at the cabinet on Tuesday of the following week.</p>
                     <div class="step">Step 3:</div>
                     <p>Return the books to the locker on time. BnA USTH will contact you, and a reminder email to return the books will be sent the week before the expiration date.</p>
                     <h2><u>How to Return Books</u></h2>
                     <div class="step">Step 1:</div>
                     <p>Scan the QR and fill in the information of the book you return.</p>
                     <div class="step">Step 2:</div>
                     <p>Gently put the books into the baskets placed on the left side of the bookcase.</p>
                     <div class="step">Step 3:</div>
                     <p>You will receive a confirmation email later. Please check your email and books carefully before leaving.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?= $footer ?>
   </body>
</html>