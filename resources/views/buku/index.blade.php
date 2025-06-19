<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Data buku</h2>
    <hr>
    <a href="buku/create">tambah Data</a>
    <table border=2>
        <tr>
            <th>no</th>
            <th>judul</th>
            <th>harga</th>
            <th>kategori</th>
            <th>aksi</th>
        </tr>
        @php $no = 1; @endphp
        @foreach ($buku as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data['judul']}}</td>
                <td>{{$data['harga']}}</td>
                <td>{{$data['kategori']}}</td>
                <td>
                    <form action="/buku/{{ $data['id']}}" method="post">
                        @csrf
                        <a href="/buku/{{ $data['id']}}">show</a>
                        <a href="/buku/{{ $data['id']}}/edit">edit</a>
                        @method('DELETE')
                    <button type="submit" onclick="return confirm('apakah anda yakin?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>