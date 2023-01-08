$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_choose,function(i,val){
		if(val.idChoose == id)
		{
			$('#vTime_edit').val(val.vTime);
			$("#vTimeInfo_edit").val(val.vTimeInfo);
			$("#vTeam_edit").val(val.vTeam);
			$("#vTeamInfo_edit").val(val.vTeamInfo);
			$("#vSatisfaction_edit").val(val.vSatisfaction);
			$("#vSatisfactionInfo_edit").val(val.vSatisfactionInfo);
			$("#vEstimate_edit").val(val.vEstimate);
			$("#vEstimateInfo_edit").val(val.vEstimateInfo);

			$(".hdnId_update").val(id);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($('#vTime_edit').val() == "" || 
		$("#vTeam_edit").val() == "" || 
		$("#vSatisfaction_edit").val() == "" || 
		$("#vEstimate_edit").val() == "")
	{
		send = false;
		$(".messageError").text("Ingrese el titulo de las 4 secciones");
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
