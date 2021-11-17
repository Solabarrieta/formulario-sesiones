function deleteUser(correo){
    $.ajax({
        type: "POST",
        url: '../php/DeleteUser.php',
        data: {email: correo }
    });
}


function changeStatus(correo, estado){
    $.ajax({
        type: "POST",
        url: '../php/ChangeStatus.php',
        data: {state: estado, email: correo }
    });
}