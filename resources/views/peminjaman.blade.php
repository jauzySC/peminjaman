<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .nav-active{
            color: black;
            font-weight: bold;
            background-color: #fff;
        }
        .nav-link{
            color: white;
        }
        /* Title and new button styling */
        h1 {
            text-align: center;
            margin-top: 100px; /* Add space from the navbar */
        }

        a.tambah {
            display: inline-block;
            text-align: center;
            background-color: #222;
            padding: 12px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        a.tambah:hover {
            background-color: white;
            color: black;
        }

        /* Table Styling */
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 12px;
            white-space: nowrap;
        }

        th {
            background-color: #222;
        }

        tr {
            background-color: #111;
        }
        .aksi{
            display: flex;
            gap: 10px;
        }
.btn-danger{
    background-color: #222; /* Red color */
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-family: "Lexend", sans-serif;

}
.btn-danger:hover{
    background-color: white;
    color:black;
    font-family: "Lexend", sans-serif;
}
        button {
            cursor: pointer;
        }
        .nav-active{
            font-weight:bold;
        }
        .home{
            color:white;
            text-decoration:none;
        }
        .edit-button {
            background-color: #222; /* Red color */
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-family: "Lexend", sans-serif;
}

.edit-button:hover {
    background-color: white;
    color: black;
}

.edit-button-link {
    color: inherit;
    text-decoration: none;
    display: block;
}


    </style>
</head>
<body>
    <!-- Navbar -->
    <ul class="navbar">
        <li><a href="{{ route('welcome')}}"class="home">home</a></li>
        <li><a href="/layanan_siswa" class="nav-link">Siswa</a></li>
        <li><a href="/layanan_barang" class="nav-link">Barang</a></li>
        <li><a href="/layanan_peminjaman" class="nav-active">Peminjaman</a></li>
    </ul>

    <!-- Title -->
    <h1>Data Peminjaman</h1>

    <!-- Tambah Data Button -->
    <a href="{{ route('peminjaman.create') }}" class="tambah">Tambah Data</a>

    <!-- Table -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Nama Barang</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $item)
                <tr>
                    <td>{{ $item->id_peminjaman }}</td>
                    <td>{{ $item->siswa->nisn}}</td>
                    <td>{{ $item->siswa->nama_siswa }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    <td>{{$item->tanggal_pengembalian}}</td>
                    <td class="aksi">
                        <form action="{{ route('deletePeminjaman', $item->id_peminjaman) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Kembalikan</button>
                        </form>
                        <button class="edit-button">
                            <a href="/edit"class="edit-button-link">Edit</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
