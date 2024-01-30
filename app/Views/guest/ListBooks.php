<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= $cssJS ?>
    <base href="<?=base_url() ?>assets/guest/listBooks/">
    <link rel="stylesheet" href="css/listbookStyle.css">
</head>
<script type="text/javascript">
    function itemOnClick(){
        var field = document.getElementsByClassName("list-container")[0];
        
        field.addEventListener('click', function(e) {
            if(e.target.className=="box-book"){
                // alert(e.target.getElementsByClassName("name-book")[0].innerHTML);
                var encodeID = btoa(e.target.getElementsByClassName("book-id")[0].innerHTML);
                window.open("/Browse/BookDetail/"+encodeID);
            } else if(e.target.parentElement.className=="box-book"){
                // alert(e.target.parentElement.getElementsByClassName("book-id")[0].innerHTML);
                var encodeID = btoa(e.target.parentElement.getElementsByClassName("book-id")[0].innerHTML);
                window.open("/Browse/BookDetail/"+encodeID);
            }
        }, false);
    }
    
</script>
<body onload="itemOnClick()">

    <?= $header ?>
    
    <div class="body">
        <div class="breadcrumb-container">
            <ul class="breadcrumb">
                <li><a href="/">HOME</a></li>
                <li><a href="/Category">Browse</a></li>
                <li><?= $title ?></li>
            </ul>
        </div>

        <div class="list-container">
            <?php foreach ($books as $book) : ?>
                <div class="box-book" title="<?=$book['title']?>">
                    <p class="book-id" hidden><?=$book['id']?></p>
                    <img class="picture-book" src="img/book-cover/<?=$book['book_cover']?>">
                    <p class="name-book"><?=$book['title']?></p>
                    <!-- đánh giá sách -->
                    <div class="rating-book">
                        <?= $rating ?>
                        <p class="person-rate">(3)</p> <!-- số người đánh giá sách -->
                    </div>
                    <!-- trạng thái sách -->
                    <p class="status-book"><?php if ($book["status"]=="Available"){echo("Available");} else{echo("Unavailable") ;} ?></p>
                </div>
            <?php endforeach ?>
        </div>

        <div class="page">
            <?= $index ?>
        </div>

    </div>

    <!-- <div class="footer">
        
        
    </div> -->
    <?= $footer ?>

</body>
</html>