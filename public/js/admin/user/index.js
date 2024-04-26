$("#user-table").DataTable({
    responsive: true,
});

document.querySelector(".container-fluid").innerHTML = `
<button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
</button>
<button type="button" id="tes" class="btn btn-info">
    <i class="fa fa-plus"> User</i>
</button>
`;

$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});
