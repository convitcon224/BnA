<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notification</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?=base_url() ?>assets/admin/notification/js/dataTable.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url() ?>assets/admin/home/css/maintable.css">
        <?= $cssJS ?>
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
            <div class="title-table">Pending request list</div>
            <div class = "usertable">
                <table id="maintable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone number</th>
                            <th>Student ID</th>
                            <th>Borrowing time</th>
                            <th>Book ID</th>
                            <th>Type</th>
                            <th>Request date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pendingRequests as $pendingRequest) : ?>
                            <tr>
                                <td><?=$pendingRequest['user_name']?></td>
                                <td><?=$pendingRequest['user_phone']?></td>
                                <td><?=$pendingRequest['student_id']?></td>
                                <?php if ($pendingRequest['holding_time']==1) { ?>
                                    <td><?=$pendingRequest['holding_time']?> week</td>
                                <?php } else { ?>
                                    <td><?=$pendingRequest['holding_time']?> weeks</td>
                                <?php } ?>
                                <td><?=$pendingRequest['book_id']?></td>
                                <td><?=$pendingRequest['type']?></td>
                                <td><?=$pendingRequest['request_date']?></td>
                                <?php if ($pendingRequest['type']=="Return") { ?>
                                    <td class="btn"><button onclick="location.href='/Admin/Request/Pending/ReturnRequest/<?=$pendingRequest['requestID']?>'" class="edit-btn"><i class="fa-solid fa-eye"></i></button></td>
                                <?php } else { ?>
                                    <td class="btn"><button onclick="location.href='/Admin/Request/Pending/AcceptRequest/<?=$pendingRequest['requestID']?>'" class="approve-btn"><i class="fa-solid fa-check"></i></button><button onclick="location.href='/Admin/Request/Pending/RefuseRequest/<?=$pendingRequest['requestID']?>'" class="delete-btn"><i class="fa-solid fa-xmark"></i></button></td>
                                <?php } ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>