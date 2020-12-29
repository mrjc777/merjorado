<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <style>
        body {
            background-color: #e1e1e1;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 680px;
            width: 100%;
            margin: auto;
        }

        main {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            color: #555555;
        }

        .body h2 {
            font-weight: 300;
            color: #464646;
        }

        .logo {
            max-width: 100% !important;
            height: auto !important;
            width: 100%;
        }

        .header-img {
            max-width: 100% !important;
            height: auto !important;
            width: 100%;
        }

        a {
            text-decoration: underline;
            color: #0c99d5;
        }


        .body {
            padding: 20px;
            background-color: white;
            font-family: Geneva, Tahoma, Verdana, sans-serif;
            font-size: 16px;
            line-height: 22px;
            color: #555555;
        }

        button {
            background-color: #0c99d5;
            border: none;
            color: white;
            border-radius: 2px;
            height: 50px;
            max-width: 250px;
            padding: 0 30px;
            font-weight: 500;
            font-family: Geneva, Tahoma, Verdana, sans-serif;
            font-size: 16px;
            margin: 10px 0 30px 0;
        }

        footer {
            padding-top: 50px;
            font-family: Geneva, Tahoma, Verdana, sans-serif;
            font-size: 14px;
            line-height: 18px;
            color: #738597;
            text-align: center;
        }

        footer img {
            width: 100px;
            margin: 24px 0;
        }
    </style>
</head>
<body>
<main class="container">
    <div class="logo">
        <img src="http://dev.integrate.com.bo:81/logo_ritex.png" class="logo"
             alt="Logo Ritex">
    </div>
    <div class="body">
        @yield('content')
    </div>

</main>

<footer class="container">
    <p>Thanks for reading!</p>
    <p>You're receiving this email because we think you’re neat, AND you subscribed to hear from us. If our emails
        aren’t sparking joy, we’ll understand if you <a>unsubscribe.</a></p>

    <p>You can also <a href="#">update your email preferences</a> at anytime.</p>


    <img src="https://image.e.mozilla.org/lib/fe9915707361037e75/m/3/Mozilla-Logo-2017.png" alt="logo 2">

    <div>
        <a>Donate to Mozilla</a> <span>|</span> <a>Download Firefox</a>
        <p>331 E. Evelyn Avenue Mountain View CA 94041</p>
        <P><a>Legal</a> <span>•</span> <a>Privacy</a></P>
    </div>
</footer>
</body>

</html>
