function ajax(type, url, fn = () => {}, dataJson) {
    
    var xhr = new XMLHttpRequest();

    xhr.open(type, url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            
            fn(xhr);

        } else { 
            console.error('Error en la petición:', xhr.statusText); 
        }
    };

    xhr.onerror = () => {  console.error('Error de red'); };

    var data = JSON.stringify(dataJson);
    xhr.send(data);

}

function ajaxReturn(type, url, fn = () => {}, dataJson) {
    
    var xhr = new XMLHttpRequest();
    var returnData = "";

    xhr.open(type, url, false);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onerror = () => {  console.error('Error de red'); };

    var data = JSON.stringify(dataJson);
    xhr.send(data);

    if (xhr.status >= 200 && xhr.status < 300) {
            
        returnData = fn(xhr);

    } else { 
        console.error('Error en la petición:', xhr.statusText); 
    }

    return returnData;

}

function completeMonth(month){

    let comMonth = ""; 

    switch (month) {
        case "ene": comMonth = "Enero"; break;
        case "feb": comMonth = "Febrero"; break;
        case "mar": comMonth = "Marzo"; break;
        case "abr": comMonth = "Abril"; break;
        case "may": comMonth = "Mayo"; break;
        case "jun": comMonth = "Junio"; break;
        case "jul": comMonth = "Julio"; break;
        case "ago": comMonth = "Agosto"; break;
        case "sep": comMonth = "Septiembre"; break;
        case "oct": comMonth = "Octubre"; break;
        case "nov": comMonth = "Noviembre"; break;
        case "dic": comMonth = "Diciembre"; break;

        case 1: comMonth = "ene"; break;
        case 2: comMonth = "feb"; break;
        case 3: comMonth = "mar"; break;
        case 4: comMonth = "abr"; break;
        case 5: comMonth = "may"; break;
        case 6: comMonth = "jun"; break;
        case 7: comMonth = "jul"; break;
        case 8: comMonth = "ago"; break;
        case 9: comMonth = "sep"; break;
        case 10: comMonth = "oct"; break;
        case 11: comMonth = "nov"; break;
        case 12: comMonth = "dic"; break;
    }

    return comMonth;

}

function asignarFuncionMenuPrincipal(){
    const btnOne = document.querySelector("#btn-menu-home");
    const btnTwo = document.querySelector("#btn-menu-finance");

    btnOne.addEventListener("click", ()=>{ location.href ="../../view/Dashboard/resumen.php"; });
    btnTwo.addEventListener("click", ()=>{ location.href ="../../view/finance/finance.php"; });
}

function cargaMesesSelect(className, messelect = 0){

    var html = "";
    
    html += "<option value=\"ene\" " + ("ene" == messelect ? " selected" : "") + ">Enero</option>";
    html += "<option value=\"feb\" " + ("feb" == messelect ? " selected" : "") + ">Febrero</option>";
    html += "<option value=\"mar\" " + ("mar" == messelect ? " selected" : "") + ">Marzo</option>";
    html += "<option value=\"abr\" " + ("abr" == messelect ? " selected" : "") + ">Abril</option>";
    html += "<option value=\"may\" " + ("may" == messelect ? " selected" : "") + ">Mayo</option>";
    html += "<option value=\"jun\" " + ("jun" == messelect ? " selected" : "") + ">Junio</option>";
    html += "<option value=\"jul\" " + ("jul" == messelect ? " selected" : "") + ">Julio</option>";
    html += "<option value=\"ago\" " + ("ago" == messelect ? " selected" : "") + ">Agosto</option>";
    html += "<option value=\"sep\" " + ("sep" == messelect ? " selected" : "") + ">Septiembre</option>";
    html += "<option value=\"oct\" " + ("oct" == messelect ? " selected" : "") + ">Octubre</option>";
    html += "<option value=\"nov\" " + ("nov" == messelect ? " selected" : "") + ">Noviembre</option>";
    html += "<option value=\"dic\" " + ("dic" == messelect ? " selected" : "") + ">Diciembre</option>";

    const slc = document.querySelector(className);
    slc.innerHTML = html;

}

function isEmptyObject(obj) {
    return Object.getOwnPropertyNames(obj).length === 0;
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}