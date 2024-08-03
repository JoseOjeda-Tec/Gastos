window.onload = function() {
    asignarFuncionMenuPrincipal();
    asignaBotonesSubmenus();
}

function asignaBotonesSubmenus(){

    const btn_grl = document.querySelector("#btn-grl");
    const btn_dtl = document.querySelector("#btn-dtl");
    const btn_pgs = document.querySelector("#btn-pgs");
    const btn_gst = document.querySelector("#btn-gst");
    const btn_ing = document.querySelector("#btn-ing");

    btn_grl.addEventListener("click", ()=>{ financeGeneralButton(); cambiaColor("grl"); });
    btn_dtl.addEventListener("click", ()=>{ financeDetailButton(); cambiaColor("dtl"); });
    btn_pgs.addEventListener("click", ()=>{ 
        paysStaticButton(); 
        cambiaColor("pgs"); 
        sleep(5).then(() => {
            asignaSelects();
            asignaAccionBoton();
            filterStaticPays(1);
        });
    });
    btn_gst.addEventListener("click", ()=>{ registroGastosButton(); cambiaColor("gst"); });
    btn_ing.addEventListener("click", ()=>{ registroIngresosButton(); cambiaColor("ing"); });

}

function financeGeneralButton(){
    const ctn_cambio = document.querySelector(".contenedor-combio");
    ctn_cambio.innerHTML = "";
}

function financeDetailButton(){
    const ctn_cambio = document.querySelector(".contenedor-combio");
    ctn_cambio.innerHTML = "";
}

function paysStaticButton(){
    const ctn_cambio = document.querySelector(".contenedor-combio");
    ctn_cambio.innerHTML = "";

    ajax(
        'GET', 
        'static-pays.html', 
        (xhr) => { ctn_cambio.innerHTML = xhr.responseText; }, 
        {} 
    );
}

function registroGastosButton(){
    const ctn_cambio = document.querySelector(".contenedor-combio");
    ctn_cambio.innerHTML = "";
}

function registroIngresosButton(){
    const ctn_cambio = document.querySelector(".contenedor-combio");
    ctn_cambio.innerHTML = "";
}

function cambiaColor(act){

    const btn_grl = document.querySelector("#btn-grl");
    const btn_dtl = document.querySelector("#btn-dtl");
    const btn_pgs = document.querySelector("#btn-pgs");
    const btn_gst = document.querySelector("#btn-gst");
    const btn_ing = document.querySelector("#btn-ing");

    btn_grl.style.backgroundColor = act == "grl" ? "#e38f09" : "#33A8FF";
    btn_dtl.style.backgroundColor = act == "dtl" ? "#e38f09" : "#0067B4";
    btn_pgs.style.backgroundColor = act == "pgs" ? "#e38f09" : "#33A8FF";
    btn_gst.style.backgroundColor = act == "gst" ? "#e38f09" : "#0067B4";
    btn_ing.style.backgroundColor = act == "ing" ? "#e38f09" : "#33A8FF";

}