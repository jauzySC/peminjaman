<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');
        
        body {
            background-color: #1a1a1a;
            color: white;
            font-family: "Lexend", sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Center the form vertically */
        }

        form {
            background-color: #333;
            padding: 30px;
            border-radius: 8px;
            width: 400px; /* Set a specific width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #ccc;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px; /* Add space between fields */
            border: 1px solid #444;
            background-color: #222;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        select:focus {
            outline: none;
            border-color: #007BFF;
            background-color: #333;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:focus {
            outline: none;
        }
        input {
            width: 94%;
            padding: 10px;
            margin-bottom: 20px; /* Add space between fields */
            border: 1px solid #444;
            background-color: #222;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <form method="post">
        @csrf
        @method('PUT')

        <label for="id_barang">Barang:</label>
    <select id="id_barang" name="id_barang" required>
        @foreach($barang as $b)
            <option value="{{ $b->id_barang }}">{{ $b->nama_barang }}</option>
        @endforeach
    </select>

    <label for="pengembalian">tanggal pengembalian</label>
    <input type="date" name="tanggal_pengembalian">

    <!-- Submit Button -->
    <button type="submit">Submit</button>
    </form>
</body>
</html>