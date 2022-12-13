
var pathImageColor = "/assets/images/products/color/";
var pathImage = "/assets/images/products/";
var urlPage = "https://babykeep.com.mx/";

var JSON_Cart = [];
var JSON_Cart_Temp = [];
var contProduct = 0;

var total = 0;
var total_desc = 0;
var subtotal = 0;
var txtSubtotal = "SubTotal: $";
var txtSubTotalDefault = "SubTotal: $0";
var txtTotal = "Total: $";
var txtTotalDefault = "Total: $0";
var totalShop = 0;

var existCard = false;
var existPromotion = false;

var subtotalAdvance = 0;
var minAdvance = 0;

$(document).ready(function () {
	//$(".modalImg").slideUp();
	$(".contCart").slideUp();
	$(".btnpay").slideUp();
	$(".txtSubTotal").text(subtotal);
	$(".txtTotal").text(total);
	$(".txtIva").text("");

	$(".btnSale").slideUp();

	$(".sectionPromotion").slideUp();
	$(".sectionCard").slideUp();

	generalEvents();

});

function generalEvents()
{
	//////////
	var todayDate = new Date().toISOString().slice(0, 10);
	$(".hdn_idAdmin").val(idAdmin);
	$(".hdn_iSending").val(sending);
	//$(".hdn_vDateCreation").val(todayDate);
	$(".hdn_iCommission").val(commission);
	
	/////////

	$( "#idUser" ).change(function() {
		var id = $("#idUser option:selected").val();
		$(".hdn_idUser").val(id);
	});

	$( "#idBranch" ).change(function() {

		var id = $("#idBranch option:selected").val();
		refreshByBranch();
		if(id != "0"){	viewProduct();	}
	});
	
	$( "#idProduct" ).change(function() {

		var image = $("#idProduct option:selected").attr("data-image");
		var id = $("#idProduct option:selected").val();

		if(image != ""){
			$(".modalImg").attr("src",pathImage + image);
			$(".modalImg").slideDown();
		}
		else{	$(".modalImg").slideUp();	}

		refreshByColor();
		if(id != "0"){	viewColor();	}
	});

	$( "#idColor" ).change(function() {

		var id = $("#idColor option:selected").val();
		var image = $("#idColor option:selected").attr("data-image");

		$(".modalImg").attr("src",pathImageColor + image)
		$(".modalImg").slideDown();

		refreshByColor();
		if(id != "0"){	viewSize();	}
	});

	$( "#idSize" ).change(function() {

		var iprice = parseInt($("#idSize option:selected").attr("data-iprice"));
		var istock = parseInt($("#idSize option:selected").attr("data-istock"));
		var html_istock = "";
		for (var i=0; i<=istock; i++) {
			html_istock += "<option value='"+i+"'>"+i+"</option>";
		}

		$("#iStock").empty();
		$("#iStock").append(html_istock);

		
		$("#price").val(iprice);
	});

	$( "#idTypePayment" ).change(function() {
		valPrice();
	});
	////
	$('input[type=radio][name=radio_card]').click(function() {
		valPromotion();
		valHiddenCard();
	});

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

function refreshAllSelect()
{

	$("#idBranch option[value='0']").attr('checked',true);
	$("#idBranch option[value='0']").change();
	$("#idBranch option[value='0']").prop('selected', true);

	html_product= "<option value='0' data-image=''>Selecciona el modelo</option>";
	html_color 	= "<option value='0'>Selecciona el color</option>";
	html_size 	= "<option value='0'>Selecciona la talla</option>";
	html_istock	= "<option value='0'>0</option>";

	$("#idProduct").empty();
	$("#idColor").empty();
	$("#idSize").empty();
	$("#iStock").empty();

	$("#idProduct").append(html_product);
	$("#idColor").append(html_color);
	$("#idSize").append(html_size);
	$("#iStock").append(html_istock);

	$("#price").val("");
}

function refreshByBranch()
{
	html_product 	= "<option value='0' data-image=''>Selecciona el modelo</option>";
	html_color 		= "<option value='0'>Selecciona el color</option>";
	html_size 		= "<option value='0'>Selecciona la talla</option>";

	$("#idProduct").empty();
	$("#idSize").empty();
	$("#idColor").empty();

	$("#idProduct").append(html_product);
	$("#idSize").append(html_size);
	$("#idColor").append(html_color);

	$("#stock").val("");
	$("#price").val("");
}

function refreshByColor()
{
	html_size 	= "<option value='0'>Selecciona la talla</option>";
	$("#idSize").empty();
	$("#idSize").append(html_size);

	$("#stock").val("");
	$("#price").val("");
}

function refreshBySize()
{
	html_color 	= "<option value='0'>Selecciona el color</option>";
	$("#idColor").empty();
	$("#idColor").append(html_color);

	$("#stock").val("");
	$("#price").val("");
}

function viewProduct()
{
	var idBranch = $("#idBranch option:selected").val();
	var html_product = "<option value='0' data-image='logo.png' >Selecciona el model</option>";
	var listproduct_by_branch = [];

	$.each(JSON_stock_products, function(j, stock){
		if(stock.idBranch == idBranch)
		{
			$.each(JSON_products, function(k, product){
				if(product.idTypePurchase == 2)
				{
					if(!listproduct_by_branch.find(o => o.idProduct === product.idProduct))
						listproduct_by_branch.push({
							"idProduct":product.idProduct,
							"vProduct":product.vProduct,
							"vImage":product.vImage,
						});

				}
			});
		}
	});

	$.each(listproduct_by_branch, function(j, product){
		html_product += "<option value='"+ product.idProduct +"' data-image='"+ product.vImage +"'>"+ product.vProduct +"</option>";
	});

	$("#idProduct").empty();
	$("#idProduct").append(html_product);
}
function viewBranch()
{
	var idProdcut = $("#idProduct option:selected").val();
	var html_branch = "<option value='0'>Selecciona la sucursal</option>";

	$.each(JSON_stock_products, function(j, stock){
		if(stock.idProduct == idProdcut)
		{
			html_branch += "<option value='"+ branch.idBranch +"'>"+ branch.vBranch +"</option>";
		}
	});
	$("#idBranch").empty();
	$("#idBranch").append(html_branch);
}

function viewColor()
{
	var idProduct = $("#idProduct option:selected").val();
	var idBranch = $("#idBranch option:selected").val();
	var html_color = "<option value='0'>Selecciona el color</option>";
	
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
	$("#idColor").empty();
	$("#idColor").append(html_color);
}

function viewSize()
{
	var idProduct 	= $("#idProduct option:selected").val();
	var idBranch 	= $("#idBranch option:selected").val();
	var idColor 	= $("#idColor option:selected").val();
	var html_size = "<option value='0' data-iprice='0' data-istock='0' data-image=''>Selecciona talla</option>";
	
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

	$("#idSize").empty();
	$("#idSize").append(html_size);
}

function valAdd()
{
	cleanClassError();
	var send = true;

	if($(".hdn_idUser").val() == "")
	{
		$("#email").addClass("errorForm");	send = false;
		$(".messageError").text("Ingrese el correo del usuario");
	}
	else if($("#idBranch option:selected").val() == "0")
	{
		$("#idBranch").addClass("errorForm");	send = false;
		$(".messageError").text("Selecciona la sucursal");
	}
	else if($("#idProduct option:selected").val() == "0")
	{
		$("#idProduct").addClass("errorForm");	send = false;
		$(".messageError").text("Selecciona el modelo");
	}
	else if($("#idColor option:selected").val() == "0")
	{
		$("#idColor").addClass("errorForm");	send = false;
		$(".messageError").text("Selecciona el color");
	}
	else if($("#idSize option:selected").val() == "0")
	{
		$("#idSize").addClass("errorForm");		send = false;
		$(".messageError").text("Selecciona la talla");
	}
	else if($("#iStock option:selected").val() == "0")
	{
		$("#iStock").addClass("errorForm");	send = false;
		$(".messageError").text("Selecciona la cantidad de productos");
	}

	if(send)
	{ 		
		addProduct();					
	}
}
function cleanClassError()
{
	$("#idBranch").removeClass("errorForm");
	$("#idProduct").removeClass("errorForm");
	$("#idColor").removeClass("errorForm");
	$("#idSize").removeClass("errorForm");
	$("#iStock").removeClass("errorForm");
}

function addProduct()
{
	var cont = 0;

	var idProduct = 0;
	var idSize = 0;
	var idColor = 0;
	var iPrice = 0;
	var iPieces = 0;
	var vColor = "";
	var newProduct = true;

	$.each(JSON_Cart, function(i, cart){
		cont++;
	});

	idProduct = parseInt($("#idProduct option:selected").val());
	idSize = parseInt($("#idSize option:selected").val());
	idColor = parseInt($("#idColor option:selected").val());
	idBranch = parseInt($("#idBranch option:selected").val());
	vColor = $("#idColor option:selected").text();
	iPrice = parseInt($("#price").val());
	iPieces = parseInt($("#iStock option:selected").val());


	if(cont > 0)
	{
		JSON_Cart_Temp = [];

		$.each(JSON_Cart, function(i, cart){

			if(	cart.idProduct == parseInt($("#idProduct option:selected").val()) && 
				cart.idSize == parseInt($("#idSize option:selected").val()) &&
				cart.idColor == parseInt($("#idColor option:selected").val()) &&
				cart.idBranch == parseInt($("#idBranch option:selected").val()))
			{
				newProduct = false;

				JSON_Cart_Temp.push({
					"idProduct": idProduct,
					"idSize": idSize,
					"idColor": idColor,
					"idBranch": idBranch,
					"vColor":vColor,
					"iPrice": iPrice,
					"iPieces":iPieces
				});
			}
			else{
				JSON_Cart_Temp.push({
					"idProduct": cart.idProduct,
					"idSize": cart.idSize,
					"idColor": cart.idColor,
					"idBranch": cart.idBranch,
					"vColor":cart.vColor,
					"iPrice": cart.iPrice,
					"iPieces":cart.iPieces
				});
			}
		});

		JSON_Cart = [];
		JSON_Cart = JSON_Cart_Temp;

		if(newProduct)
		{
			JSON_Cart.push({
				"idProduct": idProduct,
				"idSize": idSize,
				"idColor": idColor,
				"idBranch": idBranch,
				"vColor":vColor,
				"iPrice": iPrice,
				"iPieces":iPieces
			});
		}
	}
	else{
		JSON_Cart.push({
			"idProduct": idProduct,
			"idSize": idSize,
			"idColor": idColor,
			"idBranch": idBranch,
			"vColor":vColor,
			"iPrice": iPrice,
			"iPieces":iPieces
		});
	}

	viewCart();
	refreshAllSelect();
}

function viewCart()
{
	var html_cart = "";
	var vProduct = "";
	var vBranch = "";
	var vSize = "";
	var vColor = "";
	var totalCart = 0;
	contProduct = 0;
	subtotal = 0;

	$.each(JSON_Cart, function(i, cart){
		$.each(JSON_products, function(j, product){
			if(product.idProduct == cart.idProduct){ vProduct = product.vProduct; }
		});	
		$.each(JSON_branch, function(j, branch){
			if(branch.idBranch == cart.idBranch){ vBranch = branch.vBranch; }
		});	
		$.each(JSON_size, function(j, size){
			if(size.idSize == cart.idSize){ vSize = size.vSize; }
		});	
		$.each(JSON_color, function(j, color){
			if(color.idColor == cart.idColor){ vColor = color.vColor; }
		});

		totalCart = cart.iPrice * cart.iPieces;
		subtotal += totalCart;
		html_cart += "<tr>"+
						"<th scope='row'>"+vProduct+"</th>"+
						"<td>"+vBranch+"</td>"+
						"<td>"+vSize+"</td>"+
						"<td>"+vColor+"</td>"+
						"<td>"+cart.iPrice+"</td>"+
						"<td>"+cart.iPieces+"</td>"+
						"<td>$"+totalCart+"</td>"+
						"<td>"+
							"<span class='waves-effect waves-dark text-danger' onclick='deleteProductCart("+cart.idProduct+","+cart.idSize+","+cart.idColor+","+cart.idBranch+")'>x</span>"+
						"</td>"+
					"</tr>";
		contProduct++;
	});	
	$(".tbody_shop").empty();
	$(".tbody_shop").append(html_cart);
	
	if(contProduct >0)
	{
		$(".contCart").slideDown();
		$(".btnpay").slideDown();

		valPrice();
		
		$(".hdn_idTypePayment").val($("#idTypePayment option:selected").val());

	}

}
function deleteProductCart(idProduct,idSize,idColor,idBranch)
{
	JSON_Cart_Temp = [];

	$.each(JSON_Cart, function(i, cart){

		if(	cart.idProduct == idProduct && cart.idSize == idSize && cart.idColor == idColor && cart.idBranch == idBranch)
		{
			var value="";
		}
		else{
			JSON_Cart_Temp.push({
				"idProduct": cart.idProduct,
				"idSize": cart.idSize,
				"idColor": cart.idColor,
				"idBranch": cart.idBranch,
				"vColor":cart.vColor,
				"iPrice": cart.iPrice,
				"iPieces":cart.iPieces
			});

		}
	});

	JSON_Cart = [];
	JSON_Cart = JSON_Cart_Temp;

	viewCart();

}

function valPay()
{
	$(".hdn_strCart").val(JSON.stringify(JSON_Cart));
	$(".btn_pay").click();
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

function valPrice()
{
	var id = $("#idTypePayment option:selected").val();
	$(".hdn_idTypePayment").val(id);
	minAdvance = subtotal;

	switch(id)
	{
		case "1":
			commission = 0;

			total = subtotal;
			total_desc = total - descPromotion(total);
			minAdvance = total_desc;

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
			minAdvance = total_desc;
	
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
			minAdvance = total_desc;
	
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
