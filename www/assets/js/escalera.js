class Escalera extends Base{

  constructor() {
    super('escalera');
    this.initFunctions();
  }

  getPosibilidadesEscalera(nroEscalones){
    this.ajaxCall('json', 'POST', null, {nroEscalones:nroEscalones, action: 'getPosibilidadesEscalera'}, "getResultado", "getError");
  }
  
  getResultado(json){
        $('.container-result').html('Numero de posibilidades <span class="posibility-number">'+json.response+'<span>');
  }
  
  getError(json){
       $('.container-result').html('<span class="error">'+json.errors+'</span>'); 
  }

  initFunctions(){   

    $(document).on('click', '#enviar', function() {
        escalera.getPosibilidadesEscalera($('#nroEscalones').val());
    });
   
  }

}

escalera = new Escalera();