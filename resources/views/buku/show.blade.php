<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    ID: {{$buku['id']}} <br>
    judul: {{$buku['judul']}} <br>
    Harga: Rp.{{number_format($buku['harga'],2,',','.')}} <br>
    Kategori: {{$buku['kategori']}}
</body>
</html>