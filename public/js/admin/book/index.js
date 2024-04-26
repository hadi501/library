$("#book-table").DataTable({
    responsive: true,
});

document.querySelector(".container-fluid").innerHTML = `
<button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
</button>
<a class="btn btn-info" href="/book/create">
    <i class="fa fa-plus"> Book</i>
</a>

`;
{/* <button type="button" id="add-book" class="btn btn-info" onclick="window.location='{{ url("book/create") }}'">
    <i class="fa fa-plus"> Book</i>
</button> */}
$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});