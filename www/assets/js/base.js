class Base{
    constructor(controller = ""){
        this.getUrl  = window.location;
        this.baseUrl = this.getUrl .protocol + "//" + this.getUrl.host + "/" + this.getUrl.pathname.split('/')[1];
        this.controller = controller;
    }
    
    /**
     * Llamada Ajax
     *
     * @param trigger           Boton o link que dispara la llamada
     * @param dataType          tipo de respuesta
     * @param type              tipo de metodo GET O POST
     * @param url               URL de destino
     * @param data              Objeto con los datos a enviar al servidor
     * @param callback_success  Funcion que ejecuta cuando la respuesta es exitosa
     * @param callback_error    funcion que ejecuta cuando la respuesta tiene errores
     */
    ajaxCall(dataType = 'text', type='POST', url = null, data = {}, callback_success = null, callback_error = null){
        $.ajax({
           url: url,
           type: type,
           data: data,
           dataType: dataType,
           success: (_json) =>{
               if (_json.errors && _json.errors.length > 0){
                   this[callback_error](_json);
               } else {
                   this[callback_success](_json);
               }
           },            
           error: () =>{
                console.log('Error: No se pudo realizar '+callback_success);
            }
       });
    }

}
