<table id="book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Editor</th>
            <th>Publisher</th>
            <th>Category</th>
            <th>Year</th>
            <th>Volume</th>
            <th>Page</th>
            <th>Language</th>
            <th>Type</th>
            <th>Status</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->editor }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->volume }}</td>
                <td>{{ $book->page }}</td>
                <td>{{ $book->language }}</td>
                @if($book->type == '0')
                    <td style="color: #dc3545;">R</td>
                @else
                    <td style="color: #007bff;">Non R</td>
                @endif
                @if($book->status == '0')
                    <td style="color: #007bff;">Tersedia</td>
                @elseif($book->status == '1')
                    <td style="color: #dc3545;">Dipinjam</td>
                @else
                    <td style="color: black;">Hilang</td>
                @endif
                @if($book->created_at != NULL)
                    <td>{{ \Carbon\Carbon::parse($book->created_at)->isoFormat('Y-M-D') }}</td>
                @else
                    <td>NULL</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>