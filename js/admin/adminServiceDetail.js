$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_serviceDetail,function(i,val){
		if(val.idServiceDetail == id)
		{
			$('#title_edit option[value="' + val.idService + '"]');

			$('#title_edit option[value="' + val.idService + '"]').prop("selected", true);
			$('#title_edit option[value="' + val.idService + '"]').change();

			$("#description_edit").val(val.vServiceDetail);

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
		$(".hdnIdService_update").val($("#title_edit option:selected").val());
		$(".btn_update").click();
	}
}

function valNew()
{
	var send = true;

	if($("#title_new option:selected").val() == "0")
	{
		send = false;
		$(".messageError").text("Selecciona el servicio");
	}
	else if( $("#description_new").val() == "")
	{
		$("#description_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el detalle del servicio.");
	}

	if(send)
	{
		$(".hdnIdService_create").val($("#title_new option:selected").val());
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdnId_delete").val(id);
	$(".btnDelete").click();
}
