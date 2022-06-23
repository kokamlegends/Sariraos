function toggle_class() {
		
	$(".responive_nav").toggleClass("nav_open");
	
}

function remove_class() {
	
	$(".responive_nav").removeClass("nav_open");
	
}

function verify_choice() {
	
	return confirm("Are you sure you want to remove this item from the cart?");
	
}

function show_overlay() {
	
	$("#overlay").fadeIn("slow");
	$(".info_holder").fadeIn("slow");
	
}

function hide_overlay() {
	
	$("#overlay").fadeOut("slow");
	$(".info_holder").fadeOut("slow");
	
}

function validate_input() {
	
	cname = $("#name").val();
	caddr = $("#addr").val();
	cemail = $("#email").val();
	cphone = $("#phone").val();
	cfood = $("#chkfood").val();
	cprice = $("#chkprice").val();
	reserve_id = $("#reserve_id").val();
    cid = $("input[name='customer_id']").val();
	
	if(cname != "" && caddr != "" && cemail != "" && cphone != "") {
		
		$.ajax({
			url: 'process_order.php',
			type: 'post',
			data: {
                order_info: 'info', 
                name: cname, 
                addr: caddr, 
                email: cemail, 
                phone: cphone, 
                food: cfood, 
                price: cprice,
				reserve_id: reserve_id,
                customer_id: cid
            },
			success: function(data) {
				
				if(data == 'success') {
					
					window.location = "summary.php";
					
				}else{
					
					alert(data);
					
				}
				
			}
		});
		
	}else{
		
		alert('Incomplete form data');
		
	}
	
}

function update_qty(id, cartTotal, priceTotal) {
	
	var qty = document.getElementById(id).value;
	var price = 'ajax_qty_'+id;
	
	$.ajax({
					
		url: 'process_order.php',
		type: 'post',
		data: {item_id_qty : qty},
		success: function(data) {
			//alert(data);
			document.getElementById(price).innerHTML = data;
			location.reload();
		}
	});
	
}

function popup(event) {
	if (confirm("Pesan Makanan?")) {
		console.log(event)
		return event.target;
	}else{
		window.location.href = "index.php";
	}
}



// $("#form_submit").click(function(){

// });
// function target_popup(form) {
//     window.open('', 'formpopup', 'width=400,height=400,resizeable,scrollbars');
//     form.target = 'formpopup';
// }