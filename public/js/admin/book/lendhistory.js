$(document).ready(function(){
    $('#lend-history-table').dataTable({
        processing: true,
        responsive: true,
        ajax: {url:"/lends/history"},
        columns: [
            {data : 'cover',    name : 'cover'},
            {data : 'title',    name : 'title'},
            {data : 'category', name : 'category'},
            {data : 'peminjam', name : 'peminjam'},
            {data : 'pinjam',   name : 'selesai'},
            {data : 'selesai',  name : 'selesai'}
        ]
    });
});