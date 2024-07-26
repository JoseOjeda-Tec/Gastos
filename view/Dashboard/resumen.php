<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen</title>

    <link rel="stylesheet" href="style.css">
    <link href="../../config/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../../config/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="../../config/fontawesome/css/solid.css" rel="stylesheet" />

</head>
<body>

    <div class="container-all">

        <div class="container-descktop">

            <div class="month-buttons">
                <button type="button" class="month-btn btn-clear">ENE</button>
                <button type="button" class="month-btn btn-dark">FEB</button>
                <button type="button" class="month-btn btn-clear">MAR</button>
                <button type="button" class="month-btn btn-dark">ABR</button>
                <button type="button" class="month-btn btn-clear">MAY</button>
                <button type="button" class="month-btn btn-dark">JUN</button>
                <button type="button" class="month-btn btn-clear">JUL</button>
                <button type="button" class="month-btn btn-dark">AGO</button>
                <button type="button" class="month-btn btn-clear">SEP</button>
                <button type="button" class="month-btn btn-dark">OCT</button>
                <button type="button" class="month-btn btn-clear">NOV</button>
                <button type="button" class="month-btn btn-dark">DIC</button>
            </div>

            <div class="title-summary-active">
                <h1 class="title-summary">Enero 2024 - <strong>Banco Itau</strong></h1>
            </div>

            <div class="summarys">
                <div class="summary-card summary-income">
                    <a href="#" class="value-summary value-income" id="id-expenses">$900000</a> <i class="fa-solid fa-arrow-up value-income"></i>
                    <p class="desc-summary desc-income">Ingresos</p>
                </div>
                <div class="summary-card summary-expenses">
                    <a href="#" class="value-summary value-expenses" id="id-expenses">$600000</a> <i class="fa-solid fa-arrow-down value-expenses"></i>
                    <p class="desc-summary desc-expenses">Egresos</p>
                </div>
                <div class="summary-card summary-rest">
                    <a href="#" class="value-summary value-rest" id="id-expenses">$300000</a> <i class="fa-solid fa-wallet value-rest"></i>
                    <p class="desc-summary desc-rest">Resto</p>
                </div>
            </div>

            <div class="bank-accounts">
                <!-- <div class="title-accounts-div"><h3 class="title-acounts">Cuentas Bancarias</h3></div> -->
                <div class="table-accounts-div">
                    <table class="table-accounts" cellspacing="0">
                        <thead>
                        <tr>
                                <th colspan="5">Cuentas Bancarias</th>
                            </tr>
                            <tr>
                                <th>Banco</th>
                                <th>Tipo Cuenta</th>
                                <th>Saldo</th>
                                <th>Prioridad</th>
                                <th>Opc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Itau</td>
                                <td>Corriente</td>
                                <td>300000</td>
                                <td>Si</td>
                                <td><button type="button" class="detail-btn" id="detail-btn-id"><i class="fa-solid fa-circle-info"></i></button></td>
                            </tr>
                            <tr>
                                <td>Estado</td>
                                <td>Rut/vista</td>
                                <td>30000</td>
                                <td>No</td>
                                <td><button type="button" class="detail-btn" id="detail-btn-id"><i class="fa-solid fa-circle-info"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="div-comments-alerts">
                <div class="card-all card-comments">
                    <div class="title-comments"><h6>Comentarios</h6> <i class="fa-solid fa-comment"></i></div>
                    <div class="comments"></div>
                </div>
                <div class="card-all card-alerts">
                    <div class="title-alerts"><h6>Alertas</h6> <i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div class="alerts"></div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>