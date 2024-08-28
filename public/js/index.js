$(document).on("click", ".detail", function () {

    let id = $(this).data('id');
    let img = $(this).data('cover');
    
    let type = $(this).data('type');
    let status = $(this).data('status');

    let type0 = document.getElementById("type");
    let status0 = document.getElementById("status");

    $("#book-cover").attr("src", `storage/public/book/${img}`);

    $("#book-detail-link").attr("href", `/book-detail/${id}`);
    document.getElementById("id").innerHTML = id;
    document.getElementById("author").innerHTML = $(this).data('author');
    document.getElementById("title").innerHTML = $(this).data('title');
    document.getElementById("editor").innerHTML = $(this).data('editor');
    document.getElementById("category").innerHTML = $(this).data('category');
    document.getElementById("publisher").innerHTML = $(this).data('publisher');
    document.getElementById("year").innerHTML = $(this).data('year');
    if(type == 0){
        type0.innerHTML = "R";
        type0.setAttribute("style","font-weight:600; color: #dc3545;");
    }else{
        type0.innerHTML = "Non R";
        type0.setAttribute("style","font-weight:600; color: #007bff;");
    }

    if(status == 0){
        status0.innerHTML = "Tersedia";
        status0.setAttribute("style","font-weight:600; color: #007bff;");
    } else if(status == 1){
        status0.innerHTML = "Dipinjam";
        status0.setAttribute("style","font-weight:600; color: #dc3545;");
    } else{
        status0.innerHTML = "Hilang";
        status0.setAttribute("style","font-weight:600; color: #dc3545;");
    }
});