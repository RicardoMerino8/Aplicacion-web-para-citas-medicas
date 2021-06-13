<?php
include "sesionDoctor.php";
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
            <button class="btn btn-danger w-100" type="reset" name="btnLimpiar" id="btnLimpiar" >Limpiar</button>
            </div>
        </div>
    </div>
</form>
<hr>

<h2>Ingreso de Receta Médica</h2>
<form action="" class="mb-4">
    <div class="row justify-content-center">
        <div class="col-4">
            <input class="form-control w-100" type="text" id="medicamento" placeholder="Medicamento">
        </div>
        <div class="col-4">
            <input class="form-control w-100" type="text" id="dosis" placeholder="Dosis">
        </div>
        <div class="col-4">
            <input class="btn btn-primary w-100" type="button" value="Agregar" id="agregarMedicamento">
        </div>
    </div>
</form>

<form  method="POST" class="mb-4">
    <input type="hidden" name="txtIdPaciente" id="txtIdPaciente">
    <div class="row">
        <div class="col-6">
            <label for="" class="font-weight-bold">Nombre de Paciente</label>
            <input class="form-control w-100" type="text" value="" name="txtPaciente" id="txtPaciente" disabled placeholder="Nombre del paciente encontrado">
        </div>
        <div class="col-6 ">
            <label for="" class="font-weight-bold">Generar e imprimir</label>
            <a href="receta.php?paciente=" class="d-block btn d-block btn-primary" id="enviarReceta" >Generar Receta</a>
        </div>
    </div>
</form>

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

        <script>
            var arregloMedicamentos = [];
            $("#agregarMedicamento").on("click", function(){
                    var medicamento = $("#medicamento").val();
                    var dosis = $("#dosis").val();
                    if(medicamento!="" && dosis !=""){
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
                            $("#medicamento").val("");
                            $("#dosis").val("");
                        }).fail(function(){

                        });
                    }else{
                        swal({
                            title: "Complete los campos requeridos",
                            text: "Por favor ingrese el nombre del medicamento y la dosis recomendada",
                            icon: "error",
                            dangerMode: false
                        });
                    }
            });

            $("#enviarReceta").on("click", function(){
                var idPaciente = $("#txtIdPaciente").val();

                if(idPaciente !=""){
                    var data = {"data": arregloMedicamentos}
                    $.ajax({
                        method: 'POST',
                        data: data,
                        url: 'obtenreceta.php?paciente='+idPaciente
                    }).done(function(respuesta){
                        location.href= "receta.php?paciente="+idPaciente
                    }).fail(function(){

                    });
                }
            });
        </script>




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
                text: "Por favor intente de nuevo con el nombre completo",
                icon: "info",
                dangerMode: false
            });
        });
    });

    
</script>

        </section>
        </div>
    </div>
</div>
<?php include "componentes/footer.php"; ?>