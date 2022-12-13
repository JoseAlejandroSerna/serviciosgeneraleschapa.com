$(document).ready(function () {
	initializeCheck();
});

function initializeCheck()
{
	var iCheck_1 = false;
	var iCheck_2 = false;
	var iCheck_3 = false;
	var iCheck_4 = false;
	var iCheck_5 = false;

	$.each(JSON_main, function(i, main){

		if(main.iCheck1 == 1){ iCheck_1 = true; }
		if(main.iCheck2 == 1){ iCheck_2 = true; }
		if(main.iCheck3 == 1){ iCheck_3 = true; }
		if(main.iCheck4 == 1){ iCheck_4 = true; }
		if(main.iCheck5 == 1){ iCheck_5 = true; }
		
	});

	$("#check_1").prop( "checked",iCheck_1);
	$("#check_2").prop( "checked",iCheck_2);
	$("#check_3").prop( "checked",iCheck_3);
	$("#check_4").prop( "checked",iCheck_4);
	$("#check_5").prop( "checked",iCheck_5);
}

function validation()
{
	cleanClassError();
	var send = true;
	var txtError = "El formato debe ser en formato mp4";

	var vVideoSeccion1 = $("#vVideoSeccion1").val();
	var vVideoSeccion2 = $("#vVideoSeccion2").val();
	var vVideoSeccion3 = $("#vVideoSeccion3").val();
	var vVideoSeccion4 = $("#vVideoSeccion4").val();
	var vVideoSeccion5 = $("#vVideoSeccion5").val();

	if(vVideoSeccion1 != "")
	{
		if(!valExtension(vVideoSeccion1))
		{
			$("#vVideoSeccion1").addClass("errorContat");		send = false;
			$(".messageError").text(txtError);
		}
	}
	else if(vVideoSeccion2 != "")
	{
		if(!valExtension(vVideoSeccion2))
		{
			$("#vVideoSeccion2").addClass("errorContat");		send = false;
			$(".messageError").text(txtError);
		}
	}
	else if(vVideoSeccion3 != "")
	{
		if(!valExtension(vVideoSeccion3))
		{
			$("#vVideoSeccion3").addClass("errorContat");		send = false;
			$(".messageError").text(txtError);
		}
	}
	else if(vVideoSeccion4 != "")
	{
		if(!valExtension(vVideoSeccion4))
		{
			$("#vVideoSeccion4").addClass("errorContat");		send = false;
			$(".messageError").text(txtError);
		}
	}
	else if(vVideoSeccion5 != "")
	{
		if(!valExtension(vVideoSeccion5))
		{
			$("#vVideoSeccion5").addClass("errorContat");		send = false;
			$(".messageError").text(txtError);
		}
	}


	if(!$('#check_1').is(":checked")){	$(".hdn_iCheck_1").val("0");	}
	if(!$('#check_2').is(":checked")){	$(".hdn_iCheck_2").val("0");	}
	if(!$('#check_3').is(":checked")){	$(".hdn_iCheck_3").val("0");	}
	if(!$('#check_4').is(":checked")){	$(".hdn_iCheck_4").val("0");	}
	if(!$('#check_5').is(":checked")){	$(".hdn_iCheck_5").val("0");	}

	if(send)
	{ 	
		$(".btnSave").slideUp();
		$("#btn_save").click();							
	}

}

function valExtension(file) {
    var extension = file.substr( (file.lastIndexOf('.') +1) );
	var valid = false;
    switch(extension) {
        case 'mp4':
            valid = true;
        break;
    }

	return valid;
};

function cleanClassError()
{
	$("#vVideoSeccion1").removeClass("errorContat");
	$("#vVideoSeccion2").removeClass("errorContat");
	$("#vVideoSeccion3").removeClass("errorContat");
	$("#vVideoSeccion4").removeClass("errorContat");
	$("#vVideoSeccion5").removeClass("errorContat");
	$(".messageError").text("");
}