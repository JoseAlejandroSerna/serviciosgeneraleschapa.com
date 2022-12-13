$(document).ready(function () {
	//fnGenerales();
	
	$( "#idPermissions").change(function() {

		var des = $("#idPermissions option:selected").attr("data-description");
		$("#txtdescription").text(des);
	});
});
////// USER ///////////
function UserEdit(id)
{
	
	$.each(JSON_all_user,function(i,user){
		if(user.idUser == id)
		{
			var userBlackList = false;

			$("#name").val(user.vUser);
			$("#phone").val(user.vPhone);
			$("#address").val(user.vAddress);
			$("#cp").val(user.vCP);
			$("#coment").val(user.vComent);

			$("[name=iStatus]").val([user.iStatus]);
/*			if(user.iStatus == 0){ userBlackList = true;}

			$('#iStatus').prop('checked', userBlackList);
*/
			$(".hdn_idUser").val(user.idUser);
			$(".hdn_idPermissions_update").val(user.idPermissions);
			$(".hdn_vEmail").val(user.vEmail);
			$(".hdn_vPassword").val(user.vPassword);
			
			$("#idPermissions_update option[value='"+user.idPermissions+"']").attr('checked',true);
			$("#idPermissions_update option[value='"+user.idPermissions+"']").change();
			$("#idPermissions_update option[value='"+user.idPermissions+"']").prop('selected', true);
			
			$(".userEdit").click();
		}
	});	
}

function UserDelete(id)
{
	$(".hdn_idUser_delete").val(id);
	$(".userDelete").click();
}

function valUserEdit()
{
	user_cleanClassError();
	var send = true;


	if( $("#name").val() == "")
	{
		$("#name").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre del usuario");
	}
	else if( $("#phone").val() == "")
	{
		$("#phone").addClass("errorContat");	send = false;
		$(".messageError").text("Ingresa el nuemero telefonico");
	}
	else if( $("#phone").val().length != 10)
	{
		$("#phone").addClass("errorContat");	send = false;
		$(".messageError").text("Ingresa un nuemero de 10 digitos");
	}
	else if( $("#address").val() == "")
	{
		$("#address").addClass("errorContat");	send = false;
		$(".messageError").text("Ingresa la dirección");
	}
	else if( $("#cp").val() == "")
	{
		$("#cp").addClass("errorContat");		send = false;
		$(".messageError").text("Ingresa el codigo postal");
	}
	else if( $("#idPermissions_update option:selected").val() == "0")
	{
		$("#idPermissions_update").addClass("errorContat");		send = false;
	}

	if(send)
	{ 	
		var status = $("input[name='iStatus']:checked").val();

		$(".hdn_vUser").val($("#name").val());
		$(".hdn_vPhone").val($("#phone").val());
		$(".hdn_vAddress").val($("#address").val());
		$(".hdn_vCP").val($("#cp").val());
		$(".hdn_idPermissions_update").val($("#idPermissions_update option:selected").val());

		$(".hdn_iStatus").val(status);
		$(".hdn_vComent").val($("#coment").val());

		$(".btn_adminUser").click();						
	}
}

function user_cleanClassError()
{
	$("#name").removeClass("errorContat");
	$("#phone").removeClass("errorContat");
	$("#address").removeClass("errorContat");
	$("#cp").removeClass("errorContat");
	$("#idPermissions_update").removeClass("errorContat");
}

function cleanClassError()
{
	$("#idPermissions").removeClass("errorContat");
	$("#name_new").removeClass("errorContat");
	$("#email_new").removeClass("errorContat");
	$("#password_new").removeClass("errorContat");
	$("#conf_password_new").removeClass("errorContat");
	$("#phone_new").removeClass("errorContat");
	$("#address_new").removeClass("errorContat");
	$("#cp_new").removeClass("errorContat");
}

function valUserNew()
{
	cleanClassError();
	var send = true;
	var userValid = true;

	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var isEmail = regex.test($("#email_new").val()); 

	$.each(JSON_all_user,function(i,user){
		if(user.vEmail == $("#email_new").val())
		{
			userValid = false;
			send = false;
		}
	});

	if( $("#name_new").val() == "")
	{
		$("#name_new").addClass("errorContat");		send = false;
	}
	else if($("#email_new").val() == "")
	{
		$("#email_new").addClass("errorContat");	send = false;
	}
	else if(!isEmail){
		$("#email_new").addClass("errorContat");	send = false;
	}
	else if($("#password_new").val() == "")
	{
		$("#password_new").addClass("errorContat");	send = false;
	}
	else if($("#password_new").val().length < 8)
	{
		$("#password_new").addClass("errorContat");	send = false;
	}
	else if($("#conf_password_new").val() != $("#password_new").val())
	{
		$("#conf_password_new").addClass("errorContat");
		$("#password_new").addClass("errorContat");	send = false;
	}
	else if( $("#phone_new").val() == "")
	{
		$("#phone_new").addClass("errorContat");	send = false;
	}
	else if( $("#phone_new").val().length != 10)
	{
		$("#phone_new").addClass("errorContat");	send = false;
	}
	else if( $("#address_new").val() == "")
	{
		$("#address_new").addClass("errorContat");	send = false;
	}
	else if( $("#cp_new").val() == "")
	{
		$("#cp_new").addClass("errorContat");		send = false;
	}
	else if( $("#idPermissions option:selected").val() == "0")
	{
		$("#idPermissions").addClass("errorContat");		send = false;
	}
	else if(!userValid)
	{	
		$("#idPermissions").addClass("errorContat");	
		$("#name_new").addClass("errorContat");	
		$("#email_new").addClass("errorContat");
		$("#password_new").addClass("errorContat");
		$("#conf_password_new").addClass("errorContat");
		$("#phone_new").addClass("errorContat");
		$("#address_new").addClass("errorContat");
		$("#cp_new").addClass("errorContat");

		$(".messageError").text(varUserNotValid);	
		send = false;
	}

	if(send)
	{ 		
		$(".hdn_idPermissions").val($("#idPermissions option:selected").val());
		$(".hdn_name").val($("#name_new").val());
		$(".hdn_email").val($("#email_new").val());
		$(".hdn_password").val($("#password_new").val());
		$(".hdn_phone").val($("#phone_new").val());
		$(".hdn_address").val($("#address_new").val());
		$(".hdn_cp").val($("#cp_new").val());

		$(".btn_create").click();						
	}

}
////// PRODUCT ///////////
function valProductNew()
{	
	product_cleanClassError();
	var send = true;
	var status = 0;
	
	if( $("#name_new").val() == "")
	{
		$("#name_new").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese el nombre del producto");
	}
	else if( $("#key_new").val() == "")
	{
		$("#key_new").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese la clave unica del modelo");
	}
	else if( $("#imageEdit_new").val() == "")
	{
		$("#imageEdit_new").addClass("errorContat");	send = false;
		$(".messageError").text("Ingrese la imagen del modelo");
	}

	if(send)
	{
		status = $("input[name=iStatus_new]:checked").val();
		$("#hdnIsatus_new").val(status)
		$(".btn_newProduct").click();						
	}
}

function product_cleanClassError()
{
	$("#name_new").removeClass("errorContat");
	$("#key_new").removeClass("errorContat");
	$("#imageEdit_new").removeClass("errorContat");
}

function ProductEdit(id)
{
	$.each(JSON_info_admin_product,function(i,product){
		if(product.idProduct == id)
		{
			var path = "/assets/images/products/" + product.vImage;
			$("#hdnImage").val(product.vImage);
			$("#hdnIdProduct").val(id);

			$('#typePurchase option[value='+ product.idTypePurchase +']').attr('checked',true);
			$('#typePurchase option[value='+ product.idTypePurchase +']').change();
			$('#typePurchase option[value='+ product.idTypePurchase +']').prop('selected', true);

			$('#typeProduct option[value='+ product.idTypeProduct +']').attr('checked',true);
			$('#typeProduct option[value='+ product.idTypeProduct +']').change();
			$('#typeProduct option[value='+ product.idTypeProduct +']').prop('selected', true);

			$("#name").val(product.vProduct);
			$("#description").val(product.vDescription);
			$("#descriptionDetail").val(product.vDescriptionDetail);
			$("#key").val(product.vClave);

			if(product.vImage == "")
			{
				$(".modalImg").slideUp();
			}
			else{
				$(".modalImg").slideDown();
				$(".modalImg").attr("src",path);
			}
			$("input[name=iStatus][value="+product.iStatus+"]").prop("checked", true);

			$(".productEdit").click();
		}
	});	
}

function valProductEdit()
{	
	product_cleanClassError();
	var send = true;
	var status = 0;
	
	if( $("#name").val() == "")
	{
		$("#name").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese el nombre del producto");
	}
	else if( $("#key").val() == "")
	{
		$("#key").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese la clave unica del modelo");
	}

	if(send)
	{ 
		status = $("input[name=iStatus]:checked").val();

		$("#hdnIsatus").val(status)
		$(".btn_product").click();						
	}
}

function ProductDelete(id)
{
	$(".hdnIdProduct_delete").val(id);
	$(".productDelete").click();
}
////// STOCK ///////////
function valStockProductNew()
{	
	stockProduct_cleanClassError();
	var send = true;
	var status = 0;
	
	if( $("#stock_new").val() == "")
	{
		$("#stock_new").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese la cantidad de modelos en inventario");
	}
	else if( $("#price_new").val() == "")
	{
		$("#price_new").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese el precio del modelo");
	}
	else if( $("#imageStock_new").val() == "")
	{
		$("#imageStock_new").addClass("errorContat");	send = false;
		$(".messageError").text("Ingrese la imagen del modelo");
	}

	if(send)
	{ 	
		if ($('#iStatus_new').is(':checked')) { status = 1;}

		$("#hdnIsatus_new").val(status)
		$(".btn_newStockProduct").click();						
	}
}

function stockProduct_cleanClassError()
{
	$("#stock_new").removeClass("errorContat");
	$("#price_new").removeClass("errorContat");
	$("#imageStock_new").removeClass("errorContat");
}

function StockProductEdit(id)
{
	$.each(JSON_stock_products,function(i,stock){
		if(stock.idStockProduct == id)
		{
			var path = "/assets/images/products/color/" + stock.vImage;
			$("#hdnImage").val(stock.vImage);
			$("#hdnIdStock").val(id);

			$('#idProduct option[value='+ stock.idProduct +']').attr('checked',true);
			$('#idProduct option[value='+ stock.idProduct +']').change();
			$('#idProduct option[value='+ stock.idProduct +']').prop('selected', true);

			$('#idBranch option[value='+ stock.idBranch +']').attr('checked',true);
			$('#idBranch option[value='+ stock.idBranch +']').change();
			$('#idBranch option[value='+ stock.idBranch +']').prop('selected', true);

			$('#idSize option[value='+ stock.idSize +']').attr('checked',true);
			$('#idSize option[value='+ stock.idSize +']').change();
			$('#idSize option[value='+ stock.idSize +']').prop('selected', true);

			$('#idColor option[value='+ stock.idColor +']').attr('checked',true);
			$('#idColor option[value='+ stock.idColor +']').change();
			$('#idColor option[value='+ stock.idColor +']').prop('selected', true);

			$("#stock").val(stock.iStock);
			$("#price").val(stock.iPrice);

			if(stock.vImage == "")
			{
				$(".modalImg").slideUp();
			}
			else{
				$(".modalImg").slideDown();
				$(".modalImg").attr("src",path);
			}

			var check = false;
			if(stock.iStatus = 1){ check= true;}
			$("#iStatus").prop("checked",check);

			$(".stockProductEdit").click();
		}
	});	
}

function valStockProductEdit()
{	
	stockProductEdit_cleanClassError();
	var send = true;
	var status = 0;
	
	if( $("#stock").val() == "")
	{
		$("#stock").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese la cantidad de modelos en inventario");
	}
	else if( $("#price").val() == "")
	{
		$("#price").addClass("errorContat");			send = false;
		$(".messageError").text("Ingrese el precio del modelo");
	}

	if(send)
	{ 	
		if ($('#iStatus').is(':checked')) { status = 1;}

		$("#hdnIsatus").val(status)
		$(".btn_editStockProduct").click();						
	}
}

function stockProductEdit_cleanClassError()
{
	$("#stock").removeClass("errorContat");
	$("#price").removeClass("errorContat");
}

function StockProductDelete(id)
{
	$(".hdnIdStockProduct_delete").val(id);
	$(".productDelete").click();
}

////// COLOR ///////////
function ColorEdit(id)
{
	
	$.each(JSON_color,function(i,color){
		if(color.idColor == id)
		{
			$("#vColor").val(color.vColor);
			$("#vColorCode").val(color.vColorCode);
			
			$(".hdn_idColor").val(color.idColor);
			$(".hdn_vImage").val(color.vImage);

			$(".colorEdit").click();
		}
	});	
}

function ColorDelete(id)
{
	$(".hdn_idColor_delete").val(id);
	$(".colorDelete").click();
}

function valColorEdit()
{
	color_cleanClassError();
	var send = true;


	if( $("#vColor").val() == "")
	{
		$("#vColor").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre del color");
	}
	else if( $("#vColorCode").val() == "")
	{
		$("#vColorCode").addClass("errorContat");	send = false;
		$(".messageError").text("Ingresa el codigo de color");
	}

	if(send)
	{ 	
		var status = 1;
		$(".hdn_vColor").val($("#vColor").val());
		$(".hdn_vColorCode").val($("#vColorCode").val());

		$(".btn_admin_update").click();						
	}
}

function color_cleanClassError()
{
	$("#vColor").removeClass("errorContat");
	$("#vColorCode").removeClass("errorContat");
}

function valColorNew()
{
	color_new_cleanClassError();
	var send = true;


	if( $("#vColor_new").val() == "")
	{
		$("#vColor_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre del color");
	}
	else if( $("#vColorCode_new").val() == "")
	{
		$("#vColorCode_new").addClass("errorContat");	send = false;
		$(".messageError").text("Ingresa el codigo de color");
	}

	if(send)
	{ 	
		$(".hdn_vColor_new").val($("#vColor_new").val());
		$(".hdn_vColorCode_new").val($("#vColorCode_new").val());

		$(".btn_admin_create").click();						
	}
}

function color_new_cleanClassError()
{
	$("#vColor_new").removeClass("errorContat");
	$("#vColorCode_new").removeClass("errorContat");
}





















//////////
function fnGenerales(){
	//Check Seccion
	$(".selActivo").click(function() {
		$(".hModuloActivo").val(parseInt($(this).attr("data-tipo")));
		$(".txtSelActivo").text($(this).text());
		BtnModuloActivo();
	});
	
	//Perfil
	$(".selDia").click(function() {
		$(".hDia").val($(this).text());
		$(".hTipoDia").val(parseInt($(this).attr("data-tipo")));
		$(".txtDia").text($(this).text());
	});
	$(".btnEliminaHorario").click(function() {
		$(".hIdHorario").val(parseInt($(this).attr("data-id")));
		$(".btnModalElimina").click();
	});
	//Servicios
	$(".btnEliminaServicio").click(function() {
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		$(".btnModalElimina").click();
	});
	//Citas
	$(".selTipoCita").click(function() {
		$(".txtTipoCita").text($(this).text());
		$(".hTipoCita").val(parseInt($(this).attr("data-tipo")));
	});
	$(".btnMoverCita").click(function() {
		if ($(".btnMoverCita").hasClass("muestra")) {
        	$(".muestraNuevaFecha").slideUp();
        	$(".btnMoverCita").removeClass("muestra")
        }
        else
        {
        	$(".muestraNuevaFecha").slideDown();
        	$(".btnMoverCita").addClass("muestra")
        }
	});
	$(".btnInfoCalendario").click(function() {
		var IdElemento = parseInt($(this).attr("data-id"));
		LimpiaModalVista();
		
		$.each(ArrayPacientes, function(i, info) {
            if (info.Id == IdElemento) {
            	$(".hNombreEliminar").val(info.Nombre + " " + info.Apellido);
                $(".txtTituloModal").text(info.Nombre + " " + info.Apellido);
                $(".txtNombreCitaModal").text(info.Nombre + " " + info.Apellido);
                $(".txtTelefonoCitaModal").text(info.Telefono);
                 
                var textoTipoCita = "";
                switch(info.TipoCita)
                {
            	 	case 1: textoTipoCita = "Online - Nutrición"; break;
                 	case 2: textoTipoCita = "Online - Entrenamiento en casa"; break;
                 	case 3: textoTipoCita = "Online - Entrenamiento GYM"; break;
                 	case 4: textoTipoCita = "Online - Nutrición y entrenamiento en casa"; break;
                 	case 5: textoTipoCita = "Online - Nutrición y entrenamiento GYM"; break;
                 	case 6: textoTipoCita = "Nutrición"; break;
                 	case 7: textoTipoCita = "Entrenamiento en casa"; break;
                 	case 8: textoTipoCita = "Entrenamiento GYM"; break;
                 	case 9: textoTipoCita = "Nutrición y entrenamiento en casa"; break;
                 	case 10: textoTipoCita = "Nutrición y entrenamiento GYM"; break;
                }
                var textoEstatus = "";
                switch(info.Estatus)
                {
            	 	case 0: 
            	 		textoEstatus = "Cita sin confirmar"; 
            	 		$(".btnConfirmarCita").slideDown();
            	 	break;
                 	case 1: 
                 		textoEstatus = "Cita confirmada"; 
            	 		$(".btnConfirmarCita").slideUp();
                 	break;
                 	default: 
                 		textoEstatus = "Cita sin confirmar";  
            	 		$(".btnConfirmarCita").slideDown();
                 	break;
                }
                $(".txtEstatusCitaModal").text(textoEstatus);
                
                $(".txtTipoCitaModal").text(textoTipoCita);
                $(".txtNotaCitaModal").text(info.Nota);
                $(".txtFechaCitaModal").text(info.Fecha.split("T")[0]);
                $(".txtHorarioCitaModal").text(info.Fecha.split("T")[1]);
                
                var fechaAct = info.Fecha.split("T")[0];
                var dia = fechaAct.split("-")[2];
                var mes = fechaAct.split("-")[1];
                var anio = fechaAct.split("-")[0];
                
                var $datepicker = $('#datepicker');
				$datepicker.datepicker();
				$datepicker.datepicker('setDate', mes+"/"+dia+"/"+anio);
				
				$(".btnMoverCita").attr("data-id",info.Id);
				$(".hIdMover").val(info.Id);
				
            }
        });
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		$(".btnModalVerCita").click();
	});
	
	$(".btnEliminaCita").click(function() {
		$(".btnCierraVista").click();
		$(".txtMensajeEliminarCita").text("Se eliminara la cita agendada para " + $(".hNombreEliminar").val());
		$(".btnModalEliminaCita").click();
	});
	$('.datepicker').datepicker({
		format: 'yyyy/mm/dd',
   		startDate: '-3d'
	});
	$('.datepicker2').datepicker({
		format: 'yyyy/mm/dd',
   		startDate: '-3d'
	});
	$('.datepicker3').datepicker({
		format: 'yyyy/mm/dd',
   		startDate: '-3d'
	});
	$('.datepicker4').datepicker({
		format: 'yyyy/mm/dd',
   		startDate: '-3d'
	});
	//Slider pacientes
	$(".btnEliminaSliderPacientes").click(function() {
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		$(".btnModalElimina").click();
	});
	//Paquetes
	$(".btnEliminaPaquetes").click(function() {
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		$(".btnModalElimina").click();
	});
	$(".btnAgregaDescripcion").click(function() {
		$(".hIdDescripcion").val(parseInt($(this).attr("data-id")));
		$(".btnModalAgregaDescripcion").click();
	});
	//Calendario
	$(".selDiaCalendario").click(function() {
		$(".hDia").val($(this).text());
		$(".hTipoDia").val(parseInt($(this).attr("data-tipo")));
		$(".txtDiaCalendario").text($(this).text());
	});
	$(".btnEliminaHorario").click(function() {
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		//$(".btnModalElimina").click();
	});
	//Comentario
	$(".btnEliminaComentario").click(function() {
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		$(".btnModalElimina").click();
	});
	//Preguntas frecuentes
	$(".btnEliminaPregunta").click(function() {
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		$(".btnModalElimina").click();
	});
	//Rutinas
	$(".btnEliminaRutina").click(function() {
		$(".hIdEliminar").val(parseInt($(this).attr("data-id")));
		$(".btnModalElimina").click();
	});
	$(".selRituna").click(function() {
		$(".hTipoRutina").val(parseInt($(this).attr("data-tipo")));
		$(".txtSelRutina").text($(this).text());
	});
	$(".btnAgregaDescripcionRutina").click(function() {
		$(".hIdDescripcion").val(parseInt($(this).attr("data-id")));
		$(".btnModalAgregaDescripcion").click();
	});
	//Miembros
	$(".btnAgregaMiembro").click(function() {
		$(".btnModalAgregaMiembro").click();
	});
	
}
function BtnSelCategoria(id,obj)
{
	$(".hSelCategoria").val(id);
	$(".txtSelCategoria").text($(obj).text());
}
function BtnAgregaProducto(Id)
{
	$(".hIdDescripcion").val(Id);
	$(".btnModalAgregaDescripcion").click();
}
function BtnEliminaSlider(Id)
{
	$(".hIdEliminar").val(Id);
	$(".btnModalElimina").click();
}
function BtnEliminaCategoria(Id)
{
	$(".hIdEliminar").val(Id);
	$(".btnModalElimina").click();
}
function BtnEliminaProducto(Id)
{
	$(".hIdEliminar").val(Id);
	$(".btnModalElimina").click();
}
function LimpiaModalAgendar()
{
	$(".txtAgendarNombre").val("");
	$(".txtAgendarApellido").val("");
	$(".txtAgendarTelefono").val("");
	$(".txtTipoCita").val("Selecciona el tipo de cita");
	$(".hTipoCita").val("");
}
function LimpiaModalVista()
{
	$(".hNombreEliminar").val("");
    $(".txtTituloModal").text();
    $(".txtNombreCitaModal").text();
    $(".txtTelefonoCitaModal").text();
	$(".txtTipoCitaModal").val("");
	$(".txtNotaCitaModal").val("");
}
//Perfil
function BtnGuardado(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")
	{
		$(".hHorarioEntrada").val($(".btnHorarioEntrada").val());
		$(".hHorarioSalida").val($(".btnHorarioSalida").val());
		$(".btnSubmit").click();
	}
	if(tipo == "4")
	{
		$(".btnSubmit").click();
	}
	
}
//Citas
function BtnGuardadoCita(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")
	{
		if($(".txtAgendarNombre").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el nombre");
			$(".btnModalErrorCita").click();
		}
		else if($(".txtAgendarApellido").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el apellido");
			$(".btnModalErrorCita").click();
		}
		else if($(".txtAgendarTelefono").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el telefono");
			$(".btnModalErrorCita").click();
		}
		else if($(".hTipoCita").val() == "")
		{ 
			$(".txtMensajeError").text("Seleccione el tipo de cita");
			$(".btnModalErrorCita").click();
		}
		else
		{
			var hora = "T" + $(".txtHorarioCita").val() + ":00";
			var fecha = $(".txtFechaAgendar").val();
			$(".hFecha").val(fecha+hora);
			$(".btnSubmit").click();
		}
	}
	if(tipo == "3")
	{
		$(".btnSubmit").click();
	}
	if(tipo == "4")
	{
		var splitfecha = $(".txtNuevaFechaAgendar").val();
		var horaMover = "T" + $(".txtNuevoHorarioCita").val() + ":00";
		var fechaMover = splitfecha.split("/")[2]+ "-"+splitfecha.split("/")[0]+ "-"+splitfecha.split("/")[1]
		$(".hFechaMover").val(fechaMover+horaMover);
		$(".btnSubmit").click();
	}
	if(tipo == "5")
	{
		$(".btnSubmit").click();
	}
	
}
function BtnGuardadoSlider(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda imagen
	{
		if($(".imagenNuevoSlider").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen");
			$(".btnModalErrorCita").click();
		}
		else if($(".txtSliderPosicion").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera la imagen");
			$(".btnModalErrorCita").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "3")
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoCategorias(tipo,id)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda imagen
	{
		if($(".imagenNuevoSlider").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen");
			$(".btnModalErrorCita").click();
		}
		else if($(".txtSliderNombre").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el nombre de la categoria");
			$(".btnModalErrorCita").click();
		}
		else if($(".txtSliderPosicion").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera la imagen");
			$(".btnModalErrorCita").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "3")
	{
		$(".btnSubmit").click();
	}
	if(tipo == "4")
	{
		$(".hEditaId").val(id);
		var clasNombre = ".txtNombreId-" + id;
		var clasPosicion = ".txtPosicionId-" + id;
		
		if($(clasNombre).val() == "")
		{
			$(".txtMensajeError").text("Ingrese el nombre de la categoria");
			$(".btnModalErrorCita").click();
		}
		else if($(clasPosicion).val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera la imagen");
			$(".btnModalErrorCita").click();
		}
		else
		{
			$(".hEditaNombre").val($(clasNombre).val());
			$(".hEditaPosicion").val($(clasPosicion).val());
			$(".btnSubmit").click();
		}
	}
}
function BtnGuardadoServicios(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda Servicio
	{
		if($(".hCardio").val() == "" && $(".imagenServicio1").val() == "")
		{
			$(".txtMensajeError").text("Seleccione la primer imagen");
			$(".btnModalErrorCita").click();
		}
		else if($(".hGimnasio").val() == "" && $(".imagenServicio2").val() == "")
		{
			$(".txtMensajeError").text("Seleccione la segunda");
			$(".btnModalErrorCita").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "3")
	{
		if($(".selEjercicioForm option:selected").val() == "")
		{
			$(".txtMensajeError").text("Seleccione el tipo de servicio");
			$(".btnModalErrorCita").click();
		}
		else if($(".txtSliderPosicion").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera el servicio");
			$(".btnModalErrorCita").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "4")
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoRecetario(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoSliderPacientes(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//Guarda imagen
	{
		if($(".imagenNuevoSliderPacientes").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtSliderPosicion").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera la imagen");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "4")//elimina imagen slider
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoPromocion(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//Guarda promoción
	{
		if($(".imagenNuevaPromocion").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen para la promoción");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtPrecioPromocion").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el precio de la promoción");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtProsicionPaquete").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera la promoción");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
		
	}
	if(tipo == "4")//Agrega producto
	{
		if($(".hTipoDia").val() == "0" || $(".hTipoDia").val() == "")
		{
			$(".txtMensajeError").text("Seleccione un producto asociado a la promoción");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtCantidadProductos").val() == "0" || $(".txtCantidadProductos").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la cantidad de productos en la promoción");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "6")//elimina promoción
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoPaquetes(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//Guarda imagen
	{
		if($(".imagenNuevoPaquete").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen para el paquete");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtNombrePaquete").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el nombre del paquete");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtPrecioPaquete").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el precio del paquete");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtProsicionPaquete").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera del paquete");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
		
	}
	if(tipo == "4")//elimina imagen slider
	{
		if($(".txtDescripcionPaquete").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la descripción del paquete");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "6")//elimina imagen slider
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoCalendario(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//Guarda horario
	{
		if($(".hTipoDia").val() == "")
		{
			$(".txtMensajeError").text("Seleccione un dia de la semana");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtClaseCalendario").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el nombre de la clase");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".btnHorarioEntrada").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la hora inicial de la clase");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".btnHorarioSalida").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la hora final de la clase");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			var horario =  $(".btnHorarioEntrada").val() + " - " + $(".btnHorarioSalida").val();
			$(".hHorarioCalendario").val(horario);
			$(".btnSubmit").click();
		}
		
	}
	if(tipo == "4")//elimina horario
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoCalculoIMC(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoComentarios(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//Guarda información
	{
		$(".btnSubmit").click();
	}
}
function BtnEditaComentarios(tipo,id)
{
	$(".TipoGuardado").val(tipo);
	$(".hIdEditar").val(id);
	if(tipo == "4")//Mostrar información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "6")//Ocultar información
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoPreguntasFrecuentes(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//Elimina información
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoRutinas(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		if($(".hNombreImagenRutinas").val() == "" && $(".ImagenRutinas").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen de fondo para la sección");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "3")//agrega rutina
	{
		if($(".hTipoRutina").val() == "")
		{
			$(".txtMensajeError").text("Seleccione el tipo de ejercicio");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtEjercicio").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el nombre del ejercicio");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "4")//Elimina rutina
	{
		$(".btnSubmit").click();
	}
	if(tipo == "6")//Elimina rutina
	{
		$(".btnSubmit").click();
	}
	if(tipo == "7")//Elimina rutina
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoProductos(tipo,id)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//agrega producto
	{
		if($(".hSelCategoria").val() == "" || $(".hSelCategoria").val() == "0")
		{
			$(".txtMensajeError").text("Seleccione una categoria para el producto");
			$(".btnModalErrorProducto").click();
		}
		else if($(".imagenNuevoProducto").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen para el producto");
			$(".btnModalErrorProducto").click();
		}
		else if($(".txtProdcuto").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el nombre del producto");
			$(".btnModalErrorProducto").click();
		}
		else if($(".txtPrecio").val() == "")
		{
			$(".txtMensajeError").text("Ingrese el precio del producto");
			$(".btnModalErrorProducto").click();
		}
		/*
		else if($(".txtCantidad").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la cantidad de productos en el inventario");
			$(".btnModalErrorProducto").click();
		}
		*/
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "4")//Elimina producto
	{
		$(".btnSubmit").click();
	}
	if(tipo == "6")//Editar producto
	{
		$(".hEditaId").val(id);
		var clasNombre = ".txtEditaNombre-" + id;
		var clasPrecio = ".txtEditaPrecio-" + id;
		var clasCantidad = ".txtEditaCantidad-" + id;
		
		if($(clasNombre).val() == "")
		{
			$(".txtMensajeError").text("Ingrese el nombre del producto");
			$(".btnModalErrorProducto").click();
		}
		else if($(clasPrecio).val() == "")
		{
			$(".txtMensajeError").text("Ingrese el precio del producto");
			$(".btnModalErrorProducto").click();
		}
		/*
		else if($(clasCantidad).val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la cantidad de productos en el inventario");
			$(".btnModalErrorProducto").click();
		}
		*/
		else
		{
			$(".hEditaNombre").val($(clasNombre).val());
			$(".hEditaPrecio").val($(clasPrecio).val());
			//$(".hEditaCantidad").val($(clasCantidad).val());
			$(".btnSubmit").click();
		}
	}
}
function BtnGuardadoMarcas(tipo,id)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//agrega producto
	{
		if($(".imagenNuevoProducto").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen para la marca");
			$(".btnModalErrorProducto").click();
		}
		else if($(".txtPosicion").val() == "")
		{
			$(".txtMensajeError").text("Ingrese la posición de la imagen");
			$(".btnModalErrorProducto").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "4")//Elimina producto
	{
		$(".btnSubmit").click();
	}
	if(tipo == "6")//Editar producto
	{
		$(".hEditaId").val(id);
		var clasPosicion = ".txtEditaPosicion-" + id;
		
		if($(clasPosicion).val() == "")
		{
			$(".txtMensajeError").text("Ingrese el precio de la categoria");
			$(".btnModalErrorProducto").click();
		}
		else
		{
			$(".hEditaPrecio").val($(clasPosicion).val());
			$(".btnSubmit").click();
		}
	}
}
function BtnGuardadoCarrito(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		if($(".hNombreImagenBanner").val() == "" && $(".ImagenBanner").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen de fondo para la sección");
			$(".btnModalErrorProducto").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
}
function BtnGuardadoTipoRutina(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		$(".btnSubmit").click();
	}
	if(tipo == "3")//Guarda rutina
	{
		if($(".imagenNuevoTipoRutina").val() == "")
		{
			$(".txtMensajeError").text("Seleccione una imagen");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtTipoRutinaTitulo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el tipo de rutina");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtTipoRutinaSubtitulo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el titulo");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtTipoRutinaTexto").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el mensaje");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtTipoRutinaPosicion").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la posición en la que aparecera la imagen");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
	if(tipo == "4")//elimina imagen slider
	{
		$(".btnSubmit").click();
	}
}
function BtnGuardadoVideo(tipo)
{

	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda información
	{
		if($(".hImagenVideo").val() == "" && $(".imagenVideo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la imagen de fondo");
			$(".btnModalErrorPacientes").click();
		}
		else if($(".txtUrlVideo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la url del video");
			$(".btnModalErrorPacientes").click();
		}
		else
		{
			$(".btnSubmit").click();
		}
	}
}
function BtnModuloActivo()
{
	$(".TipoGuardado").val("5");
	$(".btnSubmit").click();
}
function BtnGuardadoMiembro(tipo)
{
	$(".TipoGuardado").val(tipo);
	if(tipo == "1")//Cierra sesión
	{
		$(".btnSubmit").click();
	}
	if(tipo == "2")//Guarda Miembro
	{
		if($(".txtNombre").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el nombre");
			$(".btnModalError").click();
		}
		else if($(".txtApellido").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese los apellidos");
			$(".btnModalError").click();
		}
		else if($(".txtTelefono").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese un telefono de 10 dígitos");
			$(".btnModalError").click();
		}
		else if($(".txtEdad").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la edad del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtSexo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el sexo del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtCorreo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el correo del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtMunicipio").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el municipio del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtEstado").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el estado del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtPais").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el pais del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtFechaInicio").val() == "")
		{ 
			$(".txtMensajeError").text("Seleccione la fecha de inicio del paquete");
			$(".btnModalError").click();
		}
		else if($(".txtFechaFin").val() == "")
		{ 
			$(".txtMensajeError").text("Seleccione la fecha final del paquete");
			$(".btnModalError").click();
		}
		else if($(".txtPassword").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la contraseña para el perfil de usuario");
			$(".btnModalError").click();
		}
		else if($(".txtConfirmarPassword").val() == "")
		{ 
			$(".txtMensajeError").text("Por favor confirme la contraseña");
			$(".btnModalError").click();
		}
		else if($(".txtPassword").val() != $(".txtConfirmarPassword").val())
		{ 
			$(".txtMensajeError").text("Error al confirmar la contraseña");
			$(".btnModalError").click();
		}
		else
		{
			var fechaInicio = $(".txtFechaInicio").val();
			$(".hFechaInicio").val(fechaInicio.split("/")[2] + "-" + fechaInicio.split("/")[0] + "-" + fechaInicio.split("/")[1]);
			
			var fechaFin = $(".txtFechaFin").val();
			$(".hFechaFin").val(fechaFin.split("/")[2] + "-" + fechaFin.split("/")[0] + "-" + fechaFin.split("/")[1]);
			
			$(".btnSubmit").click();
		}
	}
	if(tipo == "3")//Elimina miembro
	{
		$(".btnSubmit").click();
	}
	if(tipo == "4")//Edita miembro
	{
		if($(".txtEditaNombre").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el nombre");
			$(".btnModalError").click();
		}
		else if($(".txtEditaApellido").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese los apellidos");
			$(".btnModalError").click();
		}
		else if($(".txtEditaTelefono").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese un telefono de 10 dígitos");
			$(".btnModalError").click();
		}
		else if($(".txtEditaEdad").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la edad del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtEditaSexo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el sexo del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtEditaCorreo").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el correo del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtEditaMunicipio").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el municipio del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtEditaEstado").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el estado del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtEditaPais").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese el pais del paciente");
			$(".btnModalError").click();
		}
		else if($(".txtEditaFechaInicio").val() == "")
		{ 
			$(".txtMensajeError").text("Seleccione la fecha de inicio del paquete");
			$(".btnModalError").click();
		}
		else if($(".txtEditaFechaFin").val() == "")
		{ 
			$(".txtMensajeError").text("Seleccione la fecha final del paquete");
			$(".btnModalError").click();
		}
		else if($(".txtEditaPassword").val() == "")
		{ 
			$(".txtMensajeError").text("Ingrese la contraseña para el perfil de usuario");
			$(".btnModalError").click();
		}
		else if($(".txtEditaConfirmarPassword").val() == "")
		{ 
			$(".txtMensajeError").text("Por favor confirme la contraseña");
			$(".btnModalError").click();
		}
		else if($(".txtEditaPassword").val() != $(".txtEditaConfirmarPassword").val())
		{ 
			$(".txtMensajeError").text("Error al confirmar la contraseña");
			$(".btnModalError").click();
		}
		else
		{
			var fechaInicio = $(".txtEditaFechaInicio").val();
			$(".hFechaInicio").val(fechaInicio.split("/")[2] + "-" + fechaInicio.split("/")[0] + "-" + fechaInicio.split("/")[1]);
			
			var fechaFin = $(".txtEditaFechaFin").val();
			$(".hFechaFin").val(fechaFin.split("/")[2] + "-" + fechaFin.split("/")[0] + "-" + fechaFin.split("/")[1]);
			
			$(".btnSubmit").click();
		}
	}
}
function BtnEliminaMiembro(Id)
{
	$(".hIdEliminar").val(Id);
	$(".btnModalElimina").click();
}
function BtnEditaMiembro(Id)
{
	$(".hIdEditar").val(Id);
	
	$.each(ArrayMiembros, function(i, info) {
        if (info.Id == Id) 
        {
			$(".txtEditaNombre").val(info.Nombre);
			$(".txtEditaApellido").val(info.Apellido);
			$(".txtEditaTelefono").val(info.Telefono);
			$(".txtEditaEdad").val(info.Edad);
			$(".txtEditaSexo").val(info.Sexo);
			$(".txtEditaCorreo").val(info.Correo);
			$(".txtEditaAlergias").val(info.Alergias);
			$(".txtEditaMunicipio").val(info.Municipio);
			$(".txtEditaEstado").val(info.Estado);
			$(".txtEditaPais").val(info.Pais);
			$(".txtEditaPeso").val(info.Peso);
			$(".txtEditaMusculoEsqueletico").val(info.MusculoEsqueletico);
			$(".txtEditaGrasaCorporal").val(info.GrasaCorporal);
			$(".txtEditaPorcentajeGrasaCorporal").val(info.PorcentajeGrasaCorporal);
			$(".txtEditaIMC").val(info.IMC);
			$(".txtArchivoInbody").text(info.InBody);
			$(".txtArchivoDieta").text(info.Dieta);
			$(".txtArchivoRutina").text(info.Rutina);
			
			var fechaInicio = info.FechaInicio;
			$(".txtEditaFechaInicio").val(fechaInicio.split("-")[1] + "/" + fechaInicio.split("-")[2] + "/" + fechaInicio.split("-")[0]);
			var fechaFin = info.FechaFin;
			$(".txtEditaFechaFin").val(fechaFin.split("-")[1] + "/" + fechaFin.split("-")[2] + "/" + fechaFin.split("-")[0]);
			
			$(".spanEditaPassword").text(info.Password);
			$(".txtEditaPassword").val(info.Password);
			$(".txtEditaConfirmarPassword").val(info.Password);
        }
    });
	$(".btnModalEditaMiembro").click();
}
function valTeclas(a, b) 
{
    if (a == 1) {
        tecla = (document.all) ? b.keyCode : b.which;
        if (tecla === 8) {
            return true
        }
        patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/;
        te = String.fromCharCode(tecla);
        return patron.test(te)
    } else {
        if (a === 2) {
            tecla = (document.all) ? b.keyCode : b.which;
            if (tecla === 8) {
                return true
            }
            patron = /[0-9]|[/]/;
            te = String.fromCharCode(tecla);
            return patron.test(te)
        } else {
            if (a == 3) {
                tecla = (document.all) ? b.keyCode : b.which;
                if (tecla == 8) {
                    return true
                }
                patron = /[0-9]/;
                te = String.fromCharCode(tecla);
                return patron.test(te)
            } else {
                if (a == 4) {
                    tecla = (document.all) ? b.keyCode : b.which;
                    if (tecla == 8) {
                        return true
                    }
                    patron = /[a-zA-Z]|[ ]/;
                    te = String.fromCharCode(tecla);
                    return patron.test(te)
                } else {
                    if (a == 5) {
                        tecla = (document.all) ? b.keyCode : b.which;
                        if (tecla == 8) {
                            return true
                        }
                        patron = /[a-zA-Z0-9]|[ ]/;
                        te = String.fromCharCode(tecla);
                        return patron.test(te)
                    } else {
                        if (a == 6) {
                            tecla = (document.all) ? b.keyCode : b.which;
                            if (tecla == 8) {
                                return true
                            }
                            patron = /[0-9]|[.]/;
                            te = String.fromCharCode(tecla);
                            return patron.test(te)
                        } else {
                            if (a == 7) {
                                tecla = (document.all) ? b.keyCode : b.which;
                                if (tecla == 8) {
                                    return true
                                }
                                patron = /[a-zA-Z0-9]|[ ]|[,]/;
                                te = String.fromCharCode(tecla);
                                return patron.test(te)
                            } else {
                                if (a == 8) {
                                    tecla = (document.all) ? b.keyCode : b.which;
                                    if (tecla == 8) {
                                        return true
                                    }
                                    patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/;
                                    te = String.fromCharCode(tecla);
                                    return patron.test(te)
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
function fnValidaTeclas(b, d) {
    $(d).blur();
    $(d).focus();
    var a = $(d).val();
    switch (parseInt(b)) {
    case 1:
        var c = RegExp("[A-Za-z0-9._@-s]+");
        a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, "");
        break;
    case 2:
        var c = RegExp("[0-9/+/s]+");
        a = a.replace(/[^0-9/\s]+/g, "");
        break;
    case 3:
        var c = RegExp("[0-9+/s]+");
        a = a.replace(/[^0-9\s]+/g, "");
        break;
    case 4:
        var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+");
        a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, "");
        break;
    case 5:
        var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+");
        a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, "");
        break;
    case 6:
        var c = RegExp("[0-9.]+");
        a = a.replace(/[^0-9.]+/g, "");
        break;
    case 7:
        var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+");
        a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, "");
        break;
    case 8:
        var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+");
        a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, "");
        break
    }
    $(d).val("");
    $(d).val(a)
}

