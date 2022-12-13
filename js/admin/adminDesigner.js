$(document).ready(function () {
	initializeCheck();
});

function initializeCheck()
{
	//Home
	var iCheck_1_home = false;
	var iCheck_2_home = false;
	var iCheck_3_home = false;
	var iCheck_4_home = false;
	var iCheck_5_home = false;

	$.each(JSON_main, function(i, main){
		if(main.iCheck1 == 1){ iCheck_1_home = true; }
		if(main.iCheck2 == 1){ iCheck_2_home = true; }
		if(main.iCheck3 == 1){ iCheck_3_home = true; }
		if(main.iCheck4 == 1){ iCheck_4_home = true; }
		if(main.iCheck5 == 1){ iCheck_5_home = true; }
	});

	$("#check_1").prop( "checked",iCheck_1_home);
	$("#check_2").prop( "checked",iCheck_2_home);
	$("#check_3").prop( "checked",iCheck_3_home);
	$("#check_4").prop( "checked",iCheck_4_home);
	$("#check_5").prop( "checked",iCheck_5_home);

	//Designer
	var iCheck_1 = false;

	$.each(JSON_designer, function(i, designer){
		if(designer.iCheck1 == 1){ iCheck_1 = true; }
	});

	$("#check_1_designer").prop( "checked",iCheck_1);

	
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

function validationDesigner()
{
	cleanClassErrorDesigner();
	var send = true;
	var txtError = "El formato debe ser en formato mp4";

	var vVideoSeccion1 = $("#vVideoSeccion1_designer").val();

	if(vVideoSeccion1 != "")
	{
		if(!valExtension(vVideoSeccion1))
		{
			$("#vVideoSeccion1_designer").addClass("errorContat");		send = false;
			$(".messageError").text(txtError);
		}
	}


	if(!$('#check_1_designer').is(":checked")){	$(".hdn_iCheck_1_designer").val("0");	}

	if(send)
	{ 	
		$(".btnSave_designer").slideUp();
		$("#btn_save_designer").click();							
	}

}

function cleanClassErrorDesigner()
{
	$("#vVideoSeccion1_designer").removeClass("errorContat");
	$(".messageError").text("");
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