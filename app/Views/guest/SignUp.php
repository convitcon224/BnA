<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <base href="<?=base_url() ?>assets/guest/signUp/">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">

        <div class="image-container">
         <img src="img/2.Logo of BnA(nen trang).png" alt="image1">
        </div>

        <a>Welcome to BNA</a>
        <button type="submit" onclick="openPopup()" class="Create_acc_button">Create an account</button>
        
        
        <div class="popup" id="popup">
            <div>
            <div class="image-container-1">
                <h1>Create your account</h1>
                <img src="img/2.Logo of BnA(nen trang).png" alt="image1">
            </div>
            </div>

            <div style="display: flex; align-items: center;">
                <form>
                    <div class="form-row">
                      <label for="name">Name:</label>
                      <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-row">
                        <label for="Student">Phone:</label>
                        <input type="text" id="Student" name="Student" required>
                    </div>
                  
                    <div class="form-row">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" required>
                    </div>
                  
                    <div class="form-row">
                      <label for="password">Password:</label>
                      <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-row">
                      <label for="password">Confirm password:</label>
                      <input type="password" id="conpassword" name="conpassword" required>
                    </div>
                  
                    <div id="div-container"> 
                        <button type="button" onclick="closePopup()">Exit</button>
                        <button>Create account</button>
                    </div>
                </form>
            </div>
            <div>
                


            </div>
        </div>

    </div>
</body>
</html>
<script>
    let popup = document.getElementById("popup")
    function openPopup() {
        popup.classList.add("open-popup")
    }

    function closePopup() {
        popup.classList.remove("open-popup")
    }
</script>