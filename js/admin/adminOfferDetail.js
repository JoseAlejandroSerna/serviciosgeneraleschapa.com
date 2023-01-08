$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_offerDetail,function(i,val){
		if(val.idOfferDetail == id)
		{
			$('#title_edit option[value="' + val.idOffer + '"]');

			$('#title_edit option[value="' + val.idOffer + '"]').prop("selected", true);
			$('#title_edit option[value="' + val.idOffer + '"]').change();

			$("#description_edit").val(val.vOfferDetail);

			$(".hdnId_update").val(id);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($("#title_edit option:selected").val() == "0" || $("#description_edit").val() == "")
	{
		send = false;
		$(".messageError").text("Actualice la información por favor");
	}

	if(send)
	{
		$(".hdnIdOffer_update").val($("#title_edit option:selected").val());
		$(".btn_update").click();
	}
}

function valNew()
{
	var send = true;

	if($("#title_new option:selected").val() == "0")
	{
		send = false;
		$(".messageError").text("Selecciona el paquete");
	}
	else if( $("#description_new").val() == "")
	{
		$("#description_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el detalle del paquete.");
	}

	if(send)
	{
		$(".hdnIdOffer_create").val($("#title_new option:selected").val());
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdnId_delete").val(id);
	$(".btnDelete").click();
}
