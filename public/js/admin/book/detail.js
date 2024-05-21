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