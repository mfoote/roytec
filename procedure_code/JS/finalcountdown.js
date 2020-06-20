$(document).ready(function(){
    var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1];
    nophp = last_part.substring(0,last_part.length - 4);
});
$(document).ready(function finalcountdown() {


    //shows the clock
    $('#countdown').TimeCircles({ time : {
        Days: { show:false },
        Hours: { show:false },
        Minutes: { show:true },
        Seconds: {show:false }
        },
        start_angle:0,
        fg_width: 0.03333333333333333	,
        bg_width: 0.5,
        animations: "ticks",
        start:false
        });
 
//hiding orginial clock  and appending the seconds to the minutes clock
  var $container = $('#countdown .textDiv_Minutes');
	$container.find('h4').text('Time Left');
	var $original = $container.find('span');
	var $clone = $original.clone().appendTo($container);
	$original.hide();
		
		$('#countdown').TimeCircles({ time : {
        Days: { show:false,
                color:'#228B22' },
        Hours: {show:false, 
                color:'#228B22'},
        Minutes: {show:false,
                  color:'#228B22' },
        Seconds: {show:false,
                  color:'#228B22' }
    },
    start:false,
    start_angle:0,
	total_duration: parseInt($('#countdown').attr('data-timer'),10)
	}).addListener(function(unit, value, total) {
        var total = Math.abs(total),
         hours = Math.floor(total/3600),
	     minutes = Math.floor(total / 60) % 60,
	     seconds = total % 60;
        if(seconds < 10) seconds = "0" + seconds;
        if(minutes < 10) minutes = "0" + minutes;
	    	$clone.text(hours + ':' + minutes + ':' + seconds);
		
		//setting what should show after time is up
		if( $("#countdown").TimeCircles().getTime()< 0) {
			 var $container = $('#countdown .textDiv_Minutes');
			var minutesText = $container.find('h4').text('Time Left')
			minutesText.text("you lose"); 
			$("#countdown").TimeCircles({ time: {
            Minutes : {color: "#ffffff"},
            Hours : {color:'#ffffff'},
            Seconds: {color: '#ffffff'},
            Days: {color:'#ffffff'}
            },
            e_background: false
        }); 
        }
    //when timer reaches 50% turn it yellow
    if ($('#countdown').TimeCircles().getTime() <= parseInt($("#countdown").attr('data-timer')/2)) {
        $("#countdown").TimeCircles({ time: {
            Minutes: {color: "yellow"}
            }
        })
    } 
    // when timer reaches 75% turn it red      
    if($('#countdown').TimeCircles().getTime() <= parseInt($("#countdown").attr('data-timer')/4)){
        $("#countdown").TimeCircles({ time: {
            Minutes: {color: "red"}
            }
        });
    }
    //when the timer reaches or passes zero remove the background
    if($('#countdown').TimeCircles().getTime() <= 0){
        $("#countdown").TimeCircles({ time: {
            Minutes: {color: "#ffffff"}
            },
            use_background: false
        });
    } 
   
}, "all");
    
	//getting rid of scroll bars
	$("body").css("overflow", "hidden"); 


    //recording user id to a work order
    $("#start").click(function(){ 
        $.blockUI({ message: $('#ack') });
        $("#submit").click(function(){
            var id = parseInt($("#empID").val()),
            workorder = $("#workorder").text(),
            numVal = parseInt($("#completedParts").text()),
            qty = $("#qty").text(),
            area = $("#area").val();
/*             verification = $("#MaterialVerified")

            if(verification.attr('class') == 'bg-danger' || verification.attr('class') == "")
            {
                verification.text("Please verify your material").addClass("bg-danger").css({color: "red"});
                $("#countdown").TimeCircles().stop();
                $.unblockUI();
                return false; 
            }
            else
            {       */      
                $.ajax({
                    type:"post",
                    url: "../../Database/updateEmployee.php",
                    data:{"employee" : id, "workorder" : workorder, "area" : area},
                    success: function(results){
                        console.log(results);
                    },
                    complete: function(results)
                    {
                        console.log(results)
                    },
                    error: function(results)
                    {
                        console.log(results);
                    }
                });
            //updating the status of the work order when work is completed
            if(numVal >= qty)
            {
                $.ajax({
                    type:"post",
                    url: "../../Database/updateStatusUser.php",
                    data:{"WorkOrder" : workorder, "status" : 1, "area" : area}
                });

            }
            else
            {
                //updating the status of the work order to work in process
                $.ajax({
                    type:"post",
                    url: "../../Database/updateStatusUser.php",
                    data:{"WorkOrder" : workorder, "status" : 3, "area" : area}
                });
            }
        //}
    });
});

        $('#stop').click(function(){
             $("#countdown").TimeCircles().stop(); 
             var timelap = $("#countdown").TimeCircles().getTime();
             var workorder = $("#workorder").text();
             var numVal = parseInt($("#completedParts").text());
             var qty = $("#qty").text();
             var area = $("#area").val();       
            
            //check parts completed to work quantity 
            if(numVal >= qty)
            {
                $.ajax({
                    type:"post",
                    url: "../../Database/updateStatusUser.php",
                    data:{"WorkOrder" : workorder, "status" : 1, "area" : area}
                });
                
                
            }
            else
            {
                $.ajax({
                    type:"post",
                    url: "../../Database/updateStatusUser.php",
                    data:{"WorkOrder" : workorder, "status" : 3, "area" : area}
                });
            }

            //recording final lap time
            $.ajax({
                type:"post",
                url: "../../Database/recordStopTime.php",
                data:{"WorkOrder" : workorder, "timelap" : timelap, "count" : numVal, "area" : area},
                error: function(result)
                {
                    console.log(result);
                    console.log(workorder,timelap,numVal);
                },
                success: function(result)
                {
                    console.log(result);
                    console.log(workorder,timelap,numVal);
                }
            });
        });

        $('#countParts').click(function(){
            var numVal = parseInt($("#completedParts").text());
            var empID = parseInt($('#empID').val(),10);
            var workorder = $("#workorder").text();
            var partnumber = $("#partNumber").text();
            var timelap = $("#countdown").TimeCircles().getTime();
            var area = $("#area").val();

            ++numVal;
            $("#completedParts").text(numVal).css("font-size","22px");
            
            if(numVal >= qty)
            {
                $.ajax({
                    type:"post",
                    url: "../../Database/updateStatusUser.php",
                    data:{"WorkOrder" : workorder, "status" : 1, "area" : area},
                    error: function(result)
                    {
                        console.log(result);
                        console.log(workorder);
                    },
                    success: function(result)
                    {
                        console.log(result);
                        console.log(workorder);
                    }
                });  
            }
            else
            {
                $.ajax({
                    type:"post",
                    url: "../../Database/updateStatusUser.php",
                    data:{"WorkOrder" : workorder, "status" : 3, "area" : area},
                    error: function(result)
                    {
                        console.log(result);
                        console.log(workorder);
                    },
                    success: function(result)
                    {
                        console.log(result);
                        console.log(workorder);
                    }
                });  
            }

            $.ajax({
                type:"post",
                url: "../../Database/updateWorkOrder.php",
                data:{"employee" : empID, "WorkOrder" : workorder, "PartNumber" : partnumber, "timelap" : timelap, "count" : numVal,"area" : area},
                error: function(result)
                {
                    console.log(result);
                    console.log(empID, workorder,partnumber,timelap,numVal,area);
                },
                success: function(result)
                {
                    console.log(result);
                    console.log(empID, workorder,partnumber,timelap,numVal,area);
                }
                });
            event.preventDefault();
        });
    });


$(document).on('submit','#formlogin', function(e) {
    var empID = parseInt($('#empID').val(),10);
    var area = $("#area").val();
    var workorder = $("#workorder").text();
    var partnumber = $("#partNumber").text();
    var timelap = $("#countdown").TimeCircles().getTime();
    var count = $("#completedParts").text();
    $.ajax({
        type:"post",
        url: "../../Database/updateWorkOrder.php",
        data:{"employee" : empID, "WorkOrder" : workorder, "PartNumber" : partnumber, "timelap" : timelap, "count" : count,"area" : area},
        complete: function()
        {  
            $('#countdown').TimeCircles().start();
        },
        error: function()
        {
            console.log('error');
        },
        success: function(result)
        {
            $.unblockUI();
            console.log(result);
        }
        });
    event.preventDefault();
});

$("#downtime").click(function(){

    $.blockUI({ message: $('#downtimemessage') });
    $('#downtimeCounter').countimer();
    $('#downtimeCounter').css("font-size","25px");
    $("#countdown").TimeCircles().stop();
    console.log($("input[type='checkbox']").val()); 

    $("#FinishDowntime").click(function(){
        var downtime = $('#downtimeCounter').text();
        var workorder = $("#workorder").text();
        var partnumber = $("#partNumber").text();
        var area = $("#area").val();

        
        $.ajax({
            type:"post",
            url: "../../Database/recordDownTime.php",
            data:{"WorkOrder" : workorder, "PartNumber" : partnumber, "Downtime" : downtime, "area" : area, "reason" : "Downtime"},
            complete: function()
            {  
                $.unblockUI();
                $('#countdown').TimeCircles().start();
            },
            error: function()
            {
                console.log('error');
            },
            success: function(result)
            {
                $.unblockUI();
                console.log(result);
            }
        });
        
        $('.timer').countimer('stop');
        $('#downtimeCounter').countimer('destroy');
        $("#countdown").TimeCircles().start(); 
    
    
    });
});

/* $("#workorder").click(function(){
    $("#MaterialVerified").removeClass('bg-danger');
    $("#MaterialVerified").removeClass('bg-success');

    var workorder = $("#workorder").text();
    var quantity = $("#qty").text();
    var area = $("#area").val();
    console.log("test");

    $.ajax({
        type:"GET",
        url: "../../Database/WorkOrderData.php",
        data:{"WorkOrder" : workorder, "area" : area},
        dataType: 'json',
        async: false,
        success: function (result) {
            $("#getData").empty();
            if(result.length == 0)
            {
                //$.unblockUI();
                $("#MaterialVerified").removeClass('bg-danger');
                $("#MaterialVerified").text("Material Verified").css({color: "Green"}).addClass('bg-success');
            }
            else if(result.length>0)
            {
                $.blockUI({ message: $("#workorderdata"),
                css: { top: '0%',
                       width:'80%',
                       left:'10%'
                     }
                });
                
                for (var i = 0; i <= result.length - 1; i++) {
                    var quantity = parseInt($("#qty").text(),10);
                    var JsonData = result[i];
                    var rawMaterial = JsonData.Raw_Material;
                    var description = JsonData.Description;
                    var amount = JsonData.Amount;
                    var id = Math.ceil(Math.random())+[i];
                    console.log(rawMaterial,description,amount);
    
                    $("#getData").append("<tr><td id='rawmaterial'>"+rawMaterial+"</td><td>"+description+"</td><td>"+Math.ceil(amount)+"</td><td><input type='password' id='materialVerification'>");
                }
            }
        },
        error: function(result)
        {
            console.log(result);
        }
    });

    $('input[id="materialVerification"]').keyup(function(){
        rawMaterial = $(this).closest("tr").find("#rawmaterial").text();
        verify = $(this).closest("tr").find("#materialVerification").val();
        if(rawMaterial.length == verify.length)
        {
            $(this).closest("tr").removeClass("bg-danger");
            if(rawMaterial == verify)
            {
                $(this).closest("tr").addClass("bg-success");
            }
            else if(rawMaterial != verify)
            {
                $(this).closest("tr").addClass("bg-danger");
            }
        }
        else
        {
            $(this).closest("tr").removeClass("bg-success").addClass("bg-danger");
        }
        console.log(rawMaterial.length,verify.length)
    });

    $('#verification').click(function(){
        var items = $('#verificationTable .bg-danger').length;
        var partnumber = $('#partNumber').text();
        var workorder = $("#workorder").text();
        var area = $("#area").val();
        var userinput = $.trim($("#materialVerification").val());
        console.log(items,partnumber,workorder,area)
            
        if(items > 0 || userinput.length == 0)
            {
                $.unblockUI();
                $('#MaterialVerified').css({color: 'red'});
                $('#MaterialVerified').text("Material Verification Failed").addClass('bg-danger');

                $.ajax({
                    type:"post",
                    url: "../../Database/updateMaterialVerification.php",
                    data:{"WorkOrder" : workorder, "PartNumber" : partnumber, "Verified" : 2, "area" : area},
                    error: function()
                    {
                       $.unblockUI();
                       $("#MaterialVerified").text("Material Not Verified").css({color: "red"}).addClass('bg-danger');
                    },
                }); 

            }
            else
            {
            $("#MaterialVerified").removeClass('bg-danger');
            $.ajax({
                type:"post",
                url: "../../Database/updateMaterialVerification.php",
                data:{"WorkOrder" : workorder, "PartNumber" : partnumber, "Verified" : 1, "area" : area},
                complete: function()
                {  
                    $.unblockUI();
                },
                error: function()
                {
                   $.unblockUI();
                   $("#MaterialVerified").text("Material Not Verified").css({color: "red"}).addClass('bg-danger');
                },
                success: function()
                {
                    $.unblockUI();
                    $("#MaterialVerified").removeClass('bg-danger');
                    $("#MaterialVerified").text("Material Verified").css({color: "Green"}).addClass('bg-success');
                }
            }); 
        }
    }); 


});
*/



