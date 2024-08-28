<table id="user-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <tr>
            <th>NIM</th>
            <th>Username</th>
            <th>Email</th>
            <th>Angkatan</th>
            <th>Phone</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ substr($user->id, 0, 2) }}</td>
                <td>0{{ $user->phone }}</td>
                @if ($user->role == '0')
                    <td>User</td>
                @elseif ($user->role == '1')
                    <td>Admin</td>
                @elseif ($user->role == '2')
                    <td>Bendahara</td>
                @elseif ($user->role == '3')
                    <td>Super Admin</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>