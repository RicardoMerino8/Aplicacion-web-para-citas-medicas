<form action="../controlador/cita.php" method="POST">
    <label for="">Buscar por nombre</label>
    <input type="text" placeholder="Buscar" name="txtNombre" id="txtNombre">
    <button type="button" name="btnBuscar" id="btnBuscar">Buscar</button>
</form>

<form action="../controlador/CitaControllador.php" method="POST">
    <input type="text" 
    value="" name="txtPaciente" id="txtPaciente">
    <label for="">Fecha</label>
    <input type="date" name="fecha" id="fecha">

    <label for="">Hora</label>
    <select name="hora" id="hora">
        <option value="8:00">8:00</option>
        <option value="9:00">9:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
    </select>
    <label for="">Tipo de consulta</label>
    <select name="consulta" id="consulta">
        <option value="Lectura de examenes">Lectura de examenes</option>
        <option value="Consulta General">Consulta General</option>
        <option value="Chequeo General">Chequeo General</option>
    </select>
    <input type="submit" value="Guardar Cita" name="guardarcita">
</form>

<a href="citashoy.php" class="btn btn-primary">Ver Citas de Hoy</a>

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
            console.log("IdPaciente: " + respuesta.id);
            
            
        }).fail(function(error){
            alert("No existe ningun paciente con el nombre de " + $("#txtNombre").val());
        })
    })
</script>