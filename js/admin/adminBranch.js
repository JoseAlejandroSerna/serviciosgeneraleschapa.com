$(document).ready(function () {

});

function Edit(id)
{
	$.each(JSON_branch,function(i,val){
		if(val.idBranch == id)
		{
			var path = "/assets/images/branch/" + val.vImage;
			$("#name").val(val.vBranch);
			$("#address").val(val.vAddress);
			$("#cp").val(val.vCP);
			$("#email").val(val.vEmail);
			$("#latitude").val(val.vLatitude);
			$("#longitude").val(val.vLongitude);
			
			$("#hdnImage").val(val.vImage);
			$("#hdnId").val(val.idBranch);
			
			$("#vImageBranch").attr("src",path);

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
		$(".messageError").text("Ingrese el nombre de la sucursal");
	}
	else if( $("#address").val() == "")
	{
		$("#address").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la direccin de la sucursal");
	}
	else if( $("#cp").val() == "")
	{
		$("#cp").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el codigo postal de la sucursal");
	}
	else if( $("#email").val() == "")
	{
		$("#email").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el correo de la sucursal");
	}
	else if( $("#latitude").val() == "")
	{
		$("#latitude").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la latitud de la sucursal");
	}
	else if( $("#longitude").val() == "")
	{
		$("#longitude").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la longitud de la sucursal");
	}

	if(send)
	{ 	
		$(".btn_update").click();							
	}
}

function cleanClassError()
{
	$("#name").removeClass("errorContat");
	$("#address").removeClass("errorContat");
	$("#cp").removeClass("errorContat");
	$("#email").removeClass("errorContat");
	$("#latitude").removeClass("errorContat");
	$("#longitude").removeClass("errorContat");
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
	$("#address_new").removeClass("errorContat");
	$("#cp_new").removeClass("errorContat");
	$("#email_new").removeClass("errorContat");
	$("#latitude_new").removeClass("errorContat");
	$("#longitude_new").removeClass("errorContat");
	$(".messageError").text("");
}

function valNew()
{
	cleanClassError_new();
	var send = true;


	if( $("#name_new").val() == "")
	{
		$("#name_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre de la sucursal");
	}
	else if( $("#address_new").val() == "")
	{
		$("#address_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la direccin de la sucursal");
	}
	else if( $("#cp_new").val() == "")
	{
		$("#cp_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el codigo postal de la sucursal");
	}
	else if( $("#email_new").val() == "")
	{
		$("#email_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el correo de la sucursal");
	}
	else if( $("#latitude_new").val() == "")
	{
		$("#latitude_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la latitud de la sucursal");
	}
	else if( $("#longitude_new").val() == "")
	{
		$("#longitude_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la longitud de la sucursal");
	}
	else if( $("#vImage_new").val() == "")
	{
		$("#vImage_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la imagen de la sucursal");
	}

	if(send)
	{ 	
		$(".btn_create").click();							
	}
}

function View(id)
{
	$.each(JSON_branch,function(i,val){
		if(val.idBranch == id)
		{
			$(".hdn_vBranch_view").val(val.vBranch);
			$(".hdn_id_view").val(val.idBranch);
			$(".btn_view").click();
		}
	});	
							
	
}