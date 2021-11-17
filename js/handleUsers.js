function deleteUser(correo){
    if(confirm(`¿Seguro que quieres borrar a ${correo} ?`)){
        $.ajax({
            type: "POST",
            url: '../php/DeleteUser.php',
            data: {email: correo }
        });
    }
}

function printStatus(estado){
    let notStatus = [];

    if(estado == 'activo'){
        notStatus.push('banear');
        notStatus.push('baneado');
    } else{
        notStatus.push('activar');
        notStatus.push('activo')
    }
    return notStatus;
}


function changeStatus(correo, estado){
    let notStatus = printStatus(estado);
    alert(notStatus[0]);
    alert(notStatus[1]);
    let status = notStatus[1];
    if(confirm(`¿Seguro que quieres ${notStatus[0]} a ${correo}?`)){
        alert(status);
        $.ajax({
            type: "POST",
            url: '../php/ChangeStatus.php',
            data: {state: status, email: correo }
        });
    }
}