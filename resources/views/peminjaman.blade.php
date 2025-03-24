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
            margin-left: 100px
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
h2{
    text-align: center;
}

    @media print {
        /* Hide unnecessary elements */
        .navbar, .tambah, .btn, h1, .aksi {
            display: none !important;
        }

        /* Table styling for print */
        body {
            background-color: white !important;
            color: black !important;
            print-color-adjust: exact; /* Force color printing */
        }

        table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin: 0 !important;
        }

        th {
            background-color: #2c3e50 !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2 !important;
            -webkit-print-color-adjust: exact;
        }

        td, th {
            border: 1px solid #ddd !important;
            padding: 12px !important;
        }

}

.button-container {
        display: flex;
        gap: 20px;
        justify-content: flex-start;
        margin-left: 100px;
        margin-top: 100;
        margin-bottom: 30px;
    }
    .print-btn {
        background-color: #222;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-family: "Lexend", sans-serif;
        font-weight: 500;
    }
    a.print-btn:hover, button.print-btn:hover {
        background-color: white;
        color: black;
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
    <div class="button-container">
    <button onclick="window.print()" class="print-btn">
        Print Button
    </button>
</div>
  
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nisn}}</td>
                    <td>{{ $item->siswa->nama_siswa ?? 'N/A' }}</td>
                    <td>{{ $item->barang->nama_barang ?? 'N/A' }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    <td>{{$item->tanggal_pengembalian}}</td>
                    <td class="aksi">   
                        <form action="{{ route('deletePeminjaman', $item->id_peminjaman) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Kembalikan</button>
                        </form>
                        <button class="edit-button">
                            <a href="/editPeminjaman/{{ $item->id_peminjaman }}"class="edit-button-link">Edit</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
