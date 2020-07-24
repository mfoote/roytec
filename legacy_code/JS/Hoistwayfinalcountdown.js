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
});
    
	//getting rid of scroll bars
	$("body").css("overflow", "hidden"); 


    //recording user id to a work order
    $("#start").click(function(){ 
        $.blockUI({ message: $('#ack') });
            $("#submit").click(function(e){
                e.preventDefault();
                var id = parseInt($("#empID").val()),
                workorder = $("#workorder").text(),
                area = $("#area").val(),
                partnumber = $("#partNumber").text();

                $('#countdown').TimeCircles().start();

                console.log(id,workorder,area,partnumber);

                    $.ajax({
                        type:"post",
                        url: "../../Database/InsertStatusHoistway.php",
                        data:{"employee" : id, "workorder" : workorder, "area" : area, "partnumber" : partnumber},
                        success: function(results){
                            console.log(results);
                        },
                        complete: function(results)
                        {
                            $.unblockUI();
                        },
                        error: function(results)
                        {
                            console.log(results);
                        }
                    });
                });

    });

        $('#stop').click(function(){
             $("#countdown").TimeCircles().stop(); 
             var timelap = $("#countdown").TimeCircles().getTime();
             var workorder = $("#workorder").text();
             var numVal = parseInt($("#completedParts").text());
             var qty = $("#qty").text();
             var area = $("#area").val();   
             
            $.blockUI({ message: $('#downtimemessage') });
            $('#downtimeCounter').countimer();
            $('#downtimeCounter').css("font-size","25px");
            $("#countdown").TimeCircles().stop();

    });
    $("#FinishDowntime").click(function(){
        var downtime = $('#downtimeCounter').text();
        var workorder = $("#workorder").text();
        var partnumber = $("#partNumber").text();

        $.ajax({
            type:"post",
            url: "../../Database/recordDownTimeHoistway.php",
            data:{"Contract" : workorder, "PartNumber" : partnumber, "Downtime" : downtime},
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

    $("#Finished").click(function(){
        var workorder = $("#workorder").text(),
         partnumber = $("#partNumber").text(),
         quotedTime = parseInt($("#quotedtime").text())/60,
         timetaken = $('#countdown').TimeCircles().getTime()/3600,
         employee = parseInt($("#empID").val()),
         area = $("#area").val();

        $.ajax({
            type:"POST",
            url:"../../Database/insertFinishedHoistway.php",
            data:{"PN" : partnumber, "Contract" : workorder,"Run_Start_Time" : timetaken,"Quoted_Time" : quotedTime, "employee" : employee,"area" : area},
            success: function(results){
                console.log(results);
                console.log(workorder,partnumber,quotedTime,timetaken);
            }
        });
        
        $.ajax({
            type:"POST",
            url:"../../Database/HoistwayUpdateStatus.php",
            data:{"PN" : partnumber, "Contract" : workorder, "employee" : employee,"area" : area},
            success: function(results){
                console.log(results);

                $('#countdown').TimeCircles().stop();
                window.location.replace('http://192.168.1.130/Schedules_Remake/Views/Hoistway/'+area + '.php');
            }
        });
    });
