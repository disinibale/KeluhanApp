<table>
    <thead align="center">
        <tr>
            <td><b>#</b></td>
            <td><b>Kode Pelanggan</b></td>
            <td><b>Nama Pelanggan</b></td>
            <td><b>Nomor Telepon</b></td>
            <td><b>Alamat</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->user->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
            </tr>
        @endforeach
    </tbody>
</table>