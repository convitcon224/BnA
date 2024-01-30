<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
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
            <form action="/Admin/Book/Update" method="post">
                <input name="id" value="<?= $book['id'] ?>" hidden>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>ID</label>
                        <input value="<?= $book["bookID"] ?>" type="text" name="bookID" class="form-control" placeholder="ID">
                    </div>
                    <div class="form-group col-md-10">
                        <label>Title</label>
                        <input value="<?= $book["title"] ?>" type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input value="<?= $book["author"] ?>" type="text" name="author" class="form-control" placeholder="Author">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label>Condition</label>
                        <input value="<?= $book["book_condition"] ?>" type="text" name="book_condition" class="form-control" placeholder="Condition">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Type</label>
                        <input value="<?= $book["type"] ?>" type="text" name="type" class="form-control" placeholder="Fiction">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location</label>
                        <select class="form-control" name="location">
                            <option selected>Bookcase</option>
                            <option>Storage</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" placeholder="Description" rows="3"><?= $book["description"] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Cover Image</label>
                    <input type="file" name="book_cover" class="form-control-file" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>