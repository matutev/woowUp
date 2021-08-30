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
            <div class="col-12 title">Elige el Ejercicio</div>     
        </div>
        <div class="row">
            <div class="col-12 choiceList">
               <a href="<?=$this->base_assets?>src/exercise1/controller/EscaleraController.php" class="btn btn-success">Ejercicio 1</a>
               <a href="<?=$this->base_assets?>src/exercise2/controller/ComprasClientesController.php" class="btn btn-success">Ejercicio 2</a>
            </div>        
        </div>
    </div>
</body>
</html>