<table>
    <thead class="thead-dark">
        <tr>
            <th colspan="6" align="center">
                <b>Data Keluhan Pelanggan</b>
            </th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th><b>#</b></th>
            <th><b>Nama Pelanggan</b></th>
            <th><b>Nomor Telepon</b></th>
            <th><b>Alamat</b></th>
            <th><b>Keluhan</b></th>
            <th><b>Status</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($complaints as $complaint)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $complaint->user->name }}</td>
            <td>{{ $complaint->user->customer->phone }}</td>
            <td>{{ $complaint->user->customer->address }}</td>
            <td>{{ $complaint->message }}</td>
            <td>{{ $complaint->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>