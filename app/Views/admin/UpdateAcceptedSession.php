<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update session</title>
    <base href="<?=base_url() ?>assets/admin/addBook/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <?= $cssJS ?>
</head>
<body>
    <?= $sideNav ?>
    <div class="content">
        <?= $topNav ?>
        <div class="form-container">
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
            <form action="/Admin/Session/Accepted/Confirm" method="post">
                <input name="sessionID" value="<?= $detail['sessionID'] ?>" hidden>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Borrower ID</label>
                        <input value="<?= $detail["student_id"] ?>" type="text" name="student_id" class="form-control" disabled="disabled">
                    </div>
                    <div class="form-group col-md-10">
                        <label>Borrower's name</label>
                        <input value="<?= $detail["user_name"] ?>" type="text" name="user_name" class="form-control" disabled="disabled">
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input value="<?= $detail["user_phone"] ?>" type="text" name="user_phone" class="form-control" disabled="disabled">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label>Book ID</label>
                        <input value="<?= $detail["book_id"] ?>" type="text" name="book_id" class="form-control" disabled="disabled">
                    </div>
                    <div class="form-group col-md-11">
                        <label>Title</label>
                        <input value="<?= $detail["title"] ?>" type="text" name="title" class="form-control" disabled="disabled">
                    </div>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input value="<?= $detail["author"] ?>" type="text" name="author" class="form-control" disabled="disabled">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label>Condition</label>
                        <input value="<?= $detail["book_condition"] ?>" type="text" name="book_condition" class="form-control" disabled="disabled">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Duration</label>
                        <input value="<?php if ($detail["holding_time"]==1){echo($detail["holding_time"]." week");} else{echo($detail["holding_time"]." weeks") ;} ?>" type="text" name="type" class="form-control" disabled="disabled">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location</label>
                        <input value="<?= $detail["location"] ?>" type="text" name="type" class="form-control" disabled="disabled">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Manager ID</label>
                        <!-- Manager ID -->
                        <input value="0" type="text" name="manager_id" class="form-control" readonly="readonly">
                    </div>
                    <div class="form-group col-md-9">
                        <label>Deposit</label>
                        <input value="<?= old("deposit") ?>" type="number" step="0.0001" name="deposit" placeholder="70000" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>