<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggest Book</title>
    <base href="<?=base_url() ?>assets/guest/suggestBook/">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <h1 id="page-title">Have any books to recommend?</h1>
        <br>
        <!-- TODO: Add functionality to this form-->
        <div class="form-suggest-book">
            <form>
                <label for="suggest-book-name"><b>Name of the book</b></label>
                <input type="text" id="suggest-book-name" name="suggest-book-name" size="50">

                <label for="suggest-book-genre"><b>Genre of the book</b></label>
                <input type="text" id="suggest-book-genre" name="suggest-book-genre">

                <label for="suggest-book-author"><b>Author of the book</b></label>
                <input type="text" id="suggest-book-author" name="suggest-book-author">

                <label for="suggest-book-desc"><b>What is the book about?</b></label>
                <textarea id="suggest-book-desc" name="suggest-book-desc" rows="4" cols="50">Give us a brief summary of the book's context, plot (do not spoil key points in the story), and what to expect from it.
                </textarea>

                <label for="suggest-book-email"><b>Enter your email here so we can send you gift ;)</b></label>
                <input type="text" id="suggest-book-email" name="suggest-book-email">

                <!--TODO: Add functionality to these buttons -->
                <div class="form-buttons">
                    <input type="button" id="button-back" value="Back" onclick="location.href='/'">
                    <input type="submit" id="button-submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>
