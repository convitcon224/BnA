<!DOCTYPE html>
<html>
   <head>
      <title>Borrowing</title>
      <?= $cssJS ?>
      <base href="<?=base_url() ?>assets/guest/borrowing/">
      <link rel="stylesheet" href="css/borrow.css">
   </head>
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
            <button class="accordion">Book currently browsing</button>
            <div class="panel">
               <table>
                  <thead>
                     <tr>
                        <th>Session ID</th>
                        <th>Status</th>
                        <th>Book</th>
                        <th>Deposit</th>
                        <th>Start time</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($history as $aSession) : ?>
                        <?php if ($aSession["status"]=="Accepted") { ?>
                           <tr>
                              <td><?=$aSession['sessionID']?></td>
                              <td>Waiting...</td>
                              <td><?=$aSession['book_id']?></td>
                              <td><?=$aSession['deposit']?></td>
                              <td><?=$aSession['start_time']?></td>
                           </tr>
                        <?php } elseif ($aSession["status"]!="Done") { ?>
                           <tr>
                              <td><?=$aSession['sessionID']?></td>
                              <td><?=$aSession['status']?></td>
                              <td><?=$aSession['book_id']?></td>
                              <td><?=$aSession['deposit']?></td>
                              <td><?=$aSession['start_time']?></td>
                           </tr>
                        <?php } ?>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
            <button class="accordion">Borrowed history</button>
            <div class="panel">
               <table>
                  <thead>
                     <tr>
                        <th>Session ID</th>
                        <th>Status</th>
                        <th>Book</th>
                        <th>Deposit</th>
                        <th>Start time</th>
                        <th>Return time</th>
                        <th>Fine</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($history as $aSession) : ?>
                        <?php if ($aSession["status"]=="Done") { ?>
                           <tr>
                              <td><?=$aSession['sessionID']?></td>
                              <td><?=$aSession['status']?></td>
                              <td><?=$aSession['book_id']?></td>
                              <td><?=$aSession['deposit']?></td>
                              <td><?=$aSession['start_time']?></td>
                              <td><?=$aSession['return_date']?></td>
                              <td><?=$aSession['fine']?></td>
                           </tr>
                        <?php } ?>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <script src="js/borrow_request.js"></script>
      <?= $footer ?>
   </body>
</html>