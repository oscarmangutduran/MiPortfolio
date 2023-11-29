<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>

<?php 

    if($_POST){

        
        
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $imagen=$_FILES['archivo']['name'];

        $fecha=new DateTime();
        $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
        $imagen_temporal=$_FILES['archivo']['tmp_name'];

        move_uploaded_file($imagen_temporal,"img/".$imagen);

        $objConexion=new conexion();
        $sql="INSERT INTO proyectos (id, nombre, imagen, descripcion) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
        $objConexion->ejecutar($sql);   
        header("location:galeria.php");
    }

    if($_GET) {

       

        $id=$_GET['borrar'];
        $objConexion=new conexion();

        $imagen=$objConexion->consultar("select imagen from proyectos where id=".$id);

        unlink("img/".$imagen[0]['imagen']);

        
       $sql="DELETE FROM PROYECTOS WHERE PROYECTOS.ID =".$id;
        $objConexion->ejecutar($sql);
        header("location:galeria.php");
    }

    $objConexion=new conexion();
    $proyectos=$objConexion->consultar("SELECT * FROM PROYECTOS");



?>
    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                
            <div class="card">
        <div class="card-header">
            Datos del proyecto:
        </div>
        <div class="card-body">
        <form action="galeria.php" method="post" enctype="multipart/form-data">

            Nombre del proyecto: <input required class="form-control" type="text" name="nombre" id="">
            <br/>
            Imagen del proyecto: <input required class="form-control" type="file" name="archivo" id="">
            <br/>
            <div class="mb-3">
            <br/>
            Descripción:
            <textarea required class="form-control" name="descripcion" id="" rows="3"></textarea>
            </div>


            <input class="btn btn-success" type="submit" value="Enviar proyecto">
        </form>
        </div>
        
    </div>
            </div>
            <div class="col-md-6">
                
            <table class="table">
    
    <thead>
        <tr>
            <th>ID</th>
            <th >Nombre</th>
            <th >Imagen</th>
            <th >Descripción</th>
            <th >Acciones</th>



        </tr>
    </thead>
    <tbody>
        <?php foreach($proyectos as $proyecto) { ?>
        <tr>
            <td ><?php echo $proyecto['id'];  ?></td>
            <td><?php echo $proyecto['nombre'];  ?> </td>

            <td>
                <img width="100" src="img/<?php echo $proyecto['imagen']; ?>" alt="" srcset="">


            </td>
            <td><?php echo $proyecto['descripcion'];  ?></td>
            <td><a type="button" class="btn btn-danger" href="?borrar=<?php echo $proyecto ['id']; ?>">Eliminar</a></td>



        </tr>
        <?php } ?>
    </tbody>
</table>
            
            </div>
        </div>
    </div>




 


 
    

    

<?php include("pie.php"); ?>