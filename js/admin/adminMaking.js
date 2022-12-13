var list_schedule = [];
var subtotal = 0;
var subtotalAdvance = 0;
var minAdvance = 0;

$(document).ready(function () {


	$(".sectionPromotion").slideUp();
	$(".sectionCard").slideUp();

	refreshTypeSchedule();
	loadSchedulce();
});

function loadSchedulce()
{
	$(".btnNext").slideDown();
	$(".btnSchedule").slideUp();

	$.each(JSON_schedule, function(j, schedule){
		
		if(!list_schedule.find(o => o.idSchedule === schedule.idSchedule))
			list_schedule.push({
				"idSchedule":schedule.idSchedule,
				"vDateEvent":schedule.vDateEvent,
				"vDateDelivery":schedule.vDateDelivery,
				"idUser":schedule.idUser,
				"idUserAdmin":schedule.idUserAdmin,
				"idBranch":schedule.idBranch,
				"idTypeSchedule":schedule.idTypeSchedule,
				"idHour":schedule.idHour,
				"idProduct":schedule.idProduct,
				"idColor":schedule.idColor,
				"idSize":schedule.idSize,
				"vPrice":schedule.vPrice,
				"vAdvance":schedule.vAdvance,
				"iCheckEvent":schedule.iCheckEvent,
				"iAge":schedule.iAge,
				"vMinPrice":schedule.vMinPrice,
				"vMaxPrice":schedule.vMaxPrice,
				"vDateCreation":schedule.vDateCreation,
				"vImageINE":schedule.vImageINE,
				"vImageProduct":schedule.vImageProduct,
				"vImageAddressProof":schedule.vImageAddressProof,
				"iStatus":schedule.iStatus
			});
	});

	$("#date_making").change(function() {

		var date  = $("#date_making").val();
		var day 	= date.split("-")[2];
		var month 	= date.split("-")[1];
		var year 	= date.split("-")[0];

		$("#date_making").val(year + "-" + month + "-" + day);

		$(".hdn_date_schedule").val(year + "-" + month + "-" + day);

		viewHour();
	});

	$("#date_rent").change(function() {

		var date  = $("#date_rent").val();
		var day 	= date.split("-")[2];
		var month 	= date.split("-")[1];
		var year 	= date.split("-")[0];

		var daySelected = new Date(year + "-" + month + "-" + day);
		var dayMax = 3;

		daySelected.setDate(daySelected.getDate() + dayMax);
		var formatDayFinish = (daySelected.toISOString().split("T")[0]).split("-")[2] + "/" + (daySelected.toISOString().split("T")[0]).split("-")[1] + "/" + (daySelected.toISOString().split("T")[0]).split("-")[0];
		
		var dayF 	= formatDayFinish.split("/")[0];
		var monthF 	= formatDayFinish.split("/")[1];
		var yearF 	= formatDayFinish.split("/")[2];


		$("#date_rent").val(year + "-" + month + "-" + day);
		$("#dateFin_rent").val(yearF + "-" + monthF + "-" + dayF);
		$(".hdn_dateFin_rent").val(yearF + "-" + monthF + "-" + dayF);

		$(".hdn_date_schedule").val(year + "-" + month + "-" + day);
		//////
		var id = $("#idBranch option:selected").val();
		refreshByBranch();
		if(id != "0"){	viewProduct();	}
	});
	
	$("#idTypeSchedule").on('change', function (e) {
		refreshTypeSchedule();
		
		if($("#idTypeSchedule").val() == "1"){	$(".contRent").css("display", "block");		}
		if($("#idTypeSchedule").val() == "3"){	$(".contMaking").css("display", "block");	}
	});

	$( "#idBranch" ).change(function() {

	});

	$( "#idProduct_rent" ).change(function() {

		var id = $("#idProduct_rent option:selected").val();

		refreshByColor();
		if(id != "0"){	viewColor();	}
	});

	$( "#idColor_rent" ).change(function() {

		var id = $("#idColor_rent option:selected").val();

		refreshByColor();
		if(id != "0"){	viewSize();	}
	});

	$( "#idSize_rent" ).change(function() {

		var price = $("#idSize_rent option:selected").attr("data-iprice");
		$(".hdn_price_rent").val(price);

		var advance = parseInt(price)/2;
		$("#vAdvance").val(advance);
		$(".hdn_advance_rent").val(advance);
	});

	$( "#idTypePayment" ).change(function() {
		valPrice();
	});
	$('input[type=radio][name=radio_card]').click(function() {
		valPromotion();
		valHiddenCard();
	});

	$('input[type=radio][name=radio_promotion]').click(function() {
		valPrice();
		valHiddenCard();
	});
}

function refreshByBranch()
{
	html_product 	= "<option value='0'>"+txtDefaultSelectModel+"</option>";
	html_color 		= "<option value='0'>"+txtDefaultSelectColor+"</option>";
	html_size 		= "<option value='0'>"+txtDefaultSelectSize+"</option>";

	$("#idProduct_rent").empty();
	$("#idSize_rent").empty();
	$("#idColor_rent").empty();

	$("#idProduct_rent").append(html_product);
	$("#idSize_rent").append(html_size);
	$("#idColor_rent").append(html_color);
}

function refreshByColor()
{
	html_size 	= "<option value='0'>"+txtDefaultSelectSize+"</option>";
	$("#idSize_rent").empty();
	$("#idSize_rent").append(html_size);
}

function refreshSize()
{
	html_size 	= "<option value='0'>"+txtDefaultSelectSize+"</option>";
	$("#size_rent").empty();
	$("#size_rent").append(html_size);
}

function refreshTypeSchedule()
{
	$(".contRent").css("display", "none");
	$(".contMaking").css("display", "none");
}

function viewHour()
{
	var idBranch = $("#idBranch option:selected").val();
	var html_hour = "<option value='0'>"+txtDefaultSelectHour+"</option>";
	var listHours_bloqueaded = [];

	$.each(list_schedule, function(k, schedule){
		if(parseInt(schedule.idTypeSchedule) == 3)
		{
			if ($(".hdn_date_schedule").val() == schedule.vDateEvent && schedule.idBranch == idBranch) {

				if(!listHours_bloqueaded.find(o => o.idHour === schedule.idHour))
						listHours_bloqueaded.push({
							"idHour":schedule.idHour
						});	
			}
		}
	});
	$.each(JSON_hour, function(j, hour){
		var valid = true;
		$.each(listHours_bloqueaded, function(j, hour_bloqueaded){
			if(hour_bloqueaded.idHour == hour.idHour){
				valid = false;
			}
		});

		if(valid)
		{
			html_hour += "<option value='"+ hour.idHour +"'>"+ hour.vHour +"</option>";
		}
	});

	$("#idHour_making").empty();
	$("#idHour_making").append(html_hour);
	
}

function viewProduct()
{
	var idBranch = $("#idBranch option:selected").val();
	var html_product = "<option value='0'>"+txtDefaultSelectModel+"</option>";
	var listproduct_by_branch = [];
	
	$.each(JSON_stock_products, function(j, stock){
		if(stock.idBranch == idBranch)
		{
			$.each(JSON_products, function(k, product){
				if(product.idTypePurchase == 1 && stock.idProduct == product.idProduct)
				{
					$.each(list_schedule, function(k, schedule){
						if(parseInt(schedule.idTypeSchedule) == 1)
						{
							var dateEvent = dateIsBetweenToDates(schedule.vDateEvent);
							var dateDelivery = dateIsBetweenToDates(schedule.vDateDelivery);

							var dateValid = true;
							var contSchedule = 0;

							$.each(list_schedule, function(k, schedule){
								if(schedule.idTypeSchedule == 1)
								{
									if(schedule.idProduct == stock.idProduct && schedule.idSize == stock.idSize && schedule.idColor == stock.idColor && schedule.idBranch == stock.idBranch)
									{
										if (dateEvent || dateDelivery) {
											contSchedule++;
										}
									}
								}
							});
							if(contSchedule >= parseInt(stock.iStock))
							{
								dateValid = false;
							}

							if(dateValid){

								if(!listproduct_by_branch.find(o => o.idProduct === product.idProduct))
									listproduct_by_branch.push({
										"idProduct":product.idProduct,
										"vProduct":product.vProduct,
										"vImage":product.vImage,
									});
							}
						}
					});
				}
			});
		}
	});

	$.each(listproduct_by_branch, function(j, product){
		html_product += "<option value='"+ product.idProduct +"' data-image='"+ product.vImage +"'>"+ product.vProduct +"</option>";
	});

	$("#idProduct_rent").empty();
	$("#idProduct_rent").append(html_product);
}

function dateIsBetweenToDates(date)
{
	var dateStar = $(".hdn_date_schedule").val();
	var dateEnd = $(".hdn_dateFin_rent").val();

	dateStarYear = dateStar.split("-")[0];
	dateStarMonth = dateStar.split("-")[1];
	dateStarDay = dateStar.split("-")[2];

	dateEndYear = dateEnd.split("-")[0];
	dateEndMonth = dateEnd.split("-")[1];
	dateEndDay = dateEnd.split("-")[2];
	
	dateYear = date.split("-")[0];
	dateMonth = date.split("-")[1];
	dateDay = date.split("-")[2];

	var dateFrom = dateStarMonth + "/" + dateStarDay + "/" + dateStarYear;
	var dateTo = dateEndMonth + "/" + dateEndDay + "/" + dateEndYear;
	var dateCheck = dateMonth + "/" + dateDay + "/" + dateYear;

	var d1 = dateFrom.split("/");
	var d2 = dateTo.split("/");
	var c = dateCheck.split("/");

	var from = new Date(d1[2], parseInt(d1[1])-1, d1[0]);  // -1 because months are from 0 to 11
	var to   = new Date(d2[2], parseInt(d2[1])-1, d2[0]);
	var check = new Date(c[2], parseInt(c[1])-1, c[0]);

	if(check >= from && check <= to)
	{
		return true;
	}
	else{
		return false;
	}
}

function viewSize()
{
	var idProduct 	= $("#idProduct_rent option:selected").val();
	var idBranch 	= $("#idBranch option:selected").val();
	var idColor 	= $("#idColor_rent option:selected").val();
	var html_size = "<option value='0'>"+txtDefaultSelectSize+"</option>";
	
	var listsize_by_color = [];
	
	$.each(JSON_stock_products, function(j, stock){

		if(stock.idBranch == idBranch && stock.idProduct == idProduct && stock.idColor == idColor)
		{
			if(!listsize_by_color.find(o => o.idColor === stock.idColor))
				listsize_by_color.push({
					"idSize":stock.idSize,
					"iPrice":stock.iPrice,
					"vImage":stock.vImage,
					"iStock":stock.iStock
				});
		}
	});

	$.each(listsize_by_color, function(j, list){

		$.each(JSON_size, function(k, size){
			if(size.idSize == list.idSize)
			{
				html_size += "<option value='"+ size.idSize +"' data-iprice='"+list.iPrice+"' data-istock='"+list.iStock+"' data-image='"+list.vImage+"'>"+ size.vSize +"</option>";
			}
		});
	});

	$("#idSize_rent").empty();
	$("#idSize_rent").append(html_size);
}

function viewColor()
{
	var idProduct = $("#idProduct_rent option:selected").val();
	var idBranch = $("#idBranch option:selected").val();
	var html_color = "<option value='0'>"+txtDefaultSelectColor+"</option>";
	
	var listcolor_by_product = [];
	
	$.each(JSON_stock_products, function(j, stock){

		if(stock.idBranch == idBranch && stock.idProduct == idProduct)
		{
			if(!listcolor_by_product.find(o => o.idColor === stock.idColor))
				listcolor_by_product.push({
					"idColor":stock.idColor,
					"vImage":stock.vImage
				});
		}
	});

	$.each(listcolor_by_product, function(j, list){

		$.each(JSON_color, function(k, color){
			if(color.idColor == list.idColor)
			{
				html_color += "<option value='"+ color.idColor +"' data-image='"+list.vImage+"'>"+ color.vColor +"</option>";
			}
		});
	});
	$("#idColor_rent").empty();
	$("#idColor_rent").append(html_color);
}


function cleanClassError()
{
	$("#idUser").removeClass("errorContat");
	$("#idBranch").removeClass("errorContat");
	$("#idTypeSchedule").removeClass("errorContat");
	//$("#address_proof").removeClass("errorContat");
	$(".check_event").removeClass("errorContat");
}

function cleanClassErrorRent()
{
	$("#date_rent").removeClass("errorContat");
	$("#dateFin_rent").removeClass("errorContat");
	$("#idProduct_rent").removeClass("errorContat");
	$("#idColor_rent").removeClass("errorContat");
	$("#idSize_rent").removeClass("errorContat");
	$("#ine").removeClass("errorContat");
}

function cleanClassErrorMaking()
{
	$("#date_making").removeClass("errorContat");
	$("#idHour_making").removeClass("errorContat");
	$("#idColor_making").removeClass("errorContat");
	$("#idSize_making").removeClass("errorContat");
	$("#age_making").removeClass("errorContat");
	$("#rangeMin_making").removeClass("errorContat");
	$("#rangeMax_making").removeClass("errorContat");
	$("#product_example").removeClass("errorContat");
	$("#price_making").removeClass("errorContat");
	$("#advance_making").removeClass("errorContat");
}

function valSchedule()
{
	cleanClassError();
	cleanClassErrorMaking();
	cleanClassErrorRent();

	var send = true;
	var isOK = false;

	var idTypeSchedule 	= $("#idTypeSchedule option:selected").val();
	var idBranch 		= $("#idBranch option:selected").val();
	var prince			= parseInt($("#price_making").val());
	var advance			= parseInt($("#advance_making").val());
	var minAdvance		= prince/2;
	
	if($(".hdn_idUser").val() == "")
	{
		$("#email").addClass("errorForm");	send = false;
		$(".messageError").text("Ingrese el correo del usuario");
	}
	else if(idBranch == "0")
	{
		$("#idBranch").addClass("errorContat");				send = false;
	}
	else if($("#date_making").val() == "")
	{
		$("#date_making").addClass("errorContat");			send = false;
	}
	else if($("#idHour_making option:selected").val() == "0")
	{
		$("#idHour_making").addClass("errorContat");		send = false;
	}
	else if($("#idColor_making option:selected").val() == "0")
	{
		$("#idColor_making").addClass("errorContat");		send = false;
	}
	else if($("#idSize_making option:selected").val() == "0")
	{
		$("#idSize_making").addClass("errorContat");		send = false;
	}
	else if($("#age_making").val() == "")
	{
		$("#age_making").addClass("errorContat");			send = false;
	}
	else if($("#product_example").val() == "")
	{
		$("#product_example").addClass("errorContat");		send = false;
	}
	/*
	else if($("#address_proof").val() == "")
	{
		$("#address_proof").addClass("errorContat");		send = false;
	}
	*/
	else if($("#price_making").val() == "")
	{
		$("#price_making").addClass("errorContat");			send = false;
	}
	else if(prince == 0)
	{
		$("#price_making").addClass("errorContat");			send = false;
	}
	else if(advance == 0)
	{
		$("#advance_making").addClass("errorContat");		send = false;
	}
	else if(advance < minAdvance)
	{
		$("#advance_making").addClass("errorContat");		send = false;
	}
	else if(!$('#check_event').is(":checked"))
	{
		$(".check_event").addClass("errorContat");			send = false;
	}


	if(send){ 	

		$(".btnNext").slideUp();
		$(".btnSchedule").slideDown();

		valPrice();
	}
}

function schedule()
{
	$(".btnSend").click();	
}

function valRent()
{
	var isOK = true;
	if($("#date_rent").val() == "")
	{
		$("#date_rent").addClass("errorContat");			isOK = false;
	}
	else if($("#dateFin_rent option:selected").val() == "0")
	{
		$("#dateFin_rent").addClass("errorContat");		isOK = false;
	}
	else if($("#idProduct_rent option:selected").val() == "0")
	{
		$("#idProduct_rent").addClass("errorContat");		isOK = false;
	}
	else if($("#idColor_rent option:selected").val() == "0")
	{
		$("#idColor_rent").addClass("errorContat");			isOK = false;
	}
	else if($("#idSize_rent option:selected").val() == "0")
	{
		$("#idSize_rent").addClass("errorContat");			isOK = false;
	}
	else if($("#ine").val() == "")
	{
		$("#ine").addClass("errorContat");					isOK = false;
	}

	return isOK;
}


function valUser()
{
	$("#email").removeClass("errorForm");
	var userValid = false;
	$.each(JSON_all_user,function(i,user){
		if(user.vEmail == $("#email").val() && user.iStatus != "0")
		{
			$(".hdn_idUser").val(user.idUser);
			$("#email").prop('disabled', true);
			$("#txtMessageUser").text("");
			userValid = true;

			valKidByCard(user.idUser);

			$(".btnUser").slideUp();
			$(".btnSale").slideDown();
		}
	});

	if(!userValid)
	{
		$("#email").val("");
		$("#email").addClass("errorForm");
		$("#txtMessageUser").text("El usuario " + $("#email").val() + " no se encuentra registrado en el sistema o se encuentra en lista negra.");
	}

}

function valKidByCard(id)
{
	var dateValid = false;
	var d = new Date();
	var date = d.toISOString().split('T')[0];

	$.each(JSON_card,function(i,card){
		if(card.idUser == id)
		{
			dateValid = dateIsBetweenToDates(card.vStartDate,card.vEndDate,date);
		}	
	});
	if(dateValid)
	{
		existCard = false;
		var html_card = "<label><input type='radio' name='radio_card' data-idCard='0' data-idKidByCard='0' data-iNumberPurchases='0' data-iTotalPurchases='0' data-iAge='0' data-vStartDate='' data-vEndDate='' value='0' checked='checked'> No aplicar</label><br>";
		$.each(JSON_card,function(i,card){
			$.each(JSON_kidByCard,function(j,kid){
				if(card.idUser == id)
				{
					existCard = true;
					html_card += "<label><input type='radio' name='radio_card' data-idCard='"+ card.idCard +"' data-idKidByCard='"+ kid.idKidByCard +"' data-iNumberPurchases='"+ kid.iNumberPurchases +"' data-iTotalPurchases='"+ kid.iTotalPurchases +"' data-iAge='"+ kid.iAge +"' data-vStartDate='"+ card.vStartDate +"' data-vEndDate='"+ card.vEndDate +"' value='"+ kid.idKidByCard +"'> " + kid.vName + "</label><br>";
				}
			});			
		});
	
		$(".contCard").empty().append(html_card);
		if(existCard) $(".sectionCard").slideDown();
	
		$('input[type=radio][name=radio_card]').click(function(){
			valPromotion();
			valHiddenCard();
		});
	}
}

function valPromotion()
{
	existPromotion = false;
	var id 					= $("input[name='radio_card']:checked").val();
	var iNumberPurchases 	= $("input[name='radio_card']:checked").attr("data-iNumberPurchases");
	var iTotalPurchases 	= $("input[name='radio_card']:checked").attr("data-iTotalPurchases");

	var html_promotion 		= "<label><input type='radio' name='radio_promotion' data-idTypePromotion='0' data-vDiscount='0' data-iCountPurchase='0' data-iTotalPurchase='0' value='0' checked='checked'> No aplicar</label><br>";
	
	if(parseInt(id) > 0)
	{
		$.each(JSON_promotion,function(i,val){
			if(parseInt(val.iStatus) > 0 && (parseInt(iNumberPurchases) >= parseInt(val.iCountPurchase) || parseInt(iTotalPurchases) >= parseInt(val.iTotalPurchase)))
			{
				existPromotion = true;
				html_promotion += "<label><input type='radio' name='radio_promotion' data-idTypePromotion='"+ val.idTypePromotion +"' data-vDiscount='"+ val.vDiscount +"' data-iCountPurchase='"+ val.iCountPurchase +"' data-iTotalPurchase='"+ val.iTotalPurchase +"' value='"+ val.idPromotion +"'> " + val.vPromotion + "</label><br>";
			}	
		});
	}
	$(".contPromotion").empty().append(html_promotion);
	$(".sectionPromotion").slideDown();
	valPrice();

	$('input[type=radio][name=radio_promotion]').click(function() {
		valPrice();
		valHiddenCard();
	});
}

function valHiddenCard()
{
	var idCard 			= $("input[name='radio_card']:checked").attr("data-idCard");
	var idKidByCard 	= $("input[name='radio_card']:checked").attr("data-idKidByCard");
	var iCountPurchase 	= $("input[name='radio_promotion']:checked").attr("data-iCountPurchase");
	var iTotalPurchase 	= $("input[name='radio_promotion']:checked").attr("data-iTotalPurchase");
	var idPromotion 	= $("input[name='radio_promotion']:checked").val();

	$(".hdn_idCard").val(idCard);
	$(".hdn_idKidByCard").val(idKidByCard);
	$(".hdn_iCountPurchase").val(iCountPurchase);
	$(".hdn_iTotalPurchase").val(iTotalPurchase);
	$(".hdn_idPromotion").val(idPromotion);
}

function valPrice()
{
	var id = $("#idTypePayment option:selected").val();

	if($("#price_making").val() == ""){ subtotal = 0;}
	else {subtotal = parseInt($("#price_making").val());}
	
	minAdvance = subtotal/2;

	switch(id)
	{
		case "1":
			commission = 0;

			total = subtotal;
			total_desc = total - descPromotion(total);
			minAdvance = minAdvance - descPromotion(minAdvance);

			$(".txtIva").text(commission);
			$(".hdn_iCommission").val(commission);
			$(".txtSubTotal").text(subtotal);
			$(".txtTotal").text(total_desc);
			$(".txtMinAdvance").text(minAdvance);
			$(".hdn_iSubtotal").val(subtotal);
			$(".hdn_iTotal").val(total_desc);
			$(".txtCommission").text("");

		break;
		case "2":
			commission = (subtotal*commission_percentage)/100;
	
			total = subtotal + commission;
			total_desc = total - descPromotion(total);
			minAdvance = minAdvance - descPromotion(minAdvance);
	
			$(".txtCommission").text(commission_percentage +" ");
			$(".txtIva").text(commission);
			$(".txtSubTotal").text(subtotal);
			$(".txtTotal").text(total_desc);
			$(".txtMinAdvance").text(minAdvance);
			$(".hdn_iCommission").val(commission);
			$(".hdn_iSubtotal").val(subtotal);
			$(".hdn_iTotal").val(total_desc);

		break;
		case "3":
			commissionTerminal = (subtotal*commissionTerminal_percentage)/100;
	
			total = subtotal + commissionTerminal;
			total_desc = total - descPromotion(total);
			minAdvance = minAdvance - descPromotion(minAdvance);
	
			$(".txtCommission").text(commissionTerminal_percentage +" ");
			$(".txtIva").text(commissionTerminal);
			$(".txtSubTotal").text(subtotal);
			$(".txtTotal").text(total_desc);
			$(".txtMinAdvance").text(minAdvance);
			$(".hdn_iCommission").val(commissionTerminal);
			$(".hdn_iSubtotal").val(subtotal);
			$(".hdn_iTotal").val(total_desc);

		break;
	}
}

function descPromotion(total)
{
	/*
	idTypePromotion = 1 -> $
	idTypePromotion = 2 -> %
	*/
	var desc = 0;

	var idTypePromotion = $("input[name='radio_promotion']:checked").attr("data-idTypePromotion");
	var vDiscount = $("input[name='radio_promotion']:checked").attr("data-vDiscount");
	
	switch(idTypePromotion)
	{
		case "0":
			desc = 0;
			break;
		case "1":
			desc = parseInt(vDiscount);
			break;
		case "2":
			desc = parseInt((total*vDiscount)/100);
			break;
	}

	return desc
}

function dateIsBetweenToDates(vStartDate,vEndDate,date)
{
	var dateStar = vStartDate;
	var dateEnd = vEndDate;

	dateStarYear = dateStar.split("-")[0];
	dateStarMonth = dateStar.split("-")[2];
	dateStarDay = dateStar.split("-")[1];

	dateEndYear = dateEnd.split("-")[0];
	dateEndMonth = dateEnd.split("-")[2];
	dateEndDay = dateEnd.split("-")[1];
	
	dateYear = date.split("-")[0];
	dateMonth = date.split("-")[2];
	dateDay = date.split("-")[1];

	var dateFrom = dateStarMonth + "/" + dateStarDay + "/" + dateStarYear;
	var dateTo = dateEndMonth + "/" + dateEndDay + "/" + dateEndYear;
	var dateCheck = dateMonth + "/" + dateDay + "/" + dateYear;

	var d1 = dateFrom.split("/");
	var d2 = dateTo.split("/");
	var c = dateCheck.split("/");

	var from = new Date(d1[2], parseInt(d1[1])-1, d1[0]);  // -1 because months are from 0 to 11
	var to   = new Date(d2[2], parseInt(d2[1])-1, d2[0]);
	var check = new Date(c[2], parseInt(c[1])-1, c[0]);

	if(check >= from && check <= to)
	{
		return true;
	}
	else{
		return false;
	}
}

function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
