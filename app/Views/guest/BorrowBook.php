<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow</title>
    <base href="<?=base_url() ?>assets/guest/requestForm/">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 id="page-title">Borrow books</h1>
    <br>
    <div class="form-renew-book">
        <form action="/Guest/BorrowRequest/New/" method="post">
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
            <?php if (session('successMsg')) : ?>
                <?php foreach (session('successMsg') as $success) : ?>
                    <div class="alert alert-success fade show" role="alert">
                        <?= $success ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php break; ?>
                <?php endforeach ?>
            <?php endif ?>
            <p><b>Enter the book code you want to borrow(Example: XH-123, GT-123,...)</b></p>
            <input type="text" id="borrow-book-code" onkeypress="return event.which != 32" name="borrow-book-code" value="<?= old("borrow-book-code") ?>">

            <p><b>How long do you want to borrow?</b></p>
            <input type="radio" id="option-one-week" name="time-extend-option" value="1">
            <label for="one-week-option">1 week</label>
            <br>
            <input type="radio" id="option-two-week" name="time-extend-option" value="2">
            <label for="two-week-option">2 weeks</label>
            <br>
            <input type="radio" id="option-three-week" name="time-extend-option" value="3">
            <label for="three-week-option">3 weeks</label>
            <br>
            <input type="radio" id="option-four-week" name="time-extend-option" value="4">
            <label for="four-week-option">4 weeks</label>

            <!-- <p><b>Where did you get the book from?</b></p>
            <input type="radio" id="tusach-book-origin" name="book-origin-option" value="tusach">
            <label for="tusach-book-origin">Bookshelves of BnA USTH</label>
            <br>
            <input type="radio" id="khosach-book-origin" name="book-origin-option" value="khosach">
            <label for="khosach-book-origin">Book storage of BnA USTH</label> -->

            <input name="formType" value="<?= old("formType") ?>" hidden>
            <input name="student-id" value="<?= old("student-id") ?>" hidden>
            <input name="name-field" value="<?= old("name-field") ?>" hidden>
            <input name="phone-num-field" value="<?= old("phone-num-field") ?>" hidden>

            <p><b>Please check out our fanpage on Facebook! &lt;3 <a href="https://www.facebook.com/bna.usthclub">Click here UwU</a></b></p>

            <!-- TODO: The "Back" button take the user back to where they came from
                    be sure to add a functionality for this!-->
            <div class="form-buttons">
                <input type="button" id="button-back" value="Back" onclick="history.back()">
                <input type="submit" id="button-submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>