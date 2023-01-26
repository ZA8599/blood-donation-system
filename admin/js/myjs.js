//create unique id for employee
function uniqueID(designation){
    const employeeID = "";
    if (designation == "admin") {
        return "A" + Math.random().toString(36).substr(2, 9);
    }
    else if (designation == "staff") {
        return "S" + Math.random().toString(36).substr(2, 9);
    }else if (designation == "doctor"){
        return "D" + Math.random().toString(36).substr(2, 9);
    }else if(designation == "nurse"){
        return "N" + Math.random().toString(36).substr(2, 9);
    }else {
        //return error message
        return "error";
    }
}
