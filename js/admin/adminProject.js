$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_project,function(i,val){
		if(val.idProject == id)
		{
			$('#service_edit option[value="' + val.idService + '"]');

			$('#service_edit option[value="' + val.idService + '"]').prop("selected", true);
			$('#service_edit option[value="' + val.idService + '"]').change();
			
			$("#title_edit").val(val.vProject);
			$("#description_edit").val(val.vInformation);

			$(".modalImg").attr("src",PATH_OUR_PROJECTS + val.vImage);
			
			$(".hdnId_update").val(id);
			$(".hdnImage").val(val.vImage);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($("#service_edit option:selected").val() == "0" || $("#title_edit").val() == "" && $("#description_edit").val() == "" && $("#image_edit").val() == "")
	{
		send = false;
		$(".messageError").text("Actualice la información por favor");
	}

	if(send)
	{
		$(".hdnIdService_update").val($("#service_edit option:selected").val());
		$(".btn_update").click();
	}
}

function valNew()
{
	$("#image_new").removeClass("errorContat");

	var send = true;

	if($("#service_new option:selected").val() == "0")
	{
		send = false;
		$(".messageError").text("Selecciona el servicio");
	}
	else if( $("#image_new").val() == "")
	{
		$("#image_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese una imagen.");
	}

	if(send)
	{ 	
		$(".hdnIdService_create").val($("#service_new option:selected").val());
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdnId_delete").val(id);
	$(".btnDelete").click();
}
