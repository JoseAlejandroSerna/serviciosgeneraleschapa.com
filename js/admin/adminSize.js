$(document).ready(function () {
	
});

function Edit(id)
{
	
	$.each(JSON_size,function(i,size){
		if(size.idSize == id)
		{
			$("#vSize").val(size.vSize);
			$(".hdn_idSize").val(size.idSize);
			$(".modalEdit").click();
		}
	});	
}

function Delete(id)
{
	$(".hdn_idSize_delete").val(id);
	$(".modalDelete").click();
}

function valEdit()
{
	
	$("#vSize").removeClass("errorContat");
	var send = true;

	if( $("#vSize").val() == "")
	{
		$("#vSize").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre o numero del talla");
	}

	if(send)
	{ 	
		var status = 1;
		$(".hdn_vSize").val($("#vSize").val());
		$(".btn_admin_update").click();						
	}
}


function valNew()
{
	$("#vSize_new").removeClass("errorContat");
	var send = true;


	if( $("#vSize_new").val() == "")
	{
		$("#vSize_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre del color");
	}

	if(send)
	{ 	
		$(".hdn_vSize_new").val($("#vSize_new").val());
		$(".btn_admin_create").click();						
	}
}
