$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_promotion,function(i,val){
		if(val.idPromotion == id)
		{
			$("#vPromotion").val(val.vPromotion);
			$("#vDiscount").val(val.vDiscount);
			$("[name=iStatus]").val([val.iStatus]);

			$("#idTypePromotion option[value='"+val.idTypePromotion+"']").attr('checked',true);
			$("#idTypePromotion option[value='"+val.idTypePromotion+"']").change();
			$("#idTypePromotion option[value='"+val.idTypePromotion+"']").prop('selected', true);

			$("#iCountPurchase").val(val.iCountPurchase);
			$("#iTotalPurchase").val(val.iTotalPurchase);
			
			$(".hdn_idPromotion").val(id);
			$(".modalEdit").click();
		}
	});	
}

function valEdit()
{
	$("#vPromotion").removeClass("errorContat");
	$("#vDiscount").removeClass("errorContat");
	$("#iStatus").removeClass("errorContat");
	$("#idTypePromotion").removeClass("errorContat");
	$("#iCountPurchase").removeClass("errorContat");

	var send = true;

	if( $("#vPromotion").val() == "")
	{
		$("#vPromotion").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre de la promoción");
	}
	else if( $("#vDiscount").val() == "")
	{
		$("#vDiscount").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el descuento que aplicara para la promoción");
	}
	else if( $("#idTypePromotion option:selected").val() == "0")
	{
		$("#idTypePromotion").addClass("errorContat");		send = false;
		$(".messageError").text("Seleccione el tipo de promoción que aplicara");
	}
	else if( $("#iCountPurchase").val() == "")
	{
		$("#iCountPurchase").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese las compras minimas para acreditar a la promoción");
	}
	else if( $("#iTotalPurchase").val() == "")
	{
		$("#iTotalPurchase").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el total de compras minimas para acreditar a la promoción");
	}

	if(send)
	{ 	
		var status = $("input[name='iStatus']:checked").val();
		$(".hdn_iStatus").val(status);
		$(".btn_update").click();						
	}
}

function valNew()
{
	$("#vPromotion_new").removeClass("errorContat");
	$("#vDiscount_new").removeClass("errorContat");
	$("#iStatus_new").removeClass("errorContat");
	$("#idTypePromotion_new").removeClass("errorContat");
	$("#iCountPurchase_new").removeClass("errorContat");

	var send = true;

	if( $("#vPromotion_new").val() == "")
	{
		$("#vPromotion_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre de la promoción");
	}
	else if( $("#vDiscount_new").val() == "")
	{
		$("#vDiscount_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el descuento que aplicara para la promoción");
	}
	else if( $("#idTypePromotion_new option:selected").val() == "0")
	{
		$("#idTypePromotion_new").addClass("errorContat");		send = false;
		$(".messageError").text("Seleccione el tipo de promoción que aplicara");
	}
	else if( $("#iCountPurchase_new").val() == "")
	{
		$("#iCountPurchase_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese las compras minimas para acreditar a la promoción");
	}
	else if( $("#iTotalPurchase_new").val() == "")
	{
		$("#iTotalPurchase_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el total de compras minimas para acreditar a la promoción");
	}

	if(send)
	{ 	
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdn_idPromotion_delete").val(id);
	$(".modalDelete").click();
}
