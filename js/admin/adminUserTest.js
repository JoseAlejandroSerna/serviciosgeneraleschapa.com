$(document).ready(function () {
});

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

function ViewTest(idQuiz,vHourTest)
{
	$(".hdn_idQuiz_test").val(idQuiz);
	$(".hdn_vHourTest_test").val(vHourTest);
	$(".btn_view_test").click();
}

function Delete(id,vHourTest)
{
	$(".hdn_idQuiz_delete").val(id);
	$(".hdn_hourTest_delete").val(vHourTest);
	
	$(".modalDelete").click();
}