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



let tableServicio;

let rowTable = "";

let divLoading = document.querySelector("#divLoading");

let bodytable = document.querySelector(".tbody");

document.addEventListener('DOMContentLoaded', function () {



    tableServicio = $('#tableServicio').dataTable({

        "aProcessing": true,

        "aServerSide": true,

        "language": {

            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

        },

        "ajax": {

            "url": " " + base_url + "/servicio/getLeads",

            "dataSrc": ""

        },

        "columns": [

            { "data": "fech_crea" },

            { "data": "est" },

            { "data": "usu_fac" },

            { "data": "usu_jdl" },

            { "data": "usu_suc" },

            { "data": "usu_nom" },

            { "data": "usu_tel" },

            { "data": "usu_ciu" },

            { "data": "usu_ser" },

            { "data": "usu_mod" },

            { "data": "usu_div" },

            { "data": "usu_vendedor" },

            { "data": "usu_desc" },

            { "data": "usu_com" },

            { "data": "usu_sub" },

            { "data": "options" }

        ],

        'dom': 'lBfrtip',

        'buttons': [

            {

                "extend": "copyHtml5",

                "text": "<i class='far fa-copy'></i> Copiar",

                "titleAttr": "Copiar",

                "className": "btn btn-secondary"

            }, {

                "extend": "excelHtml5",

                "text": "<i class='fas fa-file-excel'></i> Excel",

                "titleAttr": "Esportar a Excel",

                "className": "btn btn-success"

            }, {

                "extend": "pdfHtml5",

                "text": "<i class='fas fa-file-pdf'></i> PDF",

                "titleAttr": "Esportar a PDF",

                "className": "btn btn-danger"

            }, {

                "extend": "csvHtml5",

                "text": "<i class='fas fa-file-csv'></i> CSV",

                "titleAttr": "Esportar a CSV",

                "className": "btn btn-info"

            }

        ],

        "resonsieve": "true",

        "bDestroy": true,

        "iDisplayLength": 10,

        "order": [[0, "desc"]]

    });



    if (document.querySelector("#formServicio")) {

        let formUsuario = document.querySelector("#formServicio");

        formUsuario.onsubmit = function (e) {

            e.preventDefault();

            let strid = document.querySelector('#usu_id').value;

            let strVendedorCopia = document.querySelector('#usu_vendedor_copia').value;

           // let strfactura = document.querySelector('#usu_fac').value;

           // let strjdl = document.querySelector('#usu_jdl').value;

           // let strSucursal = document.querySelector('#usu_suc').value;

            let strNombre = document.querySelector('#usu_nom').value;

            let intTelefono = document.querySelector('#usu_tel').value;

            let strCorreo= document.querySelector('#usu_cor').value;

           // let strEmail = document.querySelector('#usu_correo').value;

            

            let strCiudad = document.querySelector('#usu_ciu').value;

           // let strHectareas = document.querySelector('#usu_hec').value;

           // let strCanal = document.querySelector('#landing_page').value;

            let strVendedor = document.querySelector('#usu_vendedor').value;

           // let strComentarios = document.querySelector('#usu_cmt').value;

            // let intStatus = document.querySelector('#est').value;



            if (strNombre == '' || strCiudad == '' || intTelefono == '' || strCorreo == '') {

                swal("Atención", "Todos los campos son obligatorios.", "error");

                return false;

            }



            let elementsValid = document.getElementsByClassName("valid");

            for (let i = 0; i < elementsValid.length; i++) {

                if (elementsValid[i].classList.contains('is-invalid')) {

                    swal("Atención", "Por favor verifique los campos en rojo.", "error");

                    return false;

                }

            }

            divLoading.style.display = "flex";

            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            let ajaxUrl = base_url + '/Servicio/setLead';

            let formData = new FormData(formUsuario);

            request.open("POST", ajaxUrl, true);

            request.send(formData);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {

                    let objData = JSON.parse(request.responseText);

                    if (objData.status) {

                        console.log(rowTable);
                        if (rowTable == "") {




                            //alert("hola");

                            // window.location.reload()

                           // tableServicio.api().ajax.reload();

                        } else {

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

                           // rowTable.cells[5].textContent = strVendedor;

                            rowTable = "";

                        }

                        if (!strid == "") { // si el campo id no esta vacio, 
                            console.log(strVendedor);

                            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

                            let ajaxUrl = base_url + '/servicio/getDatos/' + strid;

                            request.open("GET", ajaxUrl, true);

                            request.send();

                            request.onreadystatechange = function () {
                                // valida si es correcto la consulta
                                if (request.readyState == 4 && request.status == 200) {

                                    let objData = JSON.parse(request.responseText);

                                    if (objData.status) { // si el arreglo se ejecutó 

                                        //let maquina = objData.data.usu_maq;

                                        let nombre = objData.data.usu_vendedor; // nombre del vendedor

                                        let correo = objData.data.email_user;

                                        let id_vendedor = objData.data.usu_asig;

                                        if (strVendedorCopia != id_vendedor) {

                                            //alert("son distintos" + strVendedorCopia + id_vendedor);

                                            //enviar correo al vendedor registrado

                                            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

                                            let ajaxUrl = base_url + 'Libraries/phpmailer/enviar.php?datosServicio=' + nombre + '&' + 'correo=' + correo + '&NomCli='+strNombre+'&CiuClie='+strCiudad;

                                            request.open("GET", ajaxUrl, true);

                                            request.send();
                                            request.onreadystatechange = function () {
                                                // valida si es correcto la consulta
                                                if (request.readyState == 4 && request.status == 200) {

                                                    let objDataCorreo = JSON.parse(request.responseText);

                                                    if (objDataCorreo.status == true) { // si hubo algun error al enviar el correo
                                                        swal("Servicio", objDataCorreo.msg, "success");
                                                    } else {
                                                        swal("Error", objDataCorreo.msg, "error");
                                                    }




                                                }

                                            }


                                        }

                                    }


                                }

                            }
                        }     /* else 
                        
                        { // si el campo id esta vaco es porque es un nuevo lead, y se enviara un correo de bienvenida.

                            if (strEmail == "") { // se valida si el campo correo viene vacio, ya que necesitamos a fuerza el correo del cliente para enviarle la informacion
                                alert("sin correo electronico, no se puede enviar");

                            } else {


                                let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

                                let ajaxUrl = base_url + 'Libraries/phpmailer/enviar.php?datosCliente=' + strNombre + '&' + 'correo=' + strEmail;

                                request.open("GET", ajaxUrl, true);

                                request.send();
                                request.onreadystatechange = function () {
                                    // valida si es correcto la consulta
                                    if (request.readyState == 4 && request.status == 200) {

                                        let objDataCorreo = JSON.parse(request.responseText);

                                        if (objDataCorreo.status == true) { // si hubo algun error al enviar el correo
                                            swal("Dji", objDataCorreo.msg, "success");
                                        } else {
                                            swal("Error", objDataCorreo.msg, "error");
                                        }




                                    }

                                }


                                alert(strEmail, strNombre);
                            }

                        } */



                        $('#modalFormServicio').modal("hide");

                        formServicio.reset();

                        swal("Servicio", objData.msg, "success");
                        tableServicio.api().ajax.reload();
                        //window.location.reload();





                    } else {

                        swal("Error", objData.msg, "error");

                    }

                }

                divLoading.style.display = "none";

                return false;

            }

        }

    }



}, false);









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





function fntViewInfo(iddatos) { 

    let request = (window.XMLHttpRequest) ?

        new XMLHttpRequest() :

        new ActiveXObject('Microsoft.XMLHTTP');

    let ajaxUrl = base_url + '/servicio/getDatos/' + iddatos; 

    request.open("GET", ajaxUrl, true);

    request.send();

    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {

            let objData = JSON.parse(request.responseText);

            if (objData.status) {

                let objMesaje = objData.data;

               

                document.querySelector("#txtStatus").innerHTML = objMesaje.est;

                document.querySelector("#txtNombre").innerHTML = objMesaje.usu_nom;

                document.querySelector("#txtCorreo").innerHTML = objMesaje.usu_cor;

                document.querySelector("#txtTelefono").innerHTML = objMesaje.usu_tel;

                document.querySelector("#txtCiudad").innerHTML = objMesaje.usu_ciu;

                document.querySelector("#txtserie").innerHTML = objMesaje.usu_ser;

                document.querySelector("#txtModelo").innerHTML = objMesaje.usu_mod;

                document.querySelector("#txtDivision").innerHTML = objMesaje.usu_div;

                document.querySelector("#txtVendedor").innerHTML = objMesaje.usu_vendedor;

                document.querySelector("#txtComentarios").innerHTML = objMesaje.usu_com;

                $('#modalViewServicio').modal('show');

            } else {

                swal("Error", objData.msg, "error");

            }

        }

    }

}


// funcion para cargar los datos de los vendedores en el modal 'Nuevo lead'

window.addEventListener('load', function () {

    fntCargarVendedores();

}, false);


function fntCargarVendedores() {

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    let ajaxUrl = base_url + '/servicio/DatosVendedores/';

    request.open("GET", ajaxUrl, true);

    request.send();
    request.onreadystatechange = function () {
        // valida si es correcto la consulta
        if (request.readyState == 4 && request.status == 200) {

            document.querySelector('#usu_vendedor').innerHTML = request.responseText;



        }

    }


}









function fntEditLead(element, idlead) {

    rowTable = element.parentNode.parentNode.parentNode;

    document.querySelector('#titleModal').innerHTML = "Actualizar datos";

    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");

    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");

    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    let ajaxUrl = base_url + '/servicio/getDatos/' + idlead;

    request.open("GET", ajaxUrl, true);

    request.send();

    request.onreadystatechange = function () {



        if (request.readyState == 4 && request.status == 200) {

            let objData = JSON.parse(request.responseText);



            if (objData.status) {
                console.log(objData);

              //  return false;

                document.querySelector("#usu_id").value = objData.data.usu_id;

                document.querySelector("#usu_vendedor_copia").value = objData.data.usu_asig;

                document.querySelector("#usu_fac").value = objData.data.usu_fac;

                document.querySelector("#usu_suc").value = objData.data.usu_suc;

                document.querySelector("#usu_jdl").value = objData.data.usu_jdl;

                document.querySelector("#usu_nom").value = objData.data.usu_nom;

                document.querySelector("#usu_tel").value = objData.data.usu_tel;

                // document.querySelector("#est").value = objData.data.est;

                // $('#est').selectpicker('render');

                document.querySelector("#usu_cor").value = objData.data.usu_cor;

                document.querySelector("#usu_dir").value = objData.data.usu_dir;

                document.querySelector("#usu_ciu").value = objData.data.usu_ciu;

                document.querySelector("#usu_est").value = objData.data.usu_est;

                document.querySelector("#usu_ser").value = objData.data.usu_ser;

                document.querySelector("#usu_mod").value = objData.data.usu_mod;

                document.querySelector("#usu_div").value = objData.data.usu_div;

                document.querySelector("#usu_com").value = objData.data.usu_com;

                document.querySelector("#usu_sub").value = objData.data.usu_sub;

                document.querySelector("#usu_desc").value = objData.data.usu_desc;


                 document.querySelector("#usu_vendedor").value = objData.data.usu_asig;

               // document.querySelector("#usu_vendedor").value = objData.data.usu_asig; // input de respaldo para validar los cambios de vendedor

                //var select = document.getElementById("usu_vendedor");
                //select.value = objData.data.usu_asig; // para seleccionar el item de select

                // $('#usu_vendedor').val(objData.data.usu_vendedor);

                //alert(objData.data.usu_vendedor);

                //document.querySelector("#usu_cmt").value = objData.data.usu_cmt;



                //var nombre = objData.data.usu_nom;

                // funcion para traer los datos desde de los vendedores desde la bd






                ////////////////////////////////////////////////////////////////////////////////////










                // if(objData.data.status == 1){

                //     document.querySelector("#listStatus").value = 1;

                // }else{

                //     document.querySelector("#listStatus").value = 2;

                // }

                // $('#listStatus').selectpicker('render');

            }

        }



        $('#modalFormServicio').modal('show');

    }

}





function startStatus(idlead) {

    swal({

        title: "Iniciar atención",

        text: "¿Estás seguro de atender al cliente?",

        icon: "success",

        buttons: ["No, cancelar", "Si, contactar"],

        successMode: true,



    }).then((willDelete) => {

        if (willDelete) {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'servicio/startServicio/';

            var strData = "usu_id=" + idlead;

            request.open("POST", ajaxUrl, true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {

                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {

                        swal("Usuario atendido", objData.msg, "success");

                        tableServicio.api().ajax.reload();

                    } else {

                        swal("Atención!", objData.msg, "error");

                    }

                }

            }



        }

    });

}



function canalizarStatus(idlead) {

    swal({

        title: "Canalizar",

        text: "Canalización iniciada",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,



    }).then(function () {

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = base_url + 'servicio/canalizarServicio/';

        var strData = "usu_id=" + idlead;

        request.open("POST", ajaxUrl, true);

        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.send(strData);

        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);

                if (objData.status) {

                    // swal("Usuario canalizado", objData.msg , "success");

                    tableServicio.api().ajax.reload();

                } else {

                    swal("Atención!", objData.msg, "error");

                }

            }

        }



    });

}





function atenderStatus(idlead) {

    swal({

        title: "Atender Lead",

        text: "¿Estás seguro de contactar al cliente?",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,



    }).then(function () {

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = base_url + 'servicio/atenderServicio/';

        var strData = "usu_id=" + idlead;

        request.open("POST", ajaxUrl, true);

        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.send(strData);

        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);

                if (objData.status) {

                    // swal("Usuario Atendido", objData.msg , "success");

                    tableServicio.api().ajax.reload();

                } else {

                    swal("Atención!", objData.msg, "error");

                }

            }

        }



    });

}



function demoStatus(idlead) {

    swal({

        title: "Agendar demostración",

        text: "Cita agendada",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,



    }).then(function () {

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = base_url + 'servicio/demoServicio/';

        var strData = "usu_id=" + idlead;

        request.open("POST", ajaxUrl, true);

        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.send(strData);

        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);

                if (objData.status) {

                    // swal("Demostración agendada", objData.msg , "success");

                    tableServicio.api().ajax.reload();

                } else {

                    swal("Atención!", objData.msg, "error");

                }

            }

        }



    });

}





function negociarStatus(idlead) {

    swal({

        title: "Negociación",

        text: "Negociación registrada correctamente",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,



    }).then(function () {

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = base_url + 'servicio/negociarServicio/';

        var strData = "usu_id=" + idlead;

        request.open("POST", ajaxUrl, true);

        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.send(strData);

        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);

                if (objData.status) {

                    // swal("Cotización enviada correctamente", objData.msg , "success");

                    tableServicio.api().ajax.reload();

                } else {

                    swal("Atención!", objData.msg, "error");

                }

            }

        }



    });

}



function comprarStatus(idlead) {

    swal({

        title: "Compra",

        text: "El cliente realizó su compra",

        icon: "success",

        buttons: false,

        showConfirmButton: false,

        showCancelButton: false,

        timer: 2500,

        successMode: true,



    }).then(function () {

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = base_url + 'Servicio/comprarServicio/';

        var strData = "usu_id=" + idlead;

        request.open("POST", ajaxUrl, true);

        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.send(strData);

        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);

                if (objData.status) {

                    // swal("Solicitud de compra correctamente", objData.msg , "success");

                    tableServicio.api().ajax.reload();

                } else {

                    swal("Atención!", objData.msg, "error");

                }

            }

        }



    });

}





function offStatus(idlead) {

    swal({

        title: "Finalizar seguimiento",

        text: "¿Realmente quieres finalizar el segumiento de este lead?",

        icon: "warning",

        buttons: ["No, cancelar", "Si, finalizar"],

        dangerMode: true,



    }).then((willDelete) => {

        if (willDelete) {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'servicio/offServicio/';

            var strData = "usu_id=" + idlead;

            request.open("POST", ajaxUrl, true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {

                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {

                        swal("Seguimiento finalizado", objData.msg, "success");

                        tableServicio.api().ajax.reload();

                    } else {

                        swal("Atención!", objData.msg, "error");

                    }

                }

            }



        }

    });

}



function onStatus(idlead) {

    swal({

        title: "Continuar seguimiento",

        text: "¿Realmente quieres continuar el segumiento de este lead?",

        icon: "warning",

        buttons: ["No, cancelar", "Si, Continuar"],





    }).then((willDelete) => {

        if (willDelete) {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'servicio/onServicio/';

            var strData = "usu_id=" + idlead;

            request.open("POST", ajaxUrl, true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {

                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {

                        swal("Seguimiento Iniciado", objData.msg, "success");

                        tableServicio.api().ajax.reload();

                    } else {

                        swal("Atención!", objData.msg, "error");

                    }

                }

            }



        }

    });

}





function fntDelUsuario(idlead) {

    swal({

        title: "Eliminar Perfil",

        text: "¿Realmente quiere eliminar este usuario?",

        icon: "warning",

        buttons: ["No, cancelar", "Si, eliminar"],

        dangerMode: true,



    }).then((willDelete) => {

        if (willDelete) {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            var ajaxUrl = base_url + 'servicio/delServicio/';

            var strData = "usu_id=" + idlead;

            request.open("POST", ajaxUrl, true);

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.send(strData);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {

                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {

                        swal("Usuario eliminado", objData.msg, "success");

                        tableServicio.api().ajax.reload();

                    } else {

                        swal("Atención!", objData.msg, "error");

                    }

                }

            }



        }

    });

}









function openModal() {

    rowTable = "";

    document.querySelector('#usu_id').value = "";

    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");

    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");

    document.querySelector('#btnText').innerHTML = "Guardar";

    document.querySelector('#titleModal').innerHTML = "Nuevo servicio";

    document.querySelector("#formServicio").reset();

    $('#modalFormServicio').modal('show');

}





function manualAyuda() {

    rowTable = "";

    document.querySelector('#usu_id').value = "";

    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");

    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");

    document.querySelector('#btnText').innerHTML = "Guardar";

    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";

    document.querySelector("#formUsuario").reset();

    $('#modalFormUsuario').modal('show');

}