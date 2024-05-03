$("#user-table").DataTable({
    responsive: true,
});

document.querySelector(".container-fluid").innerHTML = `
<button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
</button>
<a class="btn btn-info" href="/user/create">
    <i class="fa fa-plus"> User</i>
</a>
`;

$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});
