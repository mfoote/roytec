$(document).ready(function(){
    M.AutoInit();
});

$.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ($(window).height() - this.height()) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}

$("a:not(#submit)").click(function(){
    var that = $(this).closest("tr"),
    workOrder = that.find("td:nth-child(1)").text(),
    partNumber = that.find("td:nth-child(2)").text();
    notOnHand = that.find("td:nth-child(5)").text();
    woQty = that.find("td:nth-child(3)").text();

    $("#notOnHand").val(notOnHand);
    $("#workorder").val(workOrder);

    $("input[type=text]").keyup(function(){
        $(this).val($(this).val().toUpperCase());
      });

    $.blockUI({ message: $("#PartCheck")});
    $('.blockUI.blockMsg').center();
    M.updateTextFields();

    $("#submit").click(function(){
        var ini =  $("#initials").val(),
        quantity = $("#quantity").val(),
        location = $("#location").val();

        $.ajax({
            type: "POST",
            url: "MORV.php",
            data:{"WorkOrder" : workOrder, "partNumber" : partNumber,"initials" : ini, "quantity" : quantity,"location" : location,"woQty" : woQty},
            success: function(data){
                console.log(data);
                $.unblockUI();
            }
        })
    })
});
