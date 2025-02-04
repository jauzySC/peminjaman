<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Barang</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');
        body {
            background-color: black;
            color:white;
            font-family:"Lexend", sans-serif;
        }
        th{
            background-color: #222;
        }
        tr{
            background-color: #111;
        }
        table{
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%,-50%);
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
    background-color: white;
    color: black;
}
.nav-link{
    color:white;
}
 /* Table Styling */
 table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #222;
        }

        tr {
            background-color: #111;
        }
    </style>
</head>
<body>
<ul class="navbar">
    <li><a href="{{ route('welcome')}}"class="nav-link">home</a></li>
        <li><a href="/layanan_siswa" class="nav-link">Siswa</a></li>
        <li><a href="/layanan_barang"class="nav-active">Barang</a></li>
        <li><a href="/layanan_peminjaman" class="nav-link">peminjaman</a></li>
    </ul>
    <div style="text-align:center;">
    <h1>Layanan Barang List</h1>
    </div>
    
    <table border="1" cellPadding="10" cellSpacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $item->id_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
