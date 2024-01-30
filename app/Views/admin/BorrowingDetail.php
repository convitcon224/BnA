<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing detail</title>
    <base href="<?=base_url() ?>assets/admin/addBook/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <?= $cssJS ?>
</head>
<style>
    table, th, td {
        border:1px solid black;
        padding: 7px;
    }
    table{
        margin-bottom: 30px;
        margin-top: 30px;
    }
    .noBold{
    font-weight:normal
    }
</style>
<body>
    <?= $sideNav ?>
    <div class="content">
        <?= $topNav ?>
        <div class="form-container">
            <h2><b>Borrowing detail</b></h2>
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
            <table style="width:100%">
                <tr>
                    <th>Session ID</th>
                    <th>Book ID</th>
                    <th>Deposit</th>
                    <th>Start time</th>
                    <th>Book condition</th>
                    <th>Type</th>
                    <th>Request date</th>
                    <th>Time duration</th>
                    <th>Username</th>
                    <th>Student ID</th>
                    <th>Phone</th>
                </tr>
                <?php $totalTime = 0; ?>
                <?php foreach ($allRequests as $aRequest) : ?>
                    <tr>
                        <td><?=$aRequest['sessionID']?></td>
                        <td><?=$aRequest['book_id']?></td>
                        <td><?=$aRequest['deposit']?></td>
                        <td><?=$aRequest['start_time']?></td>
                        <td><?=$aRequest['book_condition']?></td>
                        <td><?=$aRequest['type']?></td>
                        <td><?=$aRequest['request_date']?></td>
                        <?php if ($aRequest['holding_time']==1) { ?>
                            <td><?=$aRequest['holding_time']?> week</td>
                        <?php } else { ?>
                            <td><?=$aRequest['holding_time']?> weeks</td>
                        <?php } ?>
                        <td><?=$aRequest['user_name']?></td>
                        <td><?=$aRequest['student_id']?></td>
                        <td><?=$aRequest['user_phone']?></td>
                    </tr>
                    <?php $totalTime +=  $aRequest['holding_time'];?>
                <?php endforeach ?>
            </table>
            <form action="/Admin/Request/Pending/ReturnRequest/Confirm/" method="post">
                <div class="form-row">
                    <label>Total borrowing time: 
                        <span class="noBold">
                            <?php if ($totalTime==1) { ?>
                                <?=$totalTime?> week
                            <?php } else { ?>
                                <?=$totalTime?> weeks
                            <?php } ?>
                        </span>
                    </label>
                </div>
                <div class="form-row" style="margin-bottom:17px;">
                    <label>Expired date: <span class="noBold"><?php echo date_add(new DateTime($allRequests[0]['start_time']),date_interval_create_from_date_string($totalTime." weeks"))->format('Y-m-d H:i:s'); ?></span></label>
                </div>
                <div class="form-group">
                    <label>Book's condition</label>
                    <input value="<?= old("condition_after") ?>" type="text" name="condition_after" class="form-control" placeholder="Normal" required>
                </div>
                <div class="form-group">
                    <label>Fine</label>
                    <input value="<?= old("fine") ?>" type="number" step="0.0001" name="fine" class="form-control" placeholder="100000" required>
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea type="text" name="note" class="form-control" placeholder="More detail" rows="3"><?= old("note") ?></textarea>
                </div>
                <input name="session_id" value="<?= $allRequests[0]['sessionID'] ?>" hidden>
                <input name="return_id" value="<?= $returnID ?>" hidden>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>