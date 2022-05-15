<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/LogInAdmin.css')}}">
</head>
<body>
    <div class="form_group">
        <div class="banner">QHP Administrator</div>
        <form action="" class="from_main">
            <div class="form_group_Inp">
                <input type="text"
                 name="usernameInp"
                 id="usm"
                 class="usernameInp"
                 placeholder="  User name"
                 >
            </div>
            <div class="form_group_Inp">
                <input type="text"
                 name="PassInp"
                 id="psm"
                 class="PassInp"
                 placeholder="  Password"
                 >
            </div>
            <div class="login_btn">
                <button class="LoginBtn">Login</button></div>
        </form>
    </div>

</body>
</html>
