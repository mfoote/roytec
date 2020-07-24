$("button").click(function(){
    var quotedTime,workOrder,qty,partNumber 
    quotedTime= $(this).closest('tr').find('#quotedTime').text();
    workOrder = $(this).closest('tr').find('#workOrder').text();
    qty = $(this).closest('tr').find('#qty').text();
    partNumber = $(this).closest('tr').find('#partNumber').text();

    window.location.replace('../Countdown Timer/Table_1.php?'+'WorkOrder='+workOrder+'&partNumber='+partNumber+'&QuotedTime='+quotedTime+'&Qty='+qty)
});
