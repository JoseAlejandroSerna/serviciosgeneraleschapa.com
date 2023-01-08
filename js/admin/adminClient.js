$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_client,function(i,val){
		if(val.idClient == id)
		{
			$("#title_edit").val(val.vClient);

			$(".modalImg").attr("src",PATH_CLIENTS_ADMIN + val.vImage);
			
			$(".hdnId_update").val(id);
			$(".hdnImage").val(val.vImage);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($("#title_edit").val() == "" && $("#image_edit").val() == "")
	{
		send = false;
		$(".messageError").text("Actualice la información por favor");
	}

	if(send)
	{
		$(".btn_update").click();
	}
}

function valNew()
{
	$("#image_new").removeClass("errorContat");

	var send = true;

	if($("#title_new").val() == "")
	{
		send = false;
		$(".messageError").text("Ingrese el nomnbre del cliente");
	}
	else if( $("#image_new").val() == "")
	{
		$("#image_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese una imagen");
	}

	if(send)
	{
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdnId_delete").val(id);
	$(".btnDelete").click();
}
