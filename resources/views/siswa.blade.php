<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>layanan_siswa</title>
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');
        
        body {
            background-color: black;
            color: white;
            font-family: "Lexend", sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar styling */
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
        }

        ul.navbar li {
            margin: 0 40px;
        }

        ul.navbar li a {
            color: white;
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
.nav-active{
    font-weight: bold;
}
/* Table Styling */
table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 12px;
        }

        th {
            background-color: #222;
        }

        tr {
            background-color: #111;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
<ul class="navbar">
    <li><a href="{{ route('welcome')}}"class="home">home</a></li>
        <li><a href="/layanan_siswa" class="nav-active">Siswa</a></li>
        <li><a href="/layanan_barang">Barang</a></li>
        <li><a href="/layanan_peminjaman">peminjaman</a></li>
    </ul>
    <h1>Layanan Siswa List</h1>

    <table border="1" cellPadding="10" cellSpacing="0">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama siswa</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
                <tr>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{$item->kelas}}</td>
                    <td>{{ $item->nama_jurusan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
