<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        :root
        {
            --primary-color: #b5afaf;
            --second-color: #b9b9b9;
            --black-color: #020101;
        }
        *
        {
            padding: 0px;
            margin: 0px;
        }
        body
        {
            /* background-color: rgb(174, 174, 174); */
            background-image: url("bg.jpeg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;

            font-family: "Poppins", Arial, sans-serif;
            height: 100vh;          /*  persen tinggi viewport  */
            width: 100vw;           /*  persen lebar viewport   */
            overflow: hidden;       /*  Hilangkan scroll        */
        }
        main
        {
            /*  posisi di tengah */
            position: relative;                 /*  Mengapung bebas                 */
            top: 50%;                           /*  Bagian atas berjarak 50%        */
            left: 50%;                          /*  Bagian kiri berjarak 50%        */
            transform: translate(-50%, -50%);   /*  Tumpuan menjadi di engah object */

            background-color: rgba(0, 0, 0, 0.3);
            padding: 10px 50px;
            height: 360px;
            width: 200px;
            border: 2px solid black;
            border-radius: 30px;
        }
        h2
        {
            font-size: 24px;
            text-align: center;
            padding-bottom: 20px;
        }
        p
        {
            font-size: 10px;
            position: relative;
            top: 100px;
        }
        a{
            text-decoration: none;
            color: blue;
        }
        a:hover
        {
            text-decoration: underline;
        }
        .input_text
        {
            height: 30px;
            width: 90%;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid black;
            border-radius: 20px;
            background-color: rgba(0, 0, 0, 0.2)
        }
        .password
        {
            position: relative;
            top: 10px;
        }
        .button
        {
            position: relative;
            top: 40px;
            padding: 10px 20px;
            border: 1px solid;
            border-radius: 20px;
            background-color: rgba(174, 121, 117, 5);
        }
        div.info>h3
        {
        position: relative;
        font-size: 15px;
        border: 1px, solid, green;
        border-radius: 20px;
        background-color: rgba(0, 255, 0, 0.5);
        padding: 5px;
        padding-left: 10px;
        width: 30%;
        }
        div.red>h3
        {
        position: relative;
        font-size: 15px;
        border: 1px, solid, red;
        border-radius: 20px;
        background-color: rgba(255, 0, 0, 0.5);
        padding: 5px;
        padding-left: 10px;
        width: 30%;
        }
        .info, .red
        {
        position: absolute;
        width: 100%;
        }

    </style>
</head>
<body>
    <div class="info">
        @if (session()->has('success'))
            <h3>{{session('success')}}</h3>
        @endif
    </div>
    <div class="red">
        @error('name')
            <h3>Ur name so bad</h3>
        @enderror
        @error('password')
            <h3>Ur password false</h3>
        @enderror
        @if (session()->has("nologin"))
            <h3>{{session("nologin")}}</h3>
        @endif
    </div>
    <main>
        <h2 class="login">Login</h2>
        <form name="login" action="login" method="POST">
            @csrf

            <div class="username">
                <label for="username" class="user">Username:</label><br>
                <input type="text" name="name" id="username" class="input_text" required value="{{old('name')}}"><br>
            </div>
            <div class="password">
                <label for="password" class="pass">Password:</label><br>
                <input type="password" name="password" id="password" class="input_text" required><br>
            </div>
            <input type="submit" value="Login" class="button">
        </form>
        {{-- <p>Tidak memiliki akun? <a href="{{ route('register')}}">Daftar sekarang</a></p> --}}
        <p>Tidak memiliki akun? <a href="/register">Daftar sekarang</a></p>
    </main>
</body>
</html>
