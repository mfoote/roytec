M.AutoInit();

$("Select").change(function(){
    var partNumber = $(this).closest('tr').find('td:first-child').text();
    var table = $(this).val();

    $.ajax({
        type: "POST",
        url: "../../Database/HoistwayAdminChangeParts.php",
        data: {"partnumber": partNumber, "table" : table},
        success: function(results){
            console.log(results);
        }
    });
});

$(".material-icons").click(function(){
    var partNumber = $(this).closest('tr').find('td:first-child').text();
    var table = $(this).closest('tr').find('td:eq(1)').val();

    console.log(partNumber,table);
})