<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Book</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?=base_url() ?>assets/admin/home/js/HomeJS.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url() ?>assets/admin/home/css/maintable.css">
        <?= $cssJS ?>
        <script type="text/javascript" src="<?=base_url() ?>assets/admin/listBook/js/delete.js"></script>
    </head>

    <body>
        <?= $sideNav ?>

    <!-- Page content -->
        <div class="content">
            <?= $topNav ?>
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
            <div class="title-table">Book list</div>
            <div class = "usertable">
                <table id="maintable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Condition</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book) : ?>
                            <tr>
                                <td><?=$book['bookID']?></td>
                                <td><?=$book['title']?></td>
                                <td><?=$book['author']?></td>
                                <td><?=$book['book_condition']?></td>
                                <td><?=$book['location']?></td>
                                <td><?=$book['type']?></td>
                                <td><?=$book['description']?></td>
                                <td class="btn"><button onclick="location.href='/Admin/Book/Edit/<?=$book['id']?>'" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></button><button data-url="<?= base_url() ?>Admin/Book/Delete/<?=$book['id']?>" class="delete-btn"><i class="fa-solid fa-trash-can"></i></button></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>