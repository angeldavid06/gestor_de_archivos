<?php 

    require_once "../../clases/Archivos.php";

    $id = $_SESSION['id'];

    $obj = new Archivos();

    $mostrar = $obj->consultar_archivos($id);

?>

<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover table-dark" id="datatableGestor">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Tipo de archivo</th>
                    <th>Descargar</th>
                    <th>Visualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                    $validas = array(
                        'png','jpg','jpeg','pdf','mp3','mp4'
                    );

                    foreach ($mostrar as $key): 
                    $ruta =  '../archivos/'.$key['id_usuario'].'/'.$key['archivo'];   
                ?>
                <tr>
                    <td><?php echo $key['categoria']; ?></td>
                    <td><?php echo $key['archivo']; ?></td>
                    <td><?php echo $key['tipo']; ?></td>
                    <td>
                        <a class="fas fa-download btn btn-success" href="<?php echo $ruta; ?>" download="<?php echo $key['archivo']; ?>">
                            
                        </a>
                    </td>
                    <td>
                        <?php 
                            for ($i=0; $i < count($validas); $i++) { 
                                if($validas[$i] == $key['tipo']) { 

                        ?>
                            <button class=" fas fa-eye btn btn-primary material-icons" onclick="obtener_archivo(<?php echo $key['id_archivo']; ?>)" data-toggle="modal" data-target="#visualizarArchivo">
                                
                            </button>
                        <?php 
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <button onclick="eliminar_archivo(<?php echo $key['id_archivo']; ?>)" class="btn btn-danger fas fa-trash"></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
         $('#datatableGestor').DataTable();
    });
</script>