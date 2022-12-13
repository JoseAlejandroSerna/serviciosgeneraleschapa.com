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

function Edit(idPurchaseHistory,vUser,vUserAdmin,vBranch,vProduct,vSize,vColor,vTypePayment,iPieces,iCommission,iSending,iSubtotal,iTotal,vDateCreation)
{
	$("#titleEdit").text(" #" + idPurchaseHistory);
	$("#socio").text(vUser);
	$("#vendedor").text(vUserAdmin);
	$("#sucursal").text(vBranch);
	$("#modelo").text(vProduct);
	$("#talla").text(vSize);
	$("#color").text(vColor);
	$("#tipoPago").text(vTypePayment);
	$("#piezas").text(iPieces);
	$("#comision").text("$" + iCommission);
	$("#envio").text("$" + iSending);
	$("#subtotal").text("$" + iSubtotal);
	$("#total").text("$" + iTotal);
	$("#fechaCompra").text(vDateCreation);

	var iStatus = 0;
	$.each(JSON_info_admin_purchase_history, function(i, purchase_history){

		if(purchase_history.idPurchaseHistory == idPurchaseHistory)
		{
			iStatus = purchase_history.iStatus;
		}
	});
	$("#iStatus option[value='"+iStatus+"']").attr('checked',true);
	$("#iStatus option[value='"+iStatus+"']").change();
	$("#iStatus option[value='"+iStatus+"']").prop('selected', true);

	$(".hdn_idPurchaseHistory_update").val(idPurchaseHistory);

	$(".modalEdit").click();
}

function valEdit()
{
	$(".hdn_iStatus").val($("#iStatus option:selected").val());
	$(".btn_update").click();	
}

function Delete(id)
{
	$(".hdn_idPurchaseHistory_delete").val(id);
	$(".modalDelete").click();
}
