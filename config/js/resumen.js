window.onload = function() {
    asignarFunctionBtn();
    actualizarResumenes();
}

function asignarFunctionBtn(){
    const btnEne = document.querySelector("#btn-ene");
    const btnFeb = document.querySelector("#btn-feb");
    const btnMar = document.querySelector("#btn-mar");
    const btnAbr = document.querySelector("#btn-abr");
    const btnMay = document.querySelector("#btn-may");
    const btnJun = document.querySelector("#btn-jun");
    const btnJul = document.querySelector("#btn-jul");
    const btnAgo = document.querySelector("#btn-ago");
    const btnSep = document.querySelector("#btn-sep");
    const btnOct = document.querySelector("#btn-oct");
    const btnNov = document.querySelector("#btn-nov");
    const btnDic = document.querySelector("#btn-dic");
    const btnRS  = document.querySelector("#btn-reload-summary");

    btnEne.addEventListener("click", ()=>{ cambiaColor("ene"); });
    btnFeb.addEventListener("click", ()=>{ cambiaColor("feb"); });
    btnMar.addEventListener("click", ()=>{ cambiaColor("mar"); });
    btnAbr.addEventListener("click", ()=>{ cambiaColor("abr"); });
    btnMay.addEventListener("click", ()=>{ cambiaColor("may"); });
    btnJun.addEventListener("click", ()=>{ cambiaColor("jun"); });
    btnJul.addEventListener("click", ()=>{ cambiaColor("jul"); });
    btnAgo.addEventListener("click", ()=>{ cambiaColor("ago"); });
    btnSep.addEventListener("click", ()=>{ cambiaColor("sep"); });
    btnOct.addEventListener("click", ()=>{ cambiaColor("oct"); });
    btnNov.addEventListener("click", ()=>{ cambiaColor("nov"); });
    btnDic.addEventListener("click", ()=>{ cambiaColor("dic"); });
    btnRS.addEventListener("click", ()=>{ actualizarResumenes(); });
}

function cambiaColor(act){

    const btnEne = document.querySelector("#btn-ene");
    const btnFeb = document.querySelector("#btn-feb");
    const btnMar = document.querySelector("#btn-mar");
    const btnAbr = document.querySelector("#btn-abr");
    const btnMay = document.querySelector("#btn-may");
    const btnJun = document.querySelector("#btn-jun");
    const btnJul = document.querySelector("#btn-jul");
    const btnAgo = document.querySelector("#btn-ago");
    const btnSep = document.querySelector("#btn-sep");
    const btnOct = document.querySelector("#btn-oct");
    const btnNov = document.querySelector("#btn-nov");
    const btnDic = document.querySelector("#btn-dic");
    const btnAct = document.querySelector("#month-btn-active");

    btnEne.style.backgroundColor = act == "ene" ? "#e38f09" : "#33A8FF";
    btnFeb.style.backgroundColor = act == "feb" ? "#e38f09" : "#0067B4";
    btnMar.style.backgroundColor = act == "mar" ? "#e38f09" : "#33A8FF";
    btnAbr.style.backgroundColor = act == "abr" ? "#e38f09" : "#0067B4";
    btnMay.style.backgroundColor = act == "may" ? "#e38f09" : "#33A8FF";
    btnJun.style.backgroundColor = act == "jun" ? "#e38f09" : "#0067B4";
    btnJul.style.backgroundColor = act == "jul" ? "#e38f09" : "#33A8FF";
    btnAgo.style.backgroundColor = act == "ago" ? "#e38f09" : "#0067B4";
    btnSep.style.backgroundColor = act == "sep" ? "#e38f09" : "#33A8FF";
    btnOct.style.backgroundColor = act == "oct" ? "#e38f09" : "#0067B4";
    btnNov.style.backgroundColor = act == "nov" ? "#e38f09" : "#33A8FF";
    btnDic.style.backgroundColor = act == "dic" ? "#e38f09" : "#0067B4";
    btnAct.value = act;

}

function muestraBancos(banco = 0){

    ajax(
        'POST', 
        '../../controller/banks-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            var html = "";

            response.forEach(element => {
                html += "<option value=\"" + element["id_bank"] + "\"" + (element["id_bank"] == banco ? " selected" : "") + ">" + element["descripcion"] + "/" + element["tipo"] + "</option>";
            });

            const slcsnio = document.querySelector("#bank");
            slcsnio.innerHTML = html;
        }, 
        { accion: 'getBanks' }
    );

}

function muestraAnios(anio = 0){

    ajax(
        'POST', 
        '../../controller/years-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            var html = "";

            response.forEach(element => {
                html += "<option value=\"" + element["id_year"] + "\"" + (element["id_year"] == anio ? " selected" : "") + ">" + element["anio"] + "</option>";
            });

            const slcsnio = document.querySelector("#anios");
            slcsnio.innerHTML = html;
        }, 
        { accion: 'getYears' }
    );

}

function actualizarResumenes(){

    ajax(
        'POST', 
        '../../controller/menus-activos-controller.php', 
        (xhr) => {
            var response = JSON.parse(xhr.responseText);
            cambiaColor(response['month']);
            muestraAnios(response['year']);
            muestraBancos(response['bank']);
            // document.getElementById('response').innerText = JSON.stringify(response, null, 2);
        }, 
        { accion: 'getMenusActivos' }
    );
    
}