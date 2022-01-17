<table>
    <thead class="thead-dark">
        <tr>
            <th colspan="10" align="center">
                <b>Data Perbaikan</b>
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
            <th><b>Teknisi</b></th>
            <th><b>Tanggal Perbaikan</b></th>
            <th><b>Tanggal Selesai</b></th>
            <th><b>Tindakan</b></th>
            <th><b>Hasil Perbaikan</b></th>
            <th><b>Status</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $r)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->repairement->complain->user->name }}</td> {{-- Nama Pelanggan --}}
            <td>{{ $r->repairement->complain->user->customer->phone }}</td> {{-- Nomor --}}
            <td>{{ $r->repairement->complain->user->customer->address }}</td> {{-- Alamat --}}
            <td>{{ $r->repairement->complain->message }}</td> {{-- keluhan --}}
            <td>{{ $r->repairement->technician->fullname }}</td> {{-- Teknisi --}}
            <td>{{ $r->repairement->date }}</td> {{-- Tanggal Perbaikan --}}
            <td>{{ $r->repairement->result->finish_date }}</td> {{-- Tanggal selesai --}}
            <td>{{ $r->repairement->actions }}</td> {{-- tindakan --}}
            <td>{{ $r->result }}</td> {{-- Hasil --}}
            <td>{{ $r->repairement->complain->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>