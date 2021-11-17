function deleteUser(correo){
    $.ajax({
        type: "POST",
        url: '../php/DeleteUser.php',
        data: {email: correo }
    });
}


function changeState(correo, estado){
    $.ajax({
        type: "POST",
        url: '../php/HandlingAccounts.php',
        data: {state: estado, email: correo }
    });
}