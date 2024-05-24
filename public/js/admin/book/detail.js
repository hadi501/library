function starRate(id, input){
    rateid = parseInt(id);
    
    document.getElementById(input).value = rateid;
    
    for(i=1; i<rateid+1; i++){
        document.getElementById(`rate-${i}`).className = "fa fa-star checked";
    }
    a = 5 - rateid;
    if(a !=0){
        for(i=rateid+1; i<6; i++){
            document.getElementById(`rate-${i}`).className = "fa fa-star unchecked";
        }
    }
}

function favorite(bookid, action){

    let url, type, id = parseInt(bookid);

    if(action == "add"){
        url = "/favorite";
        type = "POST";
    } else{
        url = `/favorite/${bookid}`;
        type = "DELETE";
    }

    $.ajax({
        url: url,
        type: type,
        headers: headers,
        data: {
            bookid : id,
        },
        success: function (data) {
            location.reload();
        },
        error: function (data, textStatus, errorThrown) {
            Swal.fire("Error!", data.message, "error");
        },
    });

}