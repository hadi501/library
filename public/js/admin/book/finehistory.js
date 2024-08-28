$(document).ready(function(){
    $('#fine-history-table').dataTable({
        processing: true,
        responsive: true,
        ajax: {url:"/fines/history"},
        columns: [
            {data : 'cover', name : 'cover'},
            {data : 'title', name : 'title'},
            {data : 'category', name : 'category'},
            {data : 'peminjam', name : 'peminjam'},
            {data : 'selesai', name : 'selesai'},
            {data : 'jumlah', name : 'jumlah'},
        ]
    });
});