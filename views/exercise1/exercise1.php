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
            <div class="col-12 title">Estás subiendo una escalera que tiene n escalones.</div> 
            <div class="col-12 subTitle">En cada paso podés elegir subir 1 escalón o subir 2.<br> Pon la cantidad de escalones y yo te encuentro de cuántas formas distintas se puede subir para llegar al final</div> 
        </div>              
        <form action="<?= $this->base_assets ?>src/exercise1/controller/EscaleraController.php" method="post">
            <div class="row justify-content-center">
                <div class="col-4">
                    <input type="number" min="2" name="form[nroEscalones]" value="<?=  isset($_POST['form'])? $_POST['form']['nroEscalones'] : ''; ?>" autocomplete="off" data-condicion="" required="required" class="form-control">   
                </div>
                <div class="col-4">
                    <button type="submit" name="form[action]" value="getPosibilidadesEscalera" class="btn btn-success">Enviar</button>
                     <a href="<?=$this->base_assets?>index.php" class="btn btn-dark">Atras</a>
                </div>
                <div class="col-8 container-result"><?=  isset($_POST['form'])? (!empty($this->resultado)? 'Numero de posibilidades <span class="posibility-number">'.$this->resultado.'<span>' : '<span class="error">No es un numero valido.</span>') : ''; ?> </div>
            </div>              
        </form>                       
    </div>
</body>
</html>