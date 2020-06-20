$("button").click(function(){
    var quotedTime,workOrder,qty,partNumber, 
    url = $(location).attr('href'),
    parts = url.split("/"),
    area = parts[5];
    quotedTime= $(this).closest('tr').find('#quotedTime').text();
    workOrder = $(this).closest('tr').find('#workOrder').text();
    qty = $(this).closest('tr').find('#qty').text();
    partNumber = $(this).closest('tr').find('#partNumber').text();
    form = $("#formAction");

    console.log(area);
    
    $.ajax({
        type:"post",
        url: "../../Database/updateMaterialVerification.php",
        data:{"WorkOrder" : workOrder, "PartNumber" : partNumber, "Verified" : 2, "area" : area},
        success: function()
        {
            $("input[name=WorkOrder]").val(workOrder);
            $("input[name=partNumber]").val(partNumber);
            $("input[name=Qty]").val(qty);
            $("input[name=QuotedTime]").val(quotedTime);
            $("input[name=area]").val(area);
        
            form.submit();
        }
    }); 

    });
