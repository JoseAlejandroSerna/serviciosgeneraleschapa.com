$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_slider,function(i,val){
		if(val.idSlider == id)
		{
			$("#title_edit").val(val.vSlider);
			$("#description_edit").val(val.vInformation);

			$(".modalImg").attr("src",PATH_SLIDES + val.vImage);
			
			$(".hdnIdSlider_update").val(id);
			$(".hdnImage").val(val.vImage);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($("#title_edit").val() == "" && $("#description_edit").val() == "" && $("#image_edit").val() == "")
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

	if( $("#image_new").val() == "")
	{
		$("#image_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese una imagen.");
	}

	if(send)
	{ 	
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdnIdSlider_delete").val(id);
	$(".btnDelete").click();
}
