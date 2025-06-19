<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Buku</h2> <hr>
    <form action="/buku/{{$buku['id']}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="judul" placeholder="masukan judul" value="{{$buku['judul']}}" required><br>
        <input type="number" name="harga" value="{{$buku['harga']}}" required><br>
        <select name="kategori" id=""><br>
            <option>Pilih Kategori</option>
            <option value="self improvment" {{ $buku['kategori']=='self improvment' ? 'selected' :''}}>self improvment</option>
            <option value="bacaan" {{ $buku['kategori']=='bacaan' ? 'selected' :''}}>bacaan</option>
            <option value="teknologi" {{ $buku['kategori']=='teknologi' ? 'selected' :''}}>teknologi</option>
        </select><br>
        <button type="submit">simpan</button>
        <button type="reset">refresh</button>
    </form>

</body>
</html>