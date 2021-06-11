<?php
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";

?>

<h2>Búsqueda de pacientes</h2>
<form action="../controlador/cita.php" method="POST">
    <div class="form-group">
        <div class="row">
            <div class="col-8">
                <input class="form-control" type="text" placeholder="Buscar paciente por nombre" name="txtNombre" id="txtNombre">
            </div>
            <div class="col-2">
                <button class="btn btn-success w-100" type="button" name="btnBuscar" id="btnBuscar">Buscar</button>
            </div>
            <div class="col-2">
            <button class="btn btn-danger w-100" type="button" name="btnLimpiar" id="btnLimpiar">Limpiar</button>
            </div>
        </div>
    </div>
</form>
<hr>

<h2>Generar Receta Médica</h2>
<table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre Medicamento</th>
                    <th>Dosis</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>
        <form action="">
            <input type="text" id="medicamento" placeholder="Medicamento">
            <input type="text" id="dosis" placeholder="Dosis">
            <input type="button" value="Agregar" id="agregarMedicamento">
        </form>

        <a class="btn btn-success" href="receta.php?paciente=1" id="enviarReceta">Enviar receta</a>

        <script>
            var arregloMedicamentos = [];
            $("#agregarMedicamento").on("click", function(){
                var medicamento = $("#medicamento").val();
                    var dosis = $("#dosis").val();
                    var obj = {"medicamento": medicamento, "dosis": dosis}
                    arregloMedicamentos.push(obj);
                $.ajax({
                    dataType : 'json',
                    method: 'POST',
                    data: obj,
                    url: '../controlador/recetaprocess.php'
                }).done(function(respuesta){
                    console.log(respuesta.medicamento);
                    console.log(respuesta.dosis);
                    $("#tbody").append('<tr><td>'+respuesta.medicamento+'</td><td>'+respuesta.dosis+'</td></tr>');
                }).fail(function(){

                });
            });

            $("#enviarReceta").on("click", function(){
                var idPaciente = $("#txtIdPaciente").val();

                var data = {"data": arregloMedicamentos}
                //var datos = new FormData();
                //datos.append("arregloMedicamentos", arregloMedicamentos);
                $.ajax({
                    //contentType:false,
                    //processData:false,
                    //cache:false,
                    //dataType : 'json',
                    method: 'POST',
                    data: data,
                    url: 'obtenreceta.php?paciente='+idPaciente
                }).done(function(respuesta){
                    location.href= "receta.php?paciente="+idPaciente
                }).fail(function(){

                });
            });
        </script>

<form action="../controlador/CitaControllador.php" method="POST">
    <input type="hidden" name="txtIdPaciente" id="txtIdPaciente">
    <div class="row">
        <div class="col-6">
            <label for="" class="font-weight-bold">Nombre de Paciente</label>
            <input class="form-control w-100" type="text" value="" name="txtPaciente" id="txtPaciente" disabled placeholder="Nombre del paciente encontrado">
        </div>
        <div class="col-6 ">
            <label for="" class="font-weight-bold">Generar e imprimir</label>
            <a href="" class="btn d-block btn-primary">Generar Receta</a>
        </div>
    </div>
</form>


<script>
    $("#btnBuscar").on("click", function(){
        var datos = {
            "nombre": $("#txtNombre").val()
        }

        $.ajax({
            dataType: 'json',
            data: datos, 
            type: "POST",
            url: "../controlador/cita.php"
        }).done(function(respuesta){
            $("#txtPaciente").val(respuesta.nombre);
            $("#txtIdPaciente").val(respuesta.id);
            
            
        }).fail(function(){
            swal({
                title: "Paciente no encontrado!",
                text: "¿Desea abrir expediente a nombre de "+ $("#txtNombre").val() + "?",
                icon: "info",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: false,
                })
                .then((ok) => {
                if (ok) {
                    $('#modalExpediente').modal("show");
                } 
            });
        });
    });

    
</script>

        </section>
        </div>
    </div>
</div>
<?php include "componentes/footer.php"; ?>