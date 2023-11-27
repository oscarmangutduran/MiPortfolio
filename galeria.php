<?php include("cabecera.php"); ?>
    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                
            <div class="card">
        <div class="card-header">
            Datos del proyecto:
        </div>
        <div class="card-body">
        <form action="galeria.php" method="post">

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
        </tr>
    </thead>
    <tbody>
        <tr>
            <td >3</td>
            <td>Aplicación web </td>
            <td>imagen.jpg</td>
        </tr>
    </tbody>
</table>
            
            </div>
        </div>
    </div>




 


 
    

    

<?php include("pie.php"); ?>