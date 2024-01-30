<!DOCTYPE html>
<html>
   <head>
      <title>Borrowing</title>
      <?= $cssJS ?>
      <base href="<?=base_url() ?>assets/guest/borrowing/">
      <link rel="stylesheet" href="css/borrow.css">
   </head>
   <style>
        input.number-to-text::-webkit-outer-spin-button,
        input.number-to-text::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number].number-to-text {
            -moz-appearance: textfield;
        }

        #student-id, #phone-num-field{
            font-size: 20px;
            margin-bottom: 20px;
        }


        .form-buttons{
            text-align: center;
            margin-top: 20px;
        }

        #button-back, #button-next{
            margin-right:20px;
            margin-left:20px;
            width: 15%;
            height: 40px;
            font-size: 20px;
        }
    </style>
   <body>
      <div class="main">
         <?= $header ?>
      </div>
      <div class="content-container">
         <div class="breadcrumb-container">
            <ul class="breadcrumb">
               <li><a href="/">HOME</a></li>
               <li><a href="/Browse/Category">Browse</a></li>
               <li>Borrowing</li>
            </ul>
         </div>
         <?= $leftMenu ?>
         <div class="accordion-container">
            <h1 style="margin-bottom:35px">Borrowing</h1>
            <form action="/Browse/CheckBorrowingForm" method="post">
                <label for="student-id" style="margin-bottom:20px; display:block; font-weight:bold">Student ID: </label>
                <input type="text" onkeypress="return event.which != 32" id="student-id" name="student-id" size="30" value="<?= old("student-id") ?>" required>

                <label for="phone-num-field" style="margin-bottom:20px; display:block; font-weight:bold">Phone number: </label>
                <input class="number-to-text" type="number" onkeypress="return event.which != 32" id="phone-num-field" name="phone-num-field" value="<?= old("phone-num-field") ?>" required>

                <!--TODO: Add functionality to these buttons -->
                <div class="form-buttons">
                    <input type="button" id="button-back" value="Back" onclick="location.href='/'">
                    <input type="submit" id="button-next" value="Next">
                </div>
            </form>
         </div>
      </div>
      <?= $footer ?>
   </body>
</html>