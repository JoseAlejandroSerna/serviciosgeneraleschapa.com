$(document).ready(function () {

});

function Edit(id)
{
	$.each(JSON_branch_phone,function(i,val){
		if(val.idBranchPhone == id)
		{
			$("#name").val(val.vBranchPhone);
			$("#phone").val(val.iBranchPhone);
			
			$("#hdnId").val(val.idBranchPhone);

			$(".modalEdit").click();
		}
	});	
}

function valEdit()
{
	cleanClassError();
	var send = true;


	if( $("#name").val() == "")
	{
		$("#name").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre del teléfono");
	}
	else if( $("#phone").val() == "")
	{
		$("#phone").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nuevo teléfono");
	}

	if(send)
	{ 	
		$(".btn_update").click();							
	}
}

function cleanClassError()
{
	$("#name").removeClass("errorContat");
	$("#phone").removeClass("errorContat");
	$(".messageError").text("");
}

function Delete(id)
{
	$(".hdn_id_delete").val(id);
	$(".modalDelete").click();
}

function cleanClassError_new()
{
	$("#name_new").removeClass("errorContat");
	$("#phone_new").removeClass("errorContat");
	$(".messageError").text("");
}

function valNew()
{
	cleanClassError_new();
	var send = true;


	if( $("#name_new").val() == "")
	{
		$("#name_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre del teléfono");
	}
	else if( $("#phone_new").val() == "")
	{
		$("#phone_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nuevo teléfono");
	}

	if(send)
	{ 	
		$(".btn_create").click();							
	}
}