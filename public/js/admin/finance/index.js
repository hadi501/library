$("#book-table").DataTable({
    responsive: true,
});

document.querySelector(".container-fluid").innerHTML = `
<button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
</button>
<a class="btn btn-info add-button" data-toggle="modal" data-target="#addModal">
    <i class="fa fa-plus"> Add</i>
</a>

`;

$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});

$(document).on("click", ".detail", function () {
    let type = $(this).data('type');
    selectColor(type);

    $("#edit-activity").val( $(this).data('activity') );
    $("#edit-amount").val( $(this).data('amount') );
    $("#edit-type").val( type );
});

$(document).on('change', $("select"), function(el) {
    selectColor($(el.target).val());
});

function selectColor(type){
    if (type == 1){
        $('#edit-type').attr("style","color:#007bff");
        $('#add-type').attr("style","color:#007bff");
    } else{
        $('#edit-type').attr("style","color:red");
        $('#add-type').attr("style","color:red");
    }
}