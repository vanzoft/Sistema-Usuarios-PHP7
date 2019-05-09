 <form role="form" id="Formulario"  method="POST">
	 
	 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Restablecer contraseña</h4>
            </div>
			
            <div class="modal-body">
				<div id="respuesta_rest"></div>
			<div class="form-group">
			<label>Email:</label>
            <input type="email" name="email" id="email"  class="form-control" placeholder="Ingresa el email de usuario" required >
           
          </div>
 
   

            <div class="modal-footer">
				
				<button type="submit" id="enviar" class="btn btn-success pull-right " name="enviar" >Restablecer <i class="fa fa-key"></i></button>
				
               
            </div>
        </div>
    </div> 
</div> </div></form>

