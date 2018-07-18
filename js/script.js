		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listar_alumnos.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var ape = button.data('ape') 
		  $('#edit_ape').val(ape)
		  var name = button.data('name') 
		  $('#edit_name').val(name)
		  var dni = button.data('dni') 
		  $('#edit_dni').val(dni)
		  var telefono = button.data('telefono') 
		  $('#edit_tel').val(telefono)
		  var telefono2 = button.data('telefono2') 
		  $('#edit_tel2').val(telefono2)
		  var domicilio = button.data('domicilio') 
		  $('#edit_domi').val(domicilio)
		  var localidad = button.data('localidad') 
		  $('#edit_local').val(localidad)
		  var categoria = button.data('categoria') 
		  $('#edit_cate').val(categoria)
		  var observaciones = button.data('observaciones') 
		  $('#edit_observ').val(observaciones)
		  var id = button.data('id') 
		  $('#edit_id').val(id)
		})
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/editar_alumnos.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		
		$( "#add_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/guardar_alumnos.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/eliminar_alumno.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});