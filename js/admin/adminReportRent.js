$(document).ready(function () {

	$("#date").change(function() {

		var date  = $("#date").val();
		$(".search").val(date);
		$(".search").keyup();
	});

	$("#iStatus").change(function() {

		var id = $("#iStatus option:selected").val();
		$(".hdn_iStatus").val(id);

	});
});

function Edit(idSchedule,vUser,vUserAdmin,vBranch,vProduct,vSize,vColor,vHour,vTypeSchedule,vPrice,vAvance,iPending,vDateEvent,vDateDelivery)
{
	$("#titleEdit").text(" #" + idSchedule);
	$("#socio").text(vUser);
	$("#vendedor").text(vUserAdmin);
	$("#sucursal").text(vBranch);
	$("#modelo").text(vProduct);
	$("#talla").text(vSize);
	$("#color").text(vColor);
	$("#hora").text(vHour);
	$("#tipoCita").text(vTypeSchedule);
	$("#total").text("$" + vPrice);
	$("#adelanto").text("$" + vAvance);
	$("#pendiente").text("$" + iPending);

	$("#fechaEvento").text(vDateEvent);
	$("#fechaRegreso").text(vDateDelivery);

	var iStatus = 0;
	$.each(JSON_info_schedule, function(i, schedule){

		if(schedule.idSchedule == idSchedule)
		{
			iStatus = schedule.iStatus;
		}
	});
	$("#iStatus option[value='"+iStatus+"']").attr('checked',true);
	$("#iStatus option[value='"+iStatus+"']").change();
	$("#iStatus option[value='"+iStatus+"']").prop('selected', true);

	$(".hdn_idSchedule_update").val(idSchedule);

	$(".modalEdit").click();
}

function valEdit()
{
	$(".hdn_iStatus").val($("#iStatus option:selected").val());
	$(".btn_update").click();	
}

function Delete(id)
{
	$(".hdn_idSchedule_delete").val(id);
	$(".modalDelete").click();
}