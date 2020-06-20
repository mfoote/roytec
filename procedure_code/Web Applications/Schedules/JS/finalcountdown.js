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
        total = Math.abs(total);
        var hours = Math.floor(total/3600);
	    var minutes = Math.floor(total / 60) % 60;
	    var seconds = total % 60;
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
            use_background: false
        }); 
        }
    
    if ($('#countdown').TimeCircles().getTime() <= parseInt($("#countdown").attr('data-timer')/2)) {
        $("#countdown").TimeCircles({ time: {
            Minutes: {color: "yellow"}
            }
        })
    }       
    if($('#countdown').TimeCircles().getTime() <= parseInt($("#countdown").attr('data-timer')/4)){
        $("#countdown").TimeCircles({ time: {
            Minutes: {color: "red"}
            }
        });
    }
    
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



    $("#start").click(function(){ 
        $.blockUI({ message: $('#ack') });
            $("#submit").click(function(){
                id = $("#empID").val();
                workorder = $("#workorder").text();
                $.ajax({
                    type:"post",
                    url: "../../Database/updateEmployee.php",
                    data:{"employee" : id, "workorder" : workorder},
                    error: function(results)
                    {
                        console.log(results);
                    },
                    success: function(result)
                    {
                        console.log(result);
                    }
                    });

            })
    });

         $('#stop').click(function(){
             $("#countdown").TimeCircles().stop(); 
             console.log("Stop");
         });
   

        $('#countParts').click(function(){
            var numVal = parseInt($("#completedParts").text()); 
            var empID = parseInt($('#empID').val(),10);
            var workorder = $("#workorder").text();
            var partnumber = $("#partNumber").text();
            var timelap = $("#countdown").TimeCircles().getTime();

            ++numVal;
            $("#completedParts").text(numVal).css("font-size","22px");
            
            $.ajax({
                type:"post",
                url: "../../Database/updateWorkOrder.php",
                data:{"employee" : empID, "WorkOrder" : workorder, "PartNumber" : partnumber, "timelap" : timelap, "count" : numVal},
                error: function()
                {
                    console.log('error');
                },
                success: function(result)
                {

                }
                });
            event.preventDefault();
        });


});


$(document).on('submit','#formlogin', function(e) {
    var empID = parseInt($('#empID').val(),10);
    var workorder = $("#workorder").text();
    var partnumber = $("#partNumber").text();
    var timelap = $("#countdown").TimeCircles().getTime();
    var count = $("#completedParts").text();
    $.ajax({
        type:"post",
        url: "../../Database/updateWorkOrder.php",
        data:{"employee" : empID, "WorkOrder" : workorder, "PartNumber" : partnumber, "timelap" : timelap, "count" : count},
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

$("#partNumber").click(function(){
    var partnumber = $("#partNumber").text();
    window.open('../Drawings/finddrawing.php?partnumber='+partnumber);
})

