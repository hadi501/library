<table id="lend-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Peminjam</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Pinjam</th>
            <th>Kembali</th>
            <th>Pengembalian</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lends as $lend)
            <tr>
                <td>{{ $lend->book->id }}</td>
                <td>{{ $lend->book->title }}</td>
                <td>{{ $lend->book->category }}</td>
                <td>{{ $lend->user->username }}</td>
                <td>{{ substr($lend->user->id, 0, 2) }}</td>
                @if($lend->status == '0')
                    <td style="color: #007bff;">Selesai</td>
                @else
                    <td style="color: #dc3545;">Dipinjam</td>
                @endif
                <td>{{ \Carbon\Carbon::parse($lend->lend_date)->isoFormat('Y-M-D') }}</td>
                <td>{{ \Carbon\Carbon::parse($lend->return_date)->isoFormat('Y-M-D') }}</td>

                @if($lend->status == '0')
                    <td>{{ \Carbon\Carbon::parse($lend->updated_at)->isoFormat('Y-M-D') }}</td>
                @else
                    <td>-</td>
                @endif
                
                @if($lend->status == '0')
                    @if($lend->updated_at > $lend->return_date)
                    <td style="color: #dc3545;">Terlambat</td>
                    @else
                    <td style="color: #007bff;">Tepat Waktu</td>
                    @endif
                @else
                    <td>-</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>