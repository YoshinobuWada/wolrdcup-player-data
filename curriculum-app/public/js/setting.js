function managehide(){
    var managerole1 = document.getElementById('country_id1');
    var managerole2 = document.getElementById('country_id2');
    if(managerole1.disabled === true){
        managerole1.disabled = false;
        managerole2.disabled = true;
    } else {
        managerole1.disabled = true;
        managerole2.disabled = false;
    }
}

function manageblock(){
    var managerole1 = document.getElementById('country_id2');
    var managerole2 = document.getElementById('country_id1');
    if(managerole1.disabled === true){
        managerole1.disabled = false;
        managerole2.disabled = true;
    } else {
        managerole1.disabled = true;
        managerole2.disabled = false;
    }
}
