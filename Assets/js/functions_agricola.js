// let tableContactos;

// tableContactos = $('#tableDji').dataTable( {

//     "aProcessing":true,

//     "aServerSide":true,

//     "language": {

//         "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

//     },

//     "ajax":{

//         "url": " "+base_url+"/dji/getLeads",

//         "dataSrc":""

//     },

//     "columns":[

//         {"data":"fech_crea"},

//         {"data":"est"},

//         {"data":"usu_nom"},

//         {"data":"usu_num"},

//         {"data":"usu_city"},

//         {"data":"usu_vendedor"},

//         {"data":"options"}

//     ],

//     'dom': 'lBfrtip',

//     'buttons': [

//         {

//             "extend": "copyHtml5",

//             "text": "<i class='far fa-copy'></i> Copiar",

//             "titleAttr":"Copiar",

//             "className": "btn btn-secondary"

//         },{

//             "extend": "excelHtml5",

//             "text": "<i class='fas fa-file-excel'></i> Excel",

//             "titleAttr":"Esportar a Excel",

//             "className": "btn btn-success"

//         },{

//             "extend": "pdfHtml5",

//             "text": "<i class='fas fa-file-pdf'></i> PDF",

//             "titleAttr":"Esportar a PDF",

//             "className": "btn btn-danger"

//         },{

//             "extend": "csvHtml5",

//             "text": "<i class='fas fa-file-csv'></i> CSV",

//             "titleAttr":"Esportar a CSV",

//             "className": "btn btn-info"

//         }

//     ],

//     "resonsieve":"true",

//     "bDestroy": true,

//     "iDisplayLength": 10,

//     "order":[[0,"desc"]]  

// });





//End datatable



let tableAgricola;

let rowTable = ""; 

let divLoading = document.querySelector("#divLoading");

let bodytable = document.querySelector(".tbody");

document.addEventListener('DOMContentLoaded', function(){



    tableAgricola = $('#tableAgricola').dataTable( {

        "aProcessing":true,

        "aServerSide":true,

        "language": {

            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

        },

        "ajax":{

            "url": " "+base_url+"/agricola/getLeads",

            "dataSrc":""

        },

        "columns":[

            {"data":"fech_crea"},

            {"data":"est"},

            {"data":"usu_maq"},

            {"data":"usu_nom"},

            {"data":"usu_num"},

            {"data":"usu_city"},

            {"data":"usu_vendedor"},

            {"data":"usu_canal"},

            {"data":"usu_cmt"},

            {"data":"options"}

        ],

        'dom': 'lBfrtip',

        'buttons': [

            {

                "extend": "copyHtml5",

                "text": "<i class='far fa-copy'></i> Copiar",

                "titleAttr":"Copiar",

                "className": "btn btn-secondary"

            },{

                "extend": "excelHtml5",

                "text": "<i class='fas fa-file-excel'></i> Excel",

                "titleAttr":"Esportar a Excel",

                "className": "btn btn-success"

            },{

                "extend": "pdfHtml5",

                "text": "<i class='fas fa-file-pdf'></i> PDF",

                "titleAttr":"Esportar a PDF",

                "className": "btn btn-danger"

            },{

                "extend": "csvHtml5",

                "text": "<i class='fas fa-file-csv'></i> CSV",

                "titleAttr":"Esportar a CSV",

                "className": "btn btn-info"

            }

        ],

        "resonsieve":"true",

        "bDestroy": true,

        "iDisplayLength": 10,

        "order":[[0,"desc"]]  

    });



    if(document.querySelector("#formUsuario")){

        let formUsuario = document.querySelector("#formUsuario");

        formUsuario.onsubmit = function(e) {

            e.preventDefault();

            let usu_maq = document.querySelector('#usu_maq').value;

            let strNombre = document.querySelector('#usu_nom').value;

            let strEmail = document.querySelector('#usu_correo').value;

            let intTelefono = document.querySelector('#usu_num').value;

            let strCiudad = document.querySelector('#usu_city').value;

            let strCanal = document.querySelector('#usu_canal').value;

            let strVendedor = document.querySelector('#usu_vendedor').value;

            let strComentarios = document.querySelector('#usu_cmt').value;

            // let intStatus = document.querySelector('#est').value;



            if(strNombre == '' || strCiudad == '' || strCanal  == '')

            {

                swal("Atención", "Todos los campos son obligatorios." , "error");

                return false;

            }



            let elementsValid = document.getElementsByClassName("valid");

            for (let i = 0; i < elementsValid.length; i++) { 

                if(elementsValid[i].classList.contains('is-invalid')) { 

                    swal("Atención", "Por favor verifique los campos en rojo." , "error");

                    return false;

                } 

            } 

            divLoading.style.display = "flex";

            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            let ajaxUrl = base_url+'/Agricola/setLead'; 

            let formData = new FormData(formUsuario);

            request.open("POST",ajaxUrl,true);

            request.send(formData);

            request.onreadystatechange = function(){

                if(request.readyState == 4 && request.status == 200){

                    let objData = JSON.parse(request.responseText);

                    if(objData.status)

                    {

                        if(rowTable == ""){

                            tableAgricola.api().ajax.reload();

                        }else{

                            // htmlStatus = intStatus == 1 ? 

                            // '<span class="badge badge-success">Activo</span>' : 

                            // '<span class="badge badge-danger">Inactivo</span>';

                            // if(intStatus == 0) {

                            //     htmlStatus = intStatus;

                            //     intStatus = '<span class="badge badge-success">Canalizado</span>';

                            // }else if(intStatus == 1) {

                            //     htmlStatus = intStatus;

                            //     intStatus = '<span class="badge badge-success">No canalizado</span>';

                            // }else if(intStatus == 2) {

                            //     htmlStatus = intStatus;

                            //     intStatus = '<span class="badge badge-success">No viable</span>';

                            // }else if(intStatus == 3) {

                            //     htmlStatus = intStatus;

                            //     intStatus = '<span class="badge badge-success">Atendido</span>';

                            // }else if(intStatus == 4) {

                            //     htmlStatus = intStatus;

                            //     intStatus = '<span class="badge badge-success">En demo</span>';

                            // }else if(intStatus == 5) {

                            //     htmlStatus = intStatus;

                            //     intStatus = '<span class="badge badge-success">No compró</span>';

                            // }else if(intStatus == 6) {

                            //     htmlStatus = intStatus;

                            //     intStatus = '<span class="badge badge-success">Compró</span>';

                            // }

                            // rowTable.cells[1].textContent = strFecha;

                            // rowTable.cells[1].textContent = intStatus;

                            // rowTable.cells[2].innerHTML = htmlStatus;

                            rowTable.cells[2].textContent = strNombre;

                            rowTable.cells[3].textContent = intTelefono;

                            rowTable.cells[4].textContent = strCiudad;

                            rowTable.cells[5].textContent = strVendedor;

                            rowTable = ""; 

                        }

                    

                        $('#modalFormUsuario').modal("hide");

                        formUsuario.reset();

                        swal("Agricola", objData.msg ,"success");

                    }else{

                        swal("Error", objData.msg , "error");

                    }

                }

                divLoading.style.display = "none";

                return false;

            }

        }

    }

   

},false);









// window.addEventListener('load', function() {

//     fntStatusLead();

// }, false);



// function fntStatusLead(){

// if(document.querySelector('#est')){

//     let ajaxUrl = base_url+'/dji/getSelectStatus';

//     let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

//     request.open("GET",ajaxUrl,true);

//     request.send();

//     request.onreadystatechange = function(){

//         if(request.readyState == 4 && request.status == 200){

//             document.querySelector('#est').innerHTML = request.responseText;

//             $('#est').selectpicker('render');

//         }

//     }

// }

// }





















//Inicio funciones





function fntViewInfo(iddatos){

    let request = (window.XMLHttpRequest) ? 

                    new XMLHttpRequest() : 

                    new ActiveXObject('Microsoft.XMLHTTP');

    let ajaxUrl = base_url+'/agricola/getDatos/'+iddatos;

    request.open("GET",ajaxUrl,true);

    request.send();

    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){

            let objData = JSON.parse(request.responseText);

            if(objData.status)

            {

                let objMesaje = objData.data;

                document.querySelector("#txtEquipo").innerHTML = objMesaje.usu_maq;

                document.querySelector("#txtStatus").innerHTML = objMesaje.est;

                document.querySelector("#txtNombre").innerHTML = objMesaje.usu_nom;

                document.querySelector("#txtCorreo").innerHTML = objMesaje.usu_correo;

                document.querySelector("#txtTelefono").innerHTML = objMesaje.usu_num;

                document.querySelector("#txtCiudad").innerHTML = objMesaje.usu_city;

                // document.querySelector("#txtHectareas").innerHTML = objMesaje.usu_hec;

                // document.querySelector("#txtCultivo").innerHTML = objMesaje.usu_cultivo;

                document.querySelector("#txtCampania").innerHTML = objMesaje.usu_canal;

                document.querySelector("#txtVendedor").innerHTML = objMesaje.usu_vendedor;

                document.querySelector("#txtComentarios").innerHTML = objMesaje.usu_cmt;

                $('#modalViewAgricola').modal('show');

            }else{

                swal("Error", objData.msg , "error");

            }

        }

    } 

}







function fntEditLead(element,idlead){

    rowTable = element.parentNode.parentNode.parentNode; 

    document.querySelector('#titleModal').innerHTML ="Actualizar Lead";

    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");

    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");

    document.querySelector('#btnText').innerHTML ="Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    let ajaxUrl = base_url+'/agricola/getDatos/'+idlead;

    request.open("GET",ajaxUrl,true);

    request.send();

    request.onreadystatechange = function(){



        if(request.readyState == 4 && request.status == 200){

            let objData = JSON.parse(request.responseText);



            if(objData.status)

            {

                document.querySelector("#usu_id").value = objData.data.usu_id;

                document.querySelector("#usu_maq").value = objData.data.usu_maq;

                document.querySelector("#usu_nom").value = objData.data.usu_nom;

                document.querySelector("#usu_correo").value = objData.data.usu_correo;

                document.querySelector("#usu_num").value = objData.data.usu_num;

                // document.querySelector("#est").value = objData.data.est;

                // $('#est').selectpicker('render');

                document.querySelector("#usu_city").value = objData.data.usu_city;

                // document.querySelector("#usu_cultivo").value = objData.data.usu_cultivo;

                // document.querySelector("#usu_hec").value =objData.data.usu_hec;

                document.querySelector("#usu_canal").value =objData.data.usu_canal;

                document.querySelector("#usu_vendedor").value =objData.data.usu_vendedor;

                document.querySelector("#usu_cmt").value =objData.data.usu_cmt;





                // if(objData.data.status == 1){

                //     document.querySelector("#listStatus").value = 1;

                // }else{

                //     document.querySelector("#listStatus").value = 2;

                // }

                // $('#listStatus').selectpicker('render');

            }

        }

    

        $('#modalFormUsuario').modal('show');

    }

}





function startStatus(idlead){

    swal({

        title: "Iniciar atención",

        text: "¿Estás seguro de atender al cliente?",

        icon: "success",

        buttons: ["No, cancelar","Si, contactar"],

        successMode: true,

        

    }).then((willDelete) => {

        if (willDelete) {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'agricola/startAgricola/';

            var strData = "usu_id="+idlead;

            request.open("POST",ajaxUrl,true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)

                    {   

                        swal("Usuario atendido", objData.msg , "success");

                        tableAgricola.api().ajax.reload();

                    }else{

                        swal("Atención!", objData.msg , "error");

                    }

                }

            }

          

        } 

      });

}



function canalizarStatus(idlead){

    swal({

        title: "Canalizar",

        text: "Canalización iniciada",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,

        

    }).then(function() {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'agricola/canalizarAgricola/';

            var strData = "usu_id="+idlead;

            request.open("POST",ajaxUrl,true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)

                    {   

                        // swal("Usuario canalizado", objData.msg , "success");

                        tableAgricola.api().ajax.reload();

                    }else{

                        swal("Atención!", objData.msg , "error");

                    }

                }

            }

          

      });

}





function atenderStatus(idlead){

    swal({

        title: "Atender Lead",

        text: "¿Estás seguro de contactar al cliente?",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,

        

    }).then(function() {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'agricola/atenderAgricola/';

            var strData = "usu_id="+idlead;

            request.open("POST",ajaxUrl,true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)

                    {   

                        // swal("Usuario Atendido", objData.msg , "success");

                        tableAgricola.api().ajax.reload();

                    }else{

                        swal("Atención!", objData.msg , "error");

                    }

                }

            }

          

      });

}



function demoStatus(idlead){

    swal({

        title: "Agendar demostración",

        text: "Cita agendada",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,

        

    }).then(function() {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'agricola/demoAgricola/';

            var strData = "usu_id="+idlead;

            request.open("POST",ajaxUrl,true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)

                    {   

                        // swal("Demostración agendada", objData.msg , "success");

                        tableAgricola.api().ajax.reload();

                    }else{

                        swal("Atención!", objData.msg , "error");

                    }

                }

            }

          

      });

}





function cotizarStatus(idlead){

    swal({

        title: "Cotización",

        text: "Cotización enviada correctamente",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,

        

    }).then(function() {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'agricola/cotizarAgricola/';

            var strData = "usu_id="+idlead;

            request.open("POST",ajaxUrl,true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)

                    {   

                        // swal("Cotización enviada correctamente", objData.msg , "success");

                        tableAgricola.api().ajax.reload();

                    }else{

                        swal("Atención!", objData.msg , "error");

                    }

                }

            }

          

      });

}



function comprarStatus(idlead){

    swal({

        title: "Compra",

        text: "El cliente realizó su compra",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,

        

    }).then(function() {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'agricola/comprarAgricola/';

            var strData = "usu_id="+idlead;

            request.open("POST",ajaxUrl,true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if(request.readyState == 4 && request.status == 200){

                    var objData = JSON.parse(request.responseText);

                    if(objData.status)

                    {   

                        // swal("Solicitud de compra correctamente", objData.msg , "success");

                        tableAgricola.api().ajax.reload();

                    }else{

                        swal("Atención!", objData.msg , "error");

                    }

                }

            }

          

      });

}





function offStatus(idlead){

    swal({

                title: "Finalizar seguimiento",

                text: "¿Realmente quieres finalizar el segumiento de este lead?",

                icon: "warning",

                buttons: ["No, cancelar","Si, finalizar"],

                dangerMode: true,

                

            }).then((willDelete) => {

                if (willDelete) {

                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

                    var ajaxUrl = base_url + 'dji/offDji/';

                    var strData = "usu_id="+idlead;

                    request.open("POST",ajaxUrl,true);

                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    request.send(strData);

                    request.onreadystatechange = function () {

                        if(request.readyState == 4 && request.status == 200){

                            var objData = JSON.parse(request.responseText);

                            if(objData.status)

                            {   

                                swal("Seguimiento finalizado", objData.msg , "success");

                                tableDji.api().ajax.reload();

                            }else{

                                swal("Atención!", objData.msg , "error");

                            }

                        }

                    }

                  

                } 

              });

}





function fntDelUsuario(idlead){

    swal({

                title: "Eliminar Perfil",

                text: "¿Realmente quiere eliminar este usuario?",

                icon: "warning",

                buttons: ["No, cancelar","Si, eliminar"],

                dangerMode: true,

                

            }).then((willDelete) => {

                if (willDelete) {

                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

                    var ajaxUrl = base_url + 'Agricola/delAgricola/';

                    var strData = "usu_id="+idlead;

                    request.open("POST",ajaxUrl,true);

                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    request.send(strData);

                    request.onreadystatechange = function () {

                        if(request.readyState == 4 && request.status == 200){

                            var objData = JSON.parse(request.responseText);

                            if(objData.status)

                            {   

                                swal("Usuario eliminado", objData.msg , "success");

                                tableAgricola.api().ajax.reload();

                            }else{

                                swal("Atención!", objData.msg , "error");

                            }

                        }

                    }

                  

                } 

              });

}









function openModal()

{

    rowTable = "";

    document.querySelector('#usu_id').value ="";

    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");

    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");

    document.querySelector('#btnText').innerHTML ="Guardar";

    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";

    document.querySelector("#formUsuario").reset();

    $('#modalFormUsuario').modal('show');

}