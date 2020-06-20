$(".btn-success").click(function(){
    quotedTime= $(this).closest('tr').find('#quotedTime').text();
    workOrder = $(this).closest('tr').find('#contract').text();
    qty = $(this).closest('tr').find('#qty').text();
    partNumber = $(this).closest('tr').find('#partNumber').text();
    form = $("#formAction");

    console.log(quotedTime,workOrder,partNumber,qty);
    
    $.ajax({
        type:"post",
        url: "../../Database/updateGrabbed.php",
        data:{"contract" : workOrder, "PartNumber" : partNumber},
        success: function()
        {
            $("input[name=WorkOrder]").val(workOrder);
            $("input[name=partNumber]").val(partNumber);
            $("input[name=Qty]").val(qty);
            $("input[name=QuotedTime]").val(quotedTime);
            form.submit();
        }
    }); 
})