
//centers blockui for every device
$.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}


$('a[id="material"]').click(function(){ 
    var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1],
    area = last_part.substring(0,last_part.length - 4).toUpperCase();
    workorder = $(this).closest("tr").find("#WO").text();
    workOrderAppend = workorder +'-001';

    $("#Work_Order").val(workOrderAppend);
    $("#area").val(area);

    $.blockUI({ message: $('#ack') });
    $('.blockUI.blockMsg').center();
});

$('a[id="recordTime"]').click(function(){ 

    var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1],
    area = last_part.substring(0,last_part.length - 4).toUpperCase();
    workorder = $(this).closest("tr").find("#WO").text();
    workOrderAppend = workorder
    partnumber = $(this).closest("tr").find("#PN").text();

    $("#recordWork_Order").val(workOrderAppend);
    $("#recordarea").val(area);
    $("#recordPartNumber").val(partnumber);
    $("#qty").val("");

    $.blockUI({ message: $('#recordForm') });
    $('.blockUI.blockMsg').center();

    
});

$("#start").click(function(){
    var dt = new Date($.now());
    var time = dt.getFullYear()+'-'+ (dt.getMonth() +1)+ '-' + dt.getDate()+' '+dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds() + '.' + dt.getMilliseconds();
    var workorder = $("#recordWork_Order").val(),
        partnumber = $("#recordPartNumber").val(),
        area = $("#recordarea").val(),
        people = $("#numOfPeople").val(),
        Userqty = $("#qty").val();
        

    $.ajax({
        type:"post",
        url: "../Database/recordTime.php",
        data:{"Work_Order": workorder, "PartNumber" : partnumber, "Area" : area, "People" : people, "Time" : time, "Started" : 1, "Quantity" : Userqty },
        error: function(){  
            console.log(workorder,partnumber,area, people);
            },
        success: function(results) {
            $.unblockUI();
            console.log(results);
        },
        error: function(results)
        {
            console.log(results);
        }
    });
});

$("#stop").click(function(){

    var dt = new Date($.now());
    var time = dt.getFullYear()+'-'+ (dt.getMonth() +1)+ '-' + dt.getDate()+' '+dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds() + '.' + dt.getMilliseconds();
    var workorder = $("#recordWork_Order").val(),
        partnumber = $("#recordPartNumber").val(),
        area = $("#recordarea").val(),
        people = $("#numOfPeople").val(),
        Userqty = $("#qty").val();

    $.ajax({
        type:"post",
        url: "../Database/recordTime.php",
        data:{"Work_Order": workorder, "PartNumber" : partnumber, "Area" : area, "People" : people, "Time" : time, "Started" : 2,"Quantity" : Userqty },
        error: function(){  
            console.log(workorder,partnumber,area, people);
            },
        success: function(results) {
            $.unblockUI();
            console.log(results);
        },
        error: function(results)
        {
            console.log(results);
        }
    });
});

$("#exit").click(function(){
    $.unblockUI();
});