<!DOCTYPE html>
<html lang="es">
<head>
    <title>WOOWUP</title>
    <meta charset="UTF-8">
    <meta name="title" content="WoowUp">
    <meta name="description" content="Descripción de la WEB">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= $this->base_assets ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $this->base_assets ?>assets/css/index.css" type="text/css" media="screen"/>
    
    <script src="<?= $this->base_assets ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= $this->base_assets ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 title">Calculador de fecha de recompra del cliente.</div> 
            <div class="col-12 subTitle"></div> 
        </div>              
        <div class="row justify-content-center">
            <div class="col-8 container-result">
            <?php if(!empty($this->resultados)) { ?>
            <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Fecha Recompra</th>
                            <th>Fecha Recompra sin Atipicos</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i= 1; foreach($this->resultados->getComprasClientes() as $compraCliente){ ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $compraCliente->getSkuProducto()?></td>
                            <td><?= $compraCliente->getNombreProducto()?></td>
                            <td><?= $compraCliente->getFechaRecompra()?></td>
                            <td><?= $compraCliente->getFechaRecompraSinAtipicos()?></td>
                        </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
            <?php  } ?>
            <?= !empty($this->error)? $this->error: ''; ?>
            </div>
            <div class="col-8 text-right"> <a href="<?=$this->base_assets?>index.php" class="btn btn-dark">Atras</a></div>
        </div>                                       
    </div>
</body>
</html>