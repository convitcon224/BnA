<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BnA Admin</title>
        <base href="<?=base_url() ?>assets/admin/home/">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/HomeJS.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="css/maintable.css">
        <?= $cssJS ?>
    </head>
    
    <body>
        <?= $sideNav ?>

    <!-- Page content -->
        <div class="content">
            <?= $topNav ?>
            
            <div class="title-table">Approval list</div>
            <div class = "usertable">
                <table id="maintable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Occupation</th>
                            <th>2 Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?=$user['id']?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['phone']?></td>
                                <td class="btn"><button class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></button><button class="deny-btn"><i class="fa-solid fa-trash-can"></i></button></td>
                                <!-- <td class="btn"><button class="approve-btn"><i class="fa-solid fa-check"></i></button><button class="deny-btn"><i class="fa-solid fa-trash-can"></i></button></td> -->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>