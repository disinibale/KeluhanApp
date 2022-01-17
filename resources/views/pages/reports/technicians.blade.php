<table>
    <thead align="center">
        <tr>
            <td><b>#</b></td>
            <td><b>Nama Teknisi</b></td>
            <td><b>Email</b></td>
            <td><b>Nomor Telepon</b></td>
            <td><b>Alamat</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($technicians as $teknisi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $teknisi->fullname }}</td>
                <td>{{ $teknisi->email }}</td>
                <td>{{ $teknisi->phone }}</td>
                <td>{{ $teknisi->address }}</td>
            </tr>
        @endforeach
    </tbody>
</table>