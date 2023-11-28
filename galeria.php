<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>

<?php 

    if($_POST){

        print_r($_POST);

        $nombre=$_POST['nombre'];

    $objConexion=new conexion();
    $sql="INSERT INTO proyectos (id, nombre, imagen, descripcion) VALUES (NULL, '$nombre', 'imagen.jpg', 'es un proyecto de hace mucho tiempo');";
    $objConexion->ejecutar($sql);   
    }

    $objConexion=new conexion();
    $proyectos=$objConexion->consultar("SELECT * FROM PROYECTOS");

    //print_r($resultado);

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

            Nombre del proyecto: <input class="form-control" type="text" name="nombre" id="">
            <br/>
            Imagen del proyecto: <input class="form-control" type="file" name="archivo" id="">
            <br/>


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
            <td ><?php echo $proyecto['id']  ?></td>
            <td><?php echo $proyecto['nombre']  ?> </td>
            <td><?php echo $proyecto['imagen']  ?></td>
            <td><?php echo $proyecto['descripcion']  ?></td>
            <td><a type="button" class="btn btn-danger" href="#" ">Eliminar</a></td>



        </tr>
        <?php } ?>
    </tbody>
</table>
            
            </div>
        </div>
    </div>




 


 
    

    

<?php include("pie.php"); ?>