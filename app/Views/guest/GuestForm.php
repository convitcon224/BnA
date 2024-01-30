<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Form</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url() ?>assets/guest/form/css/style.css">
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
</style>
<body>
        <h1 id="page-title">Application for borrowing books, returning books, and renewing book loans</h1>
        <br>
        <div class="welcome-section">
            <p>📌List of current books: <a href="https://docs.google.com/spreadsheets/d/1sHOyFY2qyqqlahASIeGNWbCXVIuyUjKMfyvS2Xbs--o/edit?usp=sharing">Click Here</a></p>
            <p>📌How to borrow: <a href="https://shorturl.at/agw27">Click Here</a></p>
            <p>🔗Book borrowing form: <a href="https://forms.gle/MFXh3VS426kRPRMJ8">Placeholder link, replace with real link later</a></p>
            <p>
            -------------------------------------------------------<br>
            For more information please contact:<br>
            <br>
            Hotline: 0989675548 (Phó chủ nhiệm Đinh Vũ Anh)<br>
            SĐT: 0353873494 (Phó Chủ nhiệm Lê Việt Ân)<br>
            Email: bna@st.usth.edu.vn<br>
            Facebook: https://www.facebook.com/bna.usthclub<br>
            <br>
            Phạm Ngọc Lâm (Trưởng ban VHĐ)<br>
            SĐT: 0923543588<br>
            Email: phamngoclam1310@gmail.com<br>
            Facebook: https://www.facebook.com/ngoclam.pham1310/<br>
            </p>
        </div>
        <!-- TODO: Add functionality to this form-->
        <div class="form-application">
            <?php if (session('errorsMsg')) : ?>
                <?php foreach (session('errorsMsg') as $error) : ?>
                    <div class="alert alert-danger fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php break; ?>
                <?php endforeach ?>
            <?php endif ?>
            <form action="/Guest/Request/New/" method="post">
                <label for="student-id" style="margin-bottom:20px; display:block; font-weight:bold">Student ID: </label>
                <input type="text" onkeypress="return event.which != 32" id="student-id" name="student-id" size="30" value="<?= old("student-id") ?>" required>

                <label for="name-field" style="margin-bottom:20px; display:block; font-weight:bold">Fullname: </label>
                <input type="text" id="name-field" name="name-field" value="<?= old("name-field") ?>" required>

                <label for="phone-num-field" style="margin-bottom:20px; display:block; font-weight:bold">Phone number: </label>
                <input class="number-to-text" type="number" onkeypress="return event.which != 32" id="phone-num-field" name="phone-num-field" value="<?= old("phone-num-field") ?>" required>

                <input name="formType" value="<?= $formType ?>" hidden>
                <!--TODO: Add functionality to these buttons -->
                <div class="form-buttons">
                    <input type="button" id="button-back" value="Back" onclick="location.href='/'">
                    <input type="submit" id="button-next" value="Next">
                </div>
            </form>
        </div>
    </body>
</html>
