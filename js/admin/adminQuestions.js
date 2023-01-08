$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_questions,function(i,val){
		if(val.idQuestion == id)
		{
			$('#title_edit').val(val.vQuestion);
			$("#description_edit").val(val.vResponse);

			$(".hdnId_update").val(id);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($('#title_edit').val() == "" || $("#description_edit").val() == "")
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
	var send = true;

	if($('#title_new').val() == "")
	{
		send = false;
		$(".messageError").text("Ingrese una pregunta");
	}
	else if( $("#description_new").val() == "")
	{
		$("#description_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese una respuesta");
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
