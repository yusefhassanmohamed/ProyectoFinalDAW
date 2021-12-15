<?php 
    if($_SESSION['rol']!='CLIENTE'){
        header('Location: index.php?c=Main');
    } 
?>
<?php include 'views/partials/nav.php' ?>
<section>
        <div class="table-responsive col-lg-12">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Fecha registro</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data["productos"] as $dato):?>
                    <tr>
                        <th scope="row"><?php echo $dato["idproducto"]; ?></th>
                        <td><?php echo $dato["nombre"]; ?></td>
                        <td><?php echo $dato["marca"]; ?></td>
                        <td><?php echo $dato["fecha_registro"]; ?></td>
                        <td>
                            <?php
                                foreach($data['domicilios'] as $domicilio){
                                    if($domicilio['iddomicilio'] == $dato['iddomicilio']){
                                        echo $domicilio["calle"]; 
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <a href="index.php?c=Parte&a=nuevoParte&id=<?php echo $dato["idproducto"]; ?>"><i class="fas fa-bullhorn"> Reportar</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</section>
<?php include 'views/partials/footer.php' ?>