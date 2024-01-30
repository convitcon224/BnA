<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renew</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <base href="<?=base_url() ?>assets/guest/requestForm/">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 id="page-title">Renew book loans</h1>
    <br>
    <div class="form-renew-book">
        <form action="/Guest/RenewRequest/New/" method="post">
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
            <p><b>Enter the book codes you wish to renew</b></p>
            <input type="text" onkeypress="return event.which != 32" id="renew-book-code" name="renew-book-code" value="<?= $bookID ?>">

            <p><b>How long do you want to extend the loan?</b></p>
            <input type="radio" id="option-one-week" name="time-extend-option" value="1">
            <label for="one-week-option">1 week</label>
            <br>
            <input type="radio" id="option-two-week" name="time-extend-option" value="2">
            <label for="two-week-option">2 weeks</label>

            <input name="formType" value="<?= old("formType") ?>" hidden>
            <input name="student-id" value="<?= old("student-id") ?>" hidden>
            <input name="name-field" value="<?= old("name-field") ?>" hidden>
            <input name="phone-num-field" value="<?= old("phone-num-field") ?>" hidden>

            <!-- TODO: The "Back" button take the user back to where they came from
                    be sure to add a functionality for this!-->
            <div class="form-buttons">
                <input type="button" id="button-back" value="Back" onclick=history.back()>
                <input type="submit" id="button-submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>