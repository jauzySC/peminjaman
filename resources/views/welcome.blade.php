<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');
        body{
            background-color: #222;
            color: white;
            font-family:'Lexend','sans-serif';
            margin: 0;
            padding: 0;
        }
         ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #111;
            display: flex;
            justify-content: center;
            position: sticky;
            top: 0;
            width: 100%;
            position: relative;
        }

        ul.navbar li {
            margin: 0 40px;
        }

        ul.navbar li a {
            text-decoration: none;
            padding: 14px 20px;
            display: block;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        ul.navbar li a:hover {
            background-color: white;
            color: black;
        }
        h1{
            text-align:center;
            background-color: #000;
            border-radius: 5px;
            width: 400px;
            padding: 20px;
            margin: 20px auto;
        }
        p{
            text-align: center;
        }
        .nav-active{
            color: black;
            font-weight: bold;
            background-color: #fff;
        }
        .nav-link{
            color: white;
        }
        .logout-button {
        font-family: 'Lexend', sans-serif;
        padding: 14px 20px;
        display: block;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s ease;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1em;
        margin: 0;
        position: absolute;
        right: 20px;
        
    }

    .logout-button:hover {
        background-color: white;
        color: black !important;
    }
        
    </style>
</head>
<body>
    <ul class="navbar">
        <li><a href="{{ route('welcome') }}" class="{{ request()->is('welcome') ? 'nav-active' : '' }}">Home</a></li>
        
        @auth <!-- Show these links ONLY if user is logged in -->
            <li><a href="/layanan_siswa" class="nav-link">Siswa</a></li>
            <li><a href="/layanan_barang" class="nav-link">Barang</a></li>
            <li><a href="/layanan_peminjaman" class="nav-link">Peminjaman</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button" >
                        Logout
                    </button>
                </form>
            </li>
        @else <!-- Show these links ONLY if user is NOT logged in -->
            <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        @endauth
    </ul>
    <h1>Welcome</h1>
    <p>Selamat Datang Di halaman Dashboard di website inventory barang</p>
</body>
</html>