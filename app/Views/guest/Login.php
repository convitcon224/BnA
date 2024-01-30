<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <base href="<?=base_url() ?>assets/guest/login/">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
        </div>
        <h1 class="title"><b>BNA</b> <br>Book and Action USTH</h1>
        <form>
            <div class="form-group">
                <label for="email">Email or Phone Number</label>
                <input type="text" id="email" placeholder="Enter Your Email or Phone number">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Password">
            </div>
            <div class="button-group">
                <button type="submit">Log In</button>
                <button type="button">Forgot Password</button>
                <button type="button" onclick="location.href='/SignUp'">Create New Account</button>
            </div>
        </form>
    </div>
</body>
</html>