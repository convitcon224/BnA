<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BnA</title>
      <!-- Carousel -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <!-- Header -->
      <?= $cssJS ?>

      <!-- Body -->
      <base href="<?=base_url() ?>assets/guest/home/">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <script src="js/prjhome.js"></script>
   </head>
   <style>
    .section3{
      background-image: url('img/library-weston-custom-home-fallon-custom-homes-and-renovations-img~b541afd70992fd18_14-2026-1-c6850d1.jpg');
    }
   </style>
   <script type="text/javascript">
      function onSearch(){
         searchType = document.getElementsByClassName("custom-select")[0].value;
         searchTxt = document.getElementById("search-detail").value;
         window.location.href="<?=base_url()?>/Browse/Search/"+searchType+"/"+searchTxt;
      }
   </script>
   <body>
      <div class="custom-container">
         <?= $header ?>
         <div class="section3">
            <div class="background-content">
               <div class="left-content">
                  <select class="custom-select">
                    <option value="Categories" selected>Categories</option>
                    <option value="Book ID">Book ID</option>
                    <option value="Title">Title</option>
                    <option value="Author">Author</option>
                  </select>
                  <div class="search-bar">
                     <input type="text" id="search-detail" placeholder="Find books, articles, & more…" />
                     <button type="submit" class="search-button" onclick="onSearch()"><i class="fas fa-search"></i></button>
                  </div>
                  <div class="rectangle">
                     <div class="content">
                        <h1>
                           Today's Hours<br><br>
                           6th floor of <br>
                           A21 Building<br><br>
                           <p1>8:00 AM – 17:00 PM</p1>
                        </h1>
                     </div>
                     <div class="content">
                        <h2>
                           Books on Shelves</b><br>
                           <br>
                           <p>Next Tuesday</p>
                        </h2>
                     </div>
                     <div class="content">
                        <h2>
                           <b>Books in Storage</b><br><br>
                           <p>Anytime</p>
                        </h2>
                     </div>
                     <div class="content">
                        <h2>
                           <b>Up to 4 Weeks</b><br><br>
                           <p>Many Salutary Books</p>
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <div class="container">
         <h1 class="carousel-title">Top club members</h1>
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

               <div class="item active">
                  <img src="img/library-weston-custom-home-fallon-custom-homes-and-renovations-img~b541afd70992fd18_14-2026-1-c6850d1.jpg">
                  <div class="carousel-caption">
                     <h3>Tong Thao My</h3>
                     <p>Club president</p>
                  </div>
               </div>

               <div class="item">
                  <img src="img/Logo_of_BnA.png">
                  <div class="carousel-caption">
                     <h3>Unknown</h3>
                     <p>Somethings</p>
                  </div>
               </div>
            
               <div class="item">
                  <img src="img/a301594b-627f-42d5-82c7-7bffc2a8cc03.png">
                  <div class="carousel-caption">
                     <h3>Unknown</h3>
                     <p>Somethings</p>
                  </div>
               </div>
         
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>
      </div>


      <div class="container" style="background-image: linear-gradient(to top, #d4fc79 0%, #96e6a1 100%);">
         <h1 class="carousel-title">Top credits</h1>
         <div id="myCarousel-2" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel-2" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel-2" data-slide-to="1"></li>
               <li data-target="#myCarousel-2" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

               <div class="item active">
                  <img src="img/library-weston-custom-home-fallon-custom-homes-and-renovations-img~b541afd70992fd18_14-2026-1-c6850d1.jpg">
                  <div class="carousel-caption">
                     <h3>Tong Thao My</h3>
                     <p>Club president</p>
                  </div>
               </div>

               <div class="item">
                  <img src="img/Logo_of_BnA.png">
                  <div class="carousel-caption">
                     <h3>Unknown</h3>
                     <p>Somethings</p>
                  </div>
               </div>
            
               <div class="item">
                  <img src="img/a301594b-627f-42d5-82c7-7bffc2a8cc03.png">
                  <div class="carousel-caption">
                     <h3>Unknown</h3>
                     <p>Somethings</p>
                  </div>
               </div>
         
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel-2" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel-2" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>
      </div>


      <div class="container" style="background-image: linear-gradient(to right, #c6ffdd, #fbd786, #f7797d);">
         <h1 class="carousel-title">Recommend books</h1>
         <div id="myCarousel-3" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel-3" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel-3" data-slide-to="1"></li>
               <li data-target="#myCarousel-3" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

               <div class="item active">
                  <img src="img/library-weston-custom-home-fallon-custom-homes-and-renovations-img~b541afd70992fd18_14-2026-1-c6850d1.jpg">
                  <div class="carousel-caption">
                     <h3>Tong Thao My</h3>
                     <p>Club president</p>
                  </div>
               </div>

               <div class="item">
                  <img src="img/Logo_of_BnA.png">
                  <div class="carousel-caption">
                     <h3>Unknown</h3>
                     <p>Somethings</p>
                  </div>
               </div>
            
               <div class="item">
                  <img src="img/a301594b-627f-42d5-82c7-7bffc2a8cc03.png">
                  <div class="carousel-caption">
                     <h3>Unknown</h3>
                     <p>Somethings</p>
                  </div>
               </div>
         
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel-3" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel-3" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>
      </div>

      


      <!-- <div class="slideshow-container">
         <div class="slideshow">
            <h3>Top club members</h3>
            <div class="slide-images slideshow1">
               <button class="button1" onclick="showPreviousSlide()">&lt;</button>
               <img src="img/library-weston-custom-home-fallon-custom-homes-and-renovations-img~b541afd70992fd18_14-2026-1-c6850d1.jpg" alt="Image 1">
               <img src="img/library-weston-custom-home-fallon-custom-homes-and-renovations-img~b541afd70992fd18_14-2026-1-c6850d1.jpg" alt="Image 2">
               <img src="img/library-weston-custom-home-fallon-custom-homes-and-renovations-img~b541afd70992fd18_14-2026-1-c6850d1.jpg" alt="Image 3">
               <button class="button2" onclick="showNextSlide()">&gt;</button>
            </div>
            <div class="slide-images slideshow2">
               <button class="button1" onclick="showPreviousSlide()">&lt;</button>
               <img src="img/Logo_of_BnA.png" alt="Image 4">
               <img src="img/Logo_of_BnA.png" alt="Image 5">
               <img src="img/Logo_of_BnA.png" alt="Image 6">
               <button class="button2" onclick="showNextSlide()">&gt;</button>
            </div>
         </div>
      </div> -->
      <?= $footer ?>
   </body>
</html>