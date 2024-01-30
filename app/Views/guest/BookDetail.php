<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?=$book['title']?></title>
      <?= $cssJS ?>
      <base href="<?=base_url() ?>assets/guest/bookDetail/">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <?= $header ?>
      <div class="main-content">
         <div class="container">
            <div class="image-container">
               <div class="big-img">
                  <img src="<?=base_url() ?>assets/guest/listBooks/img/book-cover/<?=$book['book_cover']?>" alt="" id="myImage">
               </div>
               <div class="popup" id="myModal">
                  <span class="close" id="close">&times;</span>
                  <img class="popup-content" id="img01">
               </div>
            </div>
            <div class="right">
               <div class="pname"><?=$book['title']?></div>
               <br>
               <div class="info">
                  <p><b>Book ID:</b> <?=$book['bookID']?></p>
                  <p><b>Author:</b> <?=$book['author']?></p>
                  <p><b>Genre</b>: <?=$book['type']?></p>
               </div>
               <div class="btn-box">
                  <button class="cart-btn">Borrow now</button>
               </div>
            </div>
         </div>
         <script>document.getElementById("myImage").onclick = function() {
            document.getElementById("myModal").style.display = "block";
            document.getElementById("img01").src = this.src;
            }
            
            document.getElementById("close").onclick = function() {
            document.getElementById("myModal").style.display = "none";
            }
         </script>
         <div class="left-description">
            <p class="text"><b>PRODUCT DESCRIPTION</b></p>
            <p class="description"><?=$book['description']?></p>
         </div>
         <div class="comment-container">
            <div class="row">
               <div class="col-md-12">
                  <div class="card large-card">
                     <div class="card-body">
                        <h5 class="card-title">Comments</h5>
                        <div class="comment">
                           <h6 class="card-subtitle mb-2 text-muted highlighted">John Doe</h6>
                           <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="comment">
                           <h6 class="card-subtitle mb-2 text-muted highlighted">Jane Smith</h6>
                           <p class="card-text">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
                        </div>
                        <form>
                           <div class="mb-3">
                              <label for="comment" class="form-label">Comment</label>
                              <textarea class="form-control" id="comment" rows="3" placeholder="Enter your comment" required></textarea>
                           </div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?= $footer ?>
   </body>
</html>