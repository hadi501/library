function starRate(id){
    for(i=1; i<id+1; i++){
        document.getElementById(`rate-${i}`).className = "fa fa-star checked";
    }
    a = 5 - id;
    if(a !=0){
        for(i=id+1; i<6; i++){
            document.getElementById(`rate-${i}`).className = "fa fa-star unchecked";
        }
    }

}