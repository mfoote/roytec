$(document).ready(function() {
var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1];
    nophp = last_part.substring(0,last_part.length - 4);

    console.log(nophp);

    $("tbody").sortable({
        items: "> tr",
        appendTo: "parent",
        helper: "clone"
    }).disableSelection();

    $('select').on('change', function(){
        var id =$(this).closest('tr').find('#ID').attr("data-id");
        var status = $(this).val(); 

        if($("option:selected",this).val() == '1')
        {
            $(this).closest("tr").removeClass();
            $(this).closest("tr").addClass('green lighten-4');

        }
        else if($("option:selected", this).val()=='0')
        {
            $(this).closest("tr").removeClass();
        }
        else if($("option:selected", this).val()=='2')
        {
            $(this).closest("tr").removeClass();
            $(this).closest("tr").addClass('red darken-4');
        }
        else if($("option:selected", this).val()=='3')
        {
            $(this).closest("tr").removeClass();
            $(this).closest("tr").addClass('yellow lighten-1');
        }

        $.ajax({
            type:"post",
            url: "../Database/updateStatus.php",
            data:{"Status": status, "ID" : id, "Table" : nophp},
            error: function(){  
                console.log(status,id,nophp,tableNumber);
                },
            success: function() {
            }
        });
    });

        $('input[id=notes]').on('change', function() {
            var id =$(this).closest('tr').find('#ID').attr("data-id");
            var notes = $(this).closest('tr').find('#notes').val();
            console.log(nophp,notes,id);
            $.ajax({
                type:"post",
                url: "../Database/updateNotes.php",
                data:{"Notes": notes, "ID" : id, "Table" : nophp},
                error: function(){  
                    console.log("error");
                    },
                success: function() {
                }
            });
        });

        $('Select[id=table]').change(function() {
            var id =$(this).closest('tr').find('#ID').attr("data-id");
            var tableNumber = $(this).closest('tr').find("#table").val();
            console.log(tableNumber,id,nophp);
            $.ajax({
                type:"post",
                url: "../Database/updateTable.php",
                data:{"tableNumber": tableNumber, "ID" : id, "Table" : nophp},
                error: function(results){  
                    console.log(results);
                },
                complete: function(results){
                    console.log(results);
                }
            });
        });
          
});
