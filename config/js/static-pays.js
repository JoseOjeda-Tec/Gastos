function muestraAnios(className, anio = 0){

    ajax(
        'POST', 
        '../../controller/years-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            var html = "";

            response.forEach(element => { 
                html += "<option value=\"" + element["id_year"] + "\"" + (element["id_year"] == anio || element["anio"] == anio ? " selected" : "") + ">" + element["anio"] + "</option>";
            });

            const slcsnio = document.querySelector(className);
            slcsnio.innerHTML = html;
        }, 
        { accion: 'getYears' }
    );

}

function muestraBancos(className, banco = 0){

    ajax(
        'POST', 
        '../../controller/banks-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            var html = "";

            response.forEach(element => { 
                html += "<option value=\"" + element["id_bank"] + "\"" + (element["id_bank"] == banco ? " selected" : "") + ">" + element["descripcion"] + "/" + element["tipo"] + "</option>"; 
            });

            const slcsnio = document.querySelector(className);
            slcsnio.innerHTML = html;
        }, 
        { accion: 'getBanks' }
    );

}

function setStaticPays(){

    const desc = document.querySelector("#descripcion");
    const classColor = document.querySelector("#color-selec");
    const monto = document.querySelector("#monto");
    const dia_ven = document.querySelector("#dia-ven");
    const bank = document.querySelector("#form-bank");
    const meses = document.querySelector("#form-meses");
    const anios = document.querySelector("#form-anios");

    var parametros = {
        'accion' : 'setStaticPays',
        'desc' : desc.value,
        'class_color' : classColor.value,
        'monto' : monto.value,
        'dia_venc' : dia_ven.value,
        'bank' : bank.value,
        'mes' : meses.value,
        'anio' : anios.value
    };

    ajax(
        'POST', 
        '../../controller/static-pays-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            if(response["respuesta"] == 1){
                console.log(response["mensaje"]);
                filterStaticPays();
                limpiarCampos();
            }
        }, 
        parametros 
    );

}

function asignaAccionBoton(){

    const btnpay = document.querySelector("#btn-save-pay");
    const btnedit = document.querySelector("#btn-edit-pay");
    const btnclean = document.querySelector("#btn-clean-pay");
    const btnfilter = document.querySelector("#btn-filter-pay");

    btnpay.addEventListener("click", ()=>{ setStaticPays(); });
    btnedit.addEventListener("click", ()=>{ updateStaticPays(); });
    btnclean.addEventListener("click", ()=>{ limpiarCampos(); });
    btnfilter.addEventListener("click", ()=>{ filterStaticPays(); });

    btnedit.style = "display: none;";

}

function asignaSelects(){

    var datecomplete = new  Date();
    var fullyear = datecomplete.getFullYear();
    var mesActual = datecomplete.getMonth() + 1;

    cargaMesesSelect("#form-meses");
    cargaMesesSelect("#meses", completeMonth(mesActual));
    muestraAnios("#form-anios");
    muestraAnios("#anios", fullyear);
    muestraBancos("#form-bank");
    muestraBancos("#bank");
}

function filterStaticPays(year_value = 0){

    const bank = document.querySelector("#bank");
    const meses = document.querySelector("#meses");
    const anios = document.querySelector("#anios");

    const datecomplete = new  Date();
    const fullyear = datecomplete.getFullYear();

    ajax(
        'POST', 
        '../../controller/static-pays-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            var html = "";

            if(Object.entries(response).length == 0){
                html += "<div class=\"card-item-pago-fijo\">";
                    html += "<div class=\"sup-content-card\">";
                        html += "<div class=\"info-item\"><h5>No hay registros que mostrar</h5></div>";
                    html += "</div>";
                html += "</div>";
            }else{
                response.forEach(element => { 
                    html += "<div class=\"card-item-pago-fijo\">";
                        html += "<div class=\"sup-content-card\">";
                            html += "<div class=\"desc-item desc-item-" + element["id_static_pays"] + " btn-color-" + element["class_color"] + "\"><h5>" + element["descripcion"] + " (Banco " + element["desc_bank"] + "/" + element["tipo_bank"] + ")</h5></div>";
                            html += "<div class=\"monto-item monto-item-" + element["id_static_pays"] + "\"><h5>$" + element["Monto"] + "</h5></div>";
                        html += "</div>";
                        html += "<div class=\"down-content-card\">";
                            html += "<div class=\"estado-item estado-item-" + element["id_static_pays"] + " estado-" + (element["estado"] == 0 ? "deuda" : "pagado") + "\"><h5>" + (element["estado"] == 0 ? "DEUDA" : "PAGADO") + "</h5></div>";
                            html += "<div class=\"vencimiento-item vencimiento-item-" + element["id_static_pays"] + "\"><h5>Ven.: " + element["dia_vencimiento"] + "-" + element["mes"] + "-" + element["desc_year"] + "</h5></div>";
                            html += "<div class=\"fecha-pago-item fecha-pago-item-" + element["id_static_pays"] + "\"><h5>Pag.: " + (element["fecha_pago"] == 0 ? "00-00-0000" : element["fecha_pago"]) + "</h5></div>";
                            html += "<div class=\"opc-item\">";
                                html += "<button type=\"button\" class=\"" + (element["estado"] == 0 ? "pagando" : "cancel-pay") + "-btn btn-opc-item\" onclick=\"cambiarEstado(" + element["id_static_pays"] + ", " + (element["estado"] == 0 ? 1 : 0) + ")\">";
                                html += element["estado"] == 0 ? "<i class=\"fa-solid fa-money-bill-1\"></i></button>" : "<i class=\"fa-solid fa-rectangle-xmark\"></i>" ;
                                html += "<button type=\"button\" class=\"edit-btn btn-opc-item\" onclick=\"cargaDataParaEdit(" + element["id_static_pays"] + ")\"><i class=\"fa-solid fa-pen\"></i></button>";
                                html += "<button type=\"button\" class=\"delete-btn btn-opc-item\"><i class=\"fa-solid fa-xmark\"></i></button>";
                            html += "</div>";
                        html += "</div>";
                    html += "</div>";
                });
            }
            
            const cntpagofijo = document.querySelector(".pagos-fijos");
            cntpagofijo.innerHTML = "";
            cntpagofijo.innerHTML = html;
        }, 
        { accion: 'getStaticPaysDetail', "bank" : (year_value == 1 ? "1" : bank.value), "meses" : meses.value, "anios" : (year_value == 1 ? fullyear : anios.value) }
    );

}

function cambiarEstado(id_static_pays, estado){

    ajax(
        'POST', 
        '../../controller/static-pays-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            if(response["respuesta"] == 1){
                console.log(response["mensaje"]);
                filterStaticPays();
            }
        }, 
        { accion: 'updateState', "id_static_pays" : id_static_pays, "estado" : estado }
    );

}

function seleccionColor(classColor){

    const colorActive = document.querySelector("#color-selec");

    colorActive.value = classColor;
    var arrayColor = ["yellow", "blue", "gray", "green", "orange", "black", "dark-blue", "purple"];
    arrayColor.forEach(element => { 
        const btnColor = document.querySelector(".btn-color-" + element);
        if(element == classColor){ btnColor.innerHTML = "<i class=\"fa-solid fa-check\"></i>"; }
        else{ btnColor.innerHTML = ""; }
    });

}

function cargaDataParaEdit(id){

    const desc = document.querySelector("#descripcion");
    const classColor = document.querySelector("#color-selec");
    const monto = document.querySelector("#monto");
    const dia_ven = document.querySelector("#dia-ven");
    const id_edit = document.querySelector("#id-edit");
    const btnpay = document.querySelector("#btn-save-pay");
    const btnedit = document.querySelector("#btn-edit-pay");

    ajax(
        'POST', 
        '../../controller/static-pays-controller.php', 
        (xhr) => {

            var response = JSON.parse(xhr.responseText);

            response.forEach(element => { 
                id_edit.value = element["id_static_pays"];
                desc.value = element["descripcion"];
                monto.value = element["Monto"];
                dia_ven.value = element["dia_vencimiento"];

                cargaMesesSelect("#form-meses", element["mes"]);
                muestraAnios("#form-anios", element["anio"]);
                muestraBancos("#form-bank", element["id_bank"]);

                classColor.value = element["class_color"];
                seleccionColor(element["class_color"]);
                btnpay.style = "display: none;";
                btnedit.style = "display: block;";
            });

        }, 
        { accion: 'getStaticPay', "id" : id }
    );

}

function limpiarCampos(){

    const desc = document.querySelector("#descripcion");
    const classColor = document.querySelector("#color-selec");
    const monto = document.querySelector("#monto");
    const dia_ven = document.querySelector("#dia-ven");
    const id_edit = document.querySelector("#id-edit");
    const btnpay = document.querySelector("#btn-save-pay");
    const btnedit = document.querySelector("#btn-edit-pay");

    cargaMesesSelect("#form-meses");
    muestraAnios("#form-anios");
    muestraBancos("#form-bank");
    seleccionColor("0");

    desc.value = "";
    classColor.value = "";
    monto.value = "";
    dia_ven.value = "";
    id_edit.value = "";
    btnpay.style = "display: block;";
    btnedit.style = "display: none;";

}

function updateStaticPays(){

    const id_edit = document.querySelector("#id-edit");
    const desc = document.querySelector("#descripcion");
    const classColor = document.querySelector("#color-selec");
    const monto = document.querySelector("#monto");
    const dia_ven = document.querySelector("#dia-ven");
    const bank = document.querySelector("#form-bank");
    const meses = document.querySelector("#form-meses");
    const anios = document.querySelector("#form-anios");

    var parametros = {
        'accion' : 'updateStaticPays',
        'id_edit' : id_edit.value,
        'desc' : desc.value,
        'class_color' : classColor.value,
        'monto' : monto.value,
        'dia_venc' : dia_ven.value,
        'bank' : bank.value,
        'mes' : meses.value,
        'anio' : anios.value
    };

    ajax(
        'POST', 
        '../../controller/static-pays-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            if(response["respuesta"] == 1){
                console.log(response["mensaje"]);
                filterStaticPays();
                limpiarCampos();
            }
        }, 
        parametros 
    );

}