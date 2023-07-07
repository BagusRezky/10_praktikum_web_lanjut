<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membuat laporan pdf denngan DOMPDF Laravel</title>
    <style>
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <center>
        <h5>Laporan Artikel</h5>
    </center>
    <table class="table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->title }}</td>
                    <td>{{ $a->content }}</td>
                    <td>{{ $a->featured_image }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
