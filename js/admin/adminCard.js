$(document).ready(function () {
	$(".contForm").slideUp();

	//New
	$("#dateStart_new").change(function() {
		var date  = $("#dateStart_new").val();
		$(".hdn_dateStart_new").val(date);
	});

	$("#dateEnd_new").change(function() {
		var date  = $("#dateEnd_new").val();
		$(".hdn_dateEnd_new").val(date);
	});

	//Edit
	$("#dateStart").change(function() {
		var date  = $("#dateStart").val();
		$(".hdn_dateStart").val(date);
	});

	$("#dateEnd").change(function() {
		var date  = $("#dateEnd").val();
		$(".hdn_dateEnd").val(date);
	});
});

function Edit(id)
{
	$.each(JSON_cardModel,function(i,card){
		if(card.idCard == id)
		{
			$.each(JSON_all_user,function(i,user){
				if(user.idUser == card.idUser)
				{
					$("#email").val(user.vEmail);
				}
			});

			$(".hdn_idCard").val(card.idCard);
			$(".hdn_idUser").val(card.idUser);
			$(".hdn_dateStart").val(card.vStartDate);
			$(".hdn_dateEnd").val(card.vEndDate);
			$(".hdn_iNumberPurchases").val(card.iNumberPurchases);
			
			$("#cardNumber").val(card.vCardNumber);
			$("#dateStart").val(card.vStartDate);
			$("#dateEnd").val(card.vEndDate);

			$(".modalEdit").click();
		}
	});	
}

function Delete(id)
{
	$(".hdn_idUser_delete").val(id);
	$(".modalDelete").click();
}

function valEdit()
{
	$("#cardNumber").removeClass("errorContat");
	$("#dateStart").removeClass("errorContat");
	$("#dateEnd").removeClass("errorContat");

	var send = true;
	if( $("#email").val() == "")
	{
		$("#email").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el correo del socio");
	}
	else if(!valEmail($("#email").val()))
	{
		$("#email").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el correo del socio");
	}
	else if( $("#cardNumber").val() == "")
	{
		$("#cardNumber").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el numero de la tarjeta");
	}
	else if( $("#dateStart").val() == "")
	{
		$("#dateStart").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la fecha de inicio de la tarjeta");
	}
	else if( $("#dateEnd").val() == "")
	{
		$("#dateEnd").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la fecha final de la tarjeta");
	}

	if(send)
	{ 
		$(".btn_update").click();						
	}
}

function valNew()
{
	$("#cardNumber_new").removeClass("errorContat");
	$("#dateStart_new").removeClass("errorContat");
	$("#dateEnd_new").removeClass("errorContat");

	var send = true;
	if( $("#email_new").val() == "")
	{
		$("#email_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el correo del socio");
	}
	else if(!valEmail($("#email_new").val()))
	{
		$("#email_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el correo del socio");
	}
	else if( $("#cardNumber_new").val() == "")
	{
		$("#cardNumber_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el numero de la tarjeta");
	}
	else if( $("#dateStart_new").val() == "")
	{
		$("#dateStart_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la fecha de inicio de la tarjeta");
	}
	else if( $("#dateEnd_new").val() == "")
	{
		$("#dateEnd_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la fecha final de la tarjeta");
	}

	if(send)
	{ 
		$(".btn_create").click();						
	}
}

function valUser_new()
{
	$("#email_new").removeClass("errorContat");
	var userValid = false;
	$.each(JSON_all_user,function(i,user){
		if(user.vEmail == $("#email_new").val() && user.iStatus != "0")
		{
			$(".hdn_idUser_new").val(user.idUser);
			userValid = true;
			$(".contForm").slideDown();
		}
	});

	if(!userValid)
	{
		$("#email_new").val("");
		$("#email_new").addClass("errorContat");
		$(".messageError").text("El usuario " + $("#email_new").val() + " no existe o se encuentra en lista negra");
		$(".contForm").slideUp();
	}

}

function valEmail(email)
{
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var isEmail = regex.test(email); 

	return isEmail;
}

function View(id)
{
	$.each(JSON_cardModel,function(i,card){
		if(card.idCard == id)
		{
			$.each(JSON_all_user,function(i,user){
				if(user.idUser == card.idUser)
				{
					$(".hdn_vUser_view").val(user.vUser);
				}
			});

			$(".hdn_idCard_view").val(id);
			$(".btn_view").click();
		}
	});	
							
	
}