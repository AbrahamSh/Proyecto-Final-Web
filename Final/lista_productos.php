<?php
    $con = mysqli_connect("localhost","root","root","tienda");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();    
      }
     $query="select id_producto,nombre,foto from  productos;";
     $result = mysqli_query($con, $query);
     $contador=0;
     if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($contador==4){
               echo "</div>";
               echo "<div class=\"card-deck\">";
               $contador=0;
            }else{
                $contador++;
               
            }
        
    ?>
    
        <div class="card  border-dark mb-3">
            <img class="mx-auto d-block img-thumbnail img-fluid"   width="300px" height= "250px" src="imagenes/<?echo $row["foto"];?>" alt="Card image">
            <div class="card-body text-center">
            <h6 class="card-title"><?echo $row["nombre"];?></h6>
            </div>
        </div>
        
    <?php
        }
    }
    mysqli_close($con);
    ?>

    