$(document).ready(function () {
});

function Edit(id)
{
	
	$.each(JSON_quiz,function(i,val){
		if(val.idQuiz == id)
		{
			$("#name_edit").val(val.vQuiz);
			$(".hdn_idQuiz_update").val(val.idQuiz);
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
		$(".hdn_vQuiz_update").val($("#name_edit").val());
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
		$(".messageError").text("Ingrese el nombre de la encuesta");
	}

	if(send)
	{ 	
		var status = 1;
		$(".hdn_vQuiz_create").val($("#name_new").val());
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
	$(".hdn_idQuiz_delete").val(id);
	$(".btn_modalDelete").click();
}

function View(id)
{
	$.each(JSON_quiz,function(i,val){
		if(val.idQuiz == id)
		{
			$(".hdn_idQuiz_view").val(id);
			$(".hdn_vQuiz_view").val(val.vQuiz);
			$(".btn_view").click();
		}
	});	
							
	
}