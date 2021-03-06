<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musix</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>

<body>
    <header>
        <div class="logo-login-div">
            <div class="logo-div">
                <img src="img/logo.png" alt="">
                <a href="listar/all"><h1 class="logo">MUSIX</h1></a>
            </div>

            <div class="register-login">
                <ul>
                    {if isset($smarty.session.USER_ID)} 
                        <p>Logeado como: <span id="username-loggedAs">{$smarty.session.USER_NAME}</span></p>
                        <li><a href="user/logout">LOGOUT</a></li>
                    {else}
                        <li><a href="user/register">REGISTRARSE</a></li>
                        <li><a href="user/login">INGRESAR</a></li>
                    {/if}
                </ul>
            </div>

        </div>

        {include file='nav.tpl'}
        
    </header>

    