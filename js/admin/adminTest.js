var JSON_TEST = [];


$(document).ready(function () {
	eventChange();
	$(".contQuiz").slideUp();
});

function valForm(id)
{
	cleanClassError();
	var send = true;

	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

	$.each(JSON_questions,function(i,val){
		var id = "#test_" + val.idQuestions;
		var idform = "#form_test_" + val.idQuestions;
		if( $(id).val() == "")
		{
			$(idform).addClass("errorContat");		send = false;
			$(".messageError").text("Por favor responda todas las preguntas de la encuenta");
		}
	});

	if(send)
	{ 		
		$.each(JSON_questions,function(i,val){
			var id = "#test_" + val.idQuestions;
			var todayDate = new Date().toISOString().slice(0, 10);

			
			JSON_TEST.push({
				"vUserTest": $(id).val(),
				"idQuestions": val.idQuestions,
				"vDate":todayDate,
			});
		});


		$(".hdn_hourTest").val(time);
		$(".hdn_commentTest").val($("#commentTest").val());
		$(".hdn_strTest_create").val(JSON.stringify(JSON_TEST));
		$(".btn_create").click();					
	}
}

function cleanClassError()
{
	$.each(JSON_questions,function(i,val){
		var idform = "#form_test_" + val.idQuestions;
		$(idform).removeClass("errorContat");
	});
}

function eventChange()
{
	$("input:radio").change(function(){
		var clas = $(this).attr("data-count");
		var id = "." + clas;
		$(id).val($(this).val());
	});
}

function valUser()
{
	$.each(JSON_all_user,function(i,user){
		if(user.vEmail == $("#email").val())
		{
			$(".hdn_idUser_create").val(user.idUser);
			$("#email").prop('disabled', true);
			userValid = false;

			$(".contQuiz").slideDown();
		}
	});
}

