$(document).ready(function () {
});

function Edit(id)
{
	
	$.each(JSON_questions,function(i,val){
		if(val.idQuestions == id)
		{
			$("#name_edit").val(val.vQuestions);
			$(".hdn_idQuestions_update").val(val.idQuestions);
			$(".btn_modalEdit").click();
		}
	});	
}

function valEdit()
{
	cleanClassError();
	var send = true;


	if( $("#name_edit").val() == "")
	{
		$("#name_edit").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre de la encuesta");
	}

	if(send)
	{ 	
		var status = 1;
		$(".hdn_vQuestions_update").val($("#name_edit").val());
		$(".btn_update").click();						
	}
}

function valNew()
{
	cleanClassError();
	var send = true;


	if( $("#name_new").val() == "")
	{
		$("#name_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese una pregunta para la encuesta");
	}

	if(send)
	{ 	
		var status = 1;
		$(".hdn_vQuestions_create").val($("#name_new").val());
		$(".btn_create").click();						
	}
}

function cleanClassError()
{
	$("#name_edit").removeClass("errorContat");
	$("#name_new").removeClass("errorContat")
}

function Delete(id)
{
	$(".hdn_id_delete").val(id);
	$(".btn_modalDelete").click();
}
