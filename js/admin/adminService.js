$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_service,function(i,val){
		if(val.idService == id)
		{
			$("#title_edit").val(val.vService);
			$("#description_edit").val(val.vInformation);

			$(".modalImg").attr("src",PATH_SERVICE_WE_PROVIDE + val.vImage);
			
			$(".hdnId_update").val(id);
			$(".hdnImage").val(val.vImage);
			$(".hdnImage2").val(val.vImage2);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($("#title_edit").val() == "" && $("#description_edit").val() == "" && $("#image_edit").val() == "" && $("#image2_edit").val() == "")
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
	$("#image2_new").removeClass("errorContat");

	var send = true;

	if( $("#image_new").val() == "")
	{
		$("#image_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese una imagen.");
	}else if( $("#image2_new").val() == "")
	{
		$("#image2_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese una imagen.");
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
