
<script src="<?=base_url('design/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- library for cookie management -->
<script src="<?=base_url('design/js/jquery.cookie.js');?>"></script>
<!-- calender plugin -->
<script src='<?=base_url('design/bower_components/moment/min/moment.min.js');?>'></script>
<script src='<?=base_url('design/bower_components/fullcalendar/dist/fullcalendar.min.js');?>'></script>
<!-- data table plugin -->
<script src='<?=base_url('design/js/jquery.dataTables.min.js');?>'></script>

<!-- select or dropdown enhancer -->
<script src="<?=base_url('design/bower_components/chosen/chosen.jquery.min.js');?>"></script>
<!-- plugin for gallery image view -->
<script src="<?=base_url('design/bower_components/colorbox/jquery.colorbox-min.js');?>"></script>
<!-- notification plugin -->
<script src="<?=base_url('design/js/jquery.noty.js');?>"></script>
<!-- library for making tables responsive -->
<script src="<?=base_url('design/bower_components/responsive-tables/responsive-tables.js');?>"></script>
<!-- tour plugin -->
<script src="<?=base_url('design/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js');?>"></script>
<!-- star rating plugin -->
<script src="<?=base_url('design/js/jquery.raty.min.js');?>"></script>
<!-- for iOS style toggle switch -->
<script src="<?=base_url('design/js/jquery.iphone.toggle.js');?>"></script>
<!-- autogrowing textarea plugin -->
<script src="<?=base_url('design/js/jquery.autogrow-textarea.js');?>"></script>
<!-- multiple file upload plugin -->
<script src="<?=base_url('design/js/jquery.uploadify-3.1.min.js');?>"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?=base_url('design/js/jquery.history.js');?>"></script>
<!-- application script for Charisma demo -->
<script src="<?=base_url('design/js/charisma.js');?>"></script>

<script>
    $('.addUser').click(function(){
        document.getElementById('user_id').value='';
        document.getElementById('user_fullname').value='';
        document.getElementById('user_name').value='';
        document.getElementById('user_password').value='';
        document.getElementById('user_dept').value = '';
    });
    $('.editUser').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('user_id').value=id[0];
        document.getElementById('user_fullname').value=id[3];
        document.getElementById('user_name').value=id[1];
        document.getElementById('user_password').value=id[2];
        document.getElementById('user_dept').value=id[4];
        document.getElementById('user_access').value=id[5];
        
    });

    $('.addDepartment').click(function(){
        document.getElementById('department_id').value='';
        document.getElementById('department_description').value='';
    });
    $('.editDepartment').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('department_id').value=id[0];
        document.getElementById('department_description').value=id[1];
    });
   $('.editRoom').click(function(){
		var data=$(this).data('id');	        
        var id=data.split('_');
		
		document.getElementById('room_id').value=id[0];
        document.getElementById('room_color').value=id[1];
        document.getElementById('room_type').value=id[2];
        document.getElementById('room_rate_weekday').value=id[3];
        document.getElementById('room_rate_weekend').value=id[4];
        document.getElementById('room_excess').value=id[5];
        document.getElementById('room_inclusion').value=id[6];
	});

    $('.addRoomImage').click(function(){
        var id=$(this).data('id');
        document.getElementById("room_image_id").value=id;
    });
    $('.addRoom').click(function(){
        document.getElementById('room_id').value='';
        document.getElementById('room_color').value='';
        document.getElementById('room_type').value='';
        document.getElementById('room_rate_weekday').value='';
        document.getElementById('room_rate_weekend').value='';
        document.getElementById('room_excess').value='';
        document.getElementById('room_inclusion').value='';
    });
    $('.addPackage').click(function(){
        document.getElementById('pack_id').value='';
        document.getElementById('pack_description').value='';
        document.getElementById('pack_rate').value='';        
        document.getElementById('pack_inclusion').value='';
    });
    $('.editPackage').click(function(){
		var data=$(this).data('id');	        
        var id=data.split('_');
		document.getElementById('pack_id').value=id[0];
        document.getElementById('pack_description').value=id[1];
        document.getElementById('pack_rate').value=id[2];        
        document.getElementById('pack_inclusion').value=id[3];
	});
    $('.bookRoom').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('book_arrival_date').value = id[0];
        document.getElementById('book_depart_date').value = id[0];
        document.getElementById('book_room_id').value = id[1];
        document.getElementById('book_room_type').innerHTML = id[2];
    });
    $('.bookPackage').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('book_arrival_date_package').value = id[0];
        document.getElementById('book_depart_date_package').value = id[0];
        document.getElementById('book_package_id').value = id[1];
        document.getElementById('book_package_type').innerHTML = id[2];
    });
    $('.changeRoomStatus').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('room_status_id').value=id[0];
        document.getElementById('room_status_type').innerHTML = id[1];
        document.getElementById('room_status').value = id[2];
    });
    $('.editReservation').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('edit_book_id').value=id[0];
        document.getElementById('edit_book_customer').value = id[1];
        document.getElementById('edit_book_address').value = id[2];
        document.getElementById('edit_book_contactno').value = id[3];
        document.getElementById('edit_book_email').value = id[4];
        document.getElementById('edit_book_nationality').value = id[5];
        document.getElementById('edit_book_arrival_date').value = id[6];
        document.getElementById('edit_book_depart_date').value = id[7];
        document.getElementById('edit_book_adult').value = id[8];
        document.getElementById('edit_book_child').value = id[9];
        document.getElementById('edit_book_senior').value = id[10];
        document.getElementById('edit_book_source').value = id[11];
        document.getElementById('edit_book_downpayment').value = id[12];
        document.getElementById('edit_book_paymentmode').value = id[13];
    });
    $('.editReservationPackage').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('edit_book_package_id').value=id[0];
        document.getElementById('edit_book_customer_package').value = id[1];
        document.getElementById('edit_book_address_package').value = id[2];
        document.getElementById('edit_book_contactno_package').value = id[3];
        document.getElementById('edit_book_email_package').value = id[4];
        document.getElementById('edit_book_nationality_package').value = id[5];
        document.getElementById('edit_book_arrival_date_package').value = id[6];
        document.getElementById('edit_book_depart_date_package').value = id[7];
        document.getElementById('edit_book_pax_package').value = id[8];
        document.getElementById('edit_book_source_package').value = id[9];
        document.getElementById('edit_book_downpayment_package').value = id[10];
        document.getElementById('edit_book_paymentmode_package').value = id[11];
        document.getElementById('edit_book_room_type_package').innerHTML = id[12];
    });
     $('.addCharges').click(function(){
        var id=$(this).data('id');
        document.getElementById("charged_refno").value=id;
    });
    $('.deleteCharges').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('delete_charge_refno').value=id[0];
        document.getElementById('delete_charge_id').value = id[1];        
    });
    $('.editStocks').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('stock_code').value=id[0];
        document.getElementById('stock_description').value = id[1];        
        document.getElementById('stock_quantity').value = id[2];        
        document.getElementById('stock_sellingprice').value = id[3];        
        document.getElementById('stock_department').value = id[4];        
        document.getElementById('stock_category').value = id[5];        
    });
    $('.addStocks').click(function(){      
        document.getElementById('stock_code').value='';
        document.getElementById('stock_description').value = '';        
        document.getElementById('stock_quantity').value = '';        
        document.getElementById('stock_sellingprice').value = '';        
        document.getElementById('stock_dept').value = '';        
        document.getElementById('stock_category').value = '';        
    });
    $('.addStockQty').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('add_stock_code').value=id[0];
        document.getElementById('add_stock_refno').value = id[1];        
        document.getElementById('add_stock_description').innerHTML = id[2];
    });
    $('.editStockQty').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('edit_stock_code').value=id[0];
        document.getElementById('edit_stock_refno').value = id[1];        
        document.getElementById('edit_stock_description').innerHTML = id[2];
        document.getElementById('edit_stock_old_qty').value = id[3];
        document.getElementById('edit_stock_qty').value = id[3];
    });
    $('.addStockImage').click(function(){
        var id=$(this).data('id');
        document.getElementById("stock_image_code").value=id;
    });
    $('.changeQty').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById("change_qty_id").value=id[0];
        document.getElementById("change_qty_num").value=id[1];
    });
    $('.removeOrder').click(function(){
        var id=$(this).data('id');
        document.getElementById("remove_order_id").value=id;
        document.getElementById('remove_username').value='';
        document.getElementById('remove_password').value='';
    });
    $('.addSingleDiscount').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById("single_disc_id").value=id[0];
        document.getElementById("single_disc_amount").value=id[1]; 
    });
    $('.billPayment').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById("final_payment_refno").value=id[0];
        document.getElementById("final_payment_total_amount").value=id[1]; 
        document.getElementById("final_payment_amount").value=id[1];
        document.getElementById("final_payment_discount").value=id[2]; 
    });
    $('.addDiscount').click(function(){
        var id=$(this).data('id');
        document.getElementById("add_disc_refno").value=id;
        document.getElementById('add_disc_amount').value='';
    });
    $('.proceedPayment').click(function(){
        var id=$(this).data('id');
        document.getElementById("payment_refno").value=id;
        document.getElementById('payment_amount').value='';
    });
    $('.addFBSCharges').click(function(){
        var id=$(this).data('id');
        document.getElementById("request_refno").value=id;
        document.getElementById('request_id').value='';
        document.getElementById('request_item').value='';
        document.getElementById('request_quantity').value='1';
    });
    $('.addChargesFBS').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById("request_room_refno").value=id[0];
        document.getElementById("request_room_res_id").value=id[1];
        document.getElementById("request_room_fullname").value=id[2];
        document.getElementById("request_room_id").value='';        
        document.getElementById('request_room_item').value='';
        document.getElementById('request_room_quantity').value='1';
    });
     $('.editFBSCharges').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById("request_refno").value=id[1];
        document.getElementById('request_id').value=id[0];
        document.getElementById('request_item').value=id[2];
        document.getElementById('request_quantity').value=id[3];
    });
    function showGCash(){
        document.getElementById('gcash').style = 'display:block';
    }
    function unshowGCash(){
        document.getElementById('gcash').style = 'display:none';
    }
    function unshowAll(){
        document.getElementById('card').style = 'display:none';
        document.getElementById('gcash').style = 'display:none';
        document.getElementById('charge').style = 'display:none';
    }
    function showCard(){
        document.getElementById('card').style = 'display:block';
    }
    function unshowCard(){
        document.getElementById('card').style = 'display:none';
    }
    function showCharged(){
        document.getElementById('charge').style = 'display:block';
    }
    function unshowCharged(){
        document.getElementById('charge').style = 'display:none';
    }
    $('.editRoomChargeQty').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById("edit_room_qty_id").value=id[0];
        document.getElementById('edit_room_qty_code').value=id[1];
        document.getElementById('edit_room_qty_quantity').value=id[2];
        document.getElementById('edit_room_qty_description').innerHTML=id[3];
        document.getElementById('edit_room_qty_refno').value=id[4];
        document.getElementById('edit_room_qty_res_id').value=id[5];
        document.getElementById('edit_room_qty_fullname').value=id[6];
    });

    $('.cancelReservation').click(function(){
        var id=$(this).data('id');
        document.getElementById("cancel_refno").value=id;
    });
    $('.undoPayment').click(function(){
        var id=$(this).data('id');
        document.getElementById("undo_refno").value=id;
    });

    $('.checkIn').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById("checkin_refno").value=id[0];
        document.getElementById('checkin_balance').value=id[1];
        document.getElementById('checkin_total_amount').value=id[1];
    });

    function viewStat(value){
        if(value=="monthly"){
            document.getElementById('stat_month').style.display = 'block';
            document.getElementById('stat_year').style.display = 'block';
        }else if(value=="yearly"){
            document.getElementById('stat_month').style.display = 'none';
            document.getElementById('stat_year').style.display = 'block';
        }else{
            document.getElementById('stat_month').style.display = 'none';
            document.getElementById('stat_year').style.display = 'none';
        }
        
    }

    function updateClock() {
      const now = new Date();
      let hours = now.getHours();
      let minutes = now.getMinutes();
      let seconds = now.getSeconds();


      // Add leading zeros if necessary
      hours = hours.toString().padStart(2, '0');
      minutes = minutes.toString().padStart(2, '0');
      seconds = seconds.toString().padStart(2, '0');
      let ampm = hours >= 12 ? 'PM' : 'AM';
      const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;
      
      document.getElementById('clock').textContent = timeString;
    }

    // Call updateClock initially and then every second
    updateClock();
    setInterval(updateClock, 1000);
</script>


</body>
</html>
