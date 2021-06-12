<div class="row">
    <div class="col-6">
    <h2>Búsqueda de pacientes</h2> 
    </div>
    <div class="col-6 text-right">
        <h2>Bienvenida <?php echo $usuario->getNombreCompleto(); ?></h2>
    </div>
</div>
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

<h2>Creación de citas</h2>
<form action="../controlador/CitaControllador.php" method="POST" id="formularioCitas">
    <input type="hidden" name="txtIdPaciente" id="txtIdPaciente">
    <div class="row">
        <div class="col-6">
        <label for="" class="font-weight-bold">Nombre de Paciente</label>
            <input class="form-control w-100" type="text" value="" name="txtPaciente" id="txtPaciente" disabled placeholder="Nombre del paciente encontrado">
        </div>
        <div class="col-6">
            <label for="" class="font-weight-bold">Fecha de cita</label>
            <input class="form-control w-100" type="date" name="fecha" id="fecha">
        </div>
    </div>

    <div class="row">
        <div class="col-6">
        <label for="" class="font-weight-bold">Hora</label>
    <select name="hora" id="hora" class="form-control">
        <option value="8:00">8:00</option>
        <option value="9:00">9:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
    </select>
        </div>
        <div class="col-6">
        <label for="" class="font-weight-bold">Tipo de consulta</label>
    <select name="consulta" id="consulta" class="form-control">
        <option value="Lectura de examenes">Lectura de examenes</option>
        <option value="Consulta General">Consulta General</option>
        <option value="Chequeo General">Chequeo General</option>
    </select>
        </div>
    </div>
    <input type="submit" value="Guardar Cita" name="guardarcita" id="guardarcita" class="btn btn-primary w-100 mt-3">
</form>
<hr>
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

    $("#guardarcita").on("click", function(){
        if($("#txtIdPaciente").val() =="" && $("#fecha").val() ==""){
            swal({
                title: "Error al agendar cita",
                text: "Por favor llene todos los campos requeridos para agendar cita",
                icon: "info",
                dangerMode: false
            })
            $("#formularioCitas").on("submit", function(e){
                e.preventDefault();
            })
        }
    })
    
</script>


<!-- Modal -->
<div class="modal fade" id="modalExpediente" tabindex="-1" role="dialog" aria-labelledby="modalExpedienteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExpedienteLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
        <div class="form-group">
            <label for="">Nombre Paciente</label>
            <input class="form-control" type="text" name="txtNombre" id="txtNombre">
        </div>
            <div class="form-group">
                <label for="">Número de Teléfono</label>
                <input class="form-control" type="text" name="txtTelefono" id="txtTelefono"> 
            </div>   

            <div class="form-group">
                <label for="">Dirección</label>
                <input class="form-control" type="text" name="txtDireccion" id="txtDireccion">
            </div>
            
            <div class="form-group">
                <label for="">Edad</label>
                <input class="form-control" type="text" name="txtEdad" id="txtEdad">
            </div>

            <input class="form-control" type="hidden" name="txtIdSecretaria" id="txtIdSecretaria">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnExpediente">Guardar Expediente</button>
        </form>   
      </div>
    </div>
  </div>
</div>

<script>
$("#btnExpediente").on("click", function(){
    var datos = {
        "nombre" : $("#txtNombre").val(),
        "telefono" : $("#txtTelefono").val(),
        "direccion" : $("#txtDireccion").val(),
        "edad" : $("#txtEdad").val()
    }
        $.ajax({
            data: datos,
            type: 'POST',
            url: "../controlador/generaExp.php",
        }).done(function(respuesta){
            console.log(respuesta);
            $("#modalExpediente").modal("hide");
            swal({
                title: "Expediente generado exitosamente!",
                text: respuesta,
                icon: "success"
                });
            
        }).fail(function(){
            console.log("NO SE ENVIO AL SERVIDOR");
            swal({
                title: "Error al generar expediente!",
                text: respuesta,
                icon: "error"
                })
        });
    });
</script>