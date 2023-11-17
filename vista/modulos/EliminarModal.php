<div class="modal fade" id="delete_<?php echo $row['id_puntuacion']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center> <h4 class="modal-title">Borrar puntuacion </h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p class="text-center">¿Estas seguro en borrar esta puntuacion? </p>
				<h2 class="text-center"> <?php echo $row['fecha']; ?></h2>
			</div>
					
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
				<a href="delete.php?id_puntuacion=<?php echo $row['id_puntuacion']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
				
			</div>
		</div>
	</div>
</div>