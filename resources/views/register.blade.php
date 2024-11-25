<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
            height: 100vh; /* persen tinggi viewport */
            width: 100vw; /* persen lebar viewport */
            overflow: hidden; /* Hilangkan scroll */
        }
        main
        {
            /* posisi di tengah */
            position: relative; /* Mengapung bebas */
            top: 50%; /* Bagian atas berjarak 50% */
            left: 50%; /* Bagian kiri berjarak 50% */
            transform: translate(-50%, -50%); /* Tumpuan menjadi di engah object */

            background-color: rgba(0, 0, 0, 0.2);
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
            padding-left:10px;
            padding-right: 10px;
            border: 1px solid black;
            border-radius: 20px;
            background-color: rgba(0, 0, 0, 0.1)
        }
        .email
        {
            position: relative;
            top: 10px;
        }
        .password
        {
            position: relative;
            top: 20px;
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
        h3
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
        .info
        {
            position: absolute;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="info">
        @error('name')
            <h3>Ur name so bad bro!</h3>
        @enderror
        @error('email')
            <h3>Write true email please, I will heck u :D</h3>
        @enderror
        @error('password')
            <h3>Ur password like Kominfo!?</h3>
        @enderror
    </div>
    <main>
        <h2 class="login">Register</h2>
        <form name="register" action="register" method="POST">
            {{-- for security --}}
            @csrf

            <div class="name">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="input_text" required value="{{old('name')}}"><br>
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="input_text" required value="{{old('email')}}"><br>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input_text" required><br>
            </div>
            <input type="submit" value="register" class="button">
        </form>
    </main>
</body>
</html>
