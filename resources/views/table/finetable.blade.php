<table id="fine-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Peminjam</th>
            <th>Angkatan</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Selesai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fines as $fine)
            <tr>
                <td>{{ $fine->book->id }}</td>
                <td>{{ $fine->book->title }}</td>
                <td>{{ $fine->user->username }}</td>
                <td>{{ substr($fine->user->id, 0, 2) }}</td>
                <td>{{ $fine->amount }}</td>
                @if($fine->status == '0')
                    <td style="color: #dc3545;">Belum Lunas</td>
                @else
                    <td style="color: #007bff;">Lunas</td>
                @endif
                @if($fine->status == '1')
                <td>{{ \Carbon\Carbon::parse($fine->updated_at)->isoFormat('Y-M-D') }}</td>
                @else
                <td>-</td>
                @endif
            
            </tr>
        @endforeach
    </tbody>
</table>