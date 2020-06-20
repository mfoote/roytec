$(document).ready(function(){
    setInterval(function(){
        $.ajax({
            url: "../../Database/adminToJson.php",
            async: true,
            type: "GET",
            success: function(results){
                $("#placement").empty();
                console.log(results);
                var parsed = JSON.parse(results);
                console.log(parsed);
                 for (var i = 0; i <= parsed.length - 1; i++) {
                    var id = Math.floor(Math.random() * (100000 - 1 + 1)) + 1;
                    var JsonData = parsed[i];
                    var PartNumber = JsonData.PartNumber;
                    var Timelap = JsonData.Timelap;
                    var PartsCompleted = JsonData.PartsCompleted;
                    var QuotedTime = JsonData.QuotedTime;
                    var Quantity = JsonData.Quantity;
                    var percentage = parseInt((PartsCompleted/Quantity)*100);
                    console.log(percentage);
        
                    $("#placement").append('<div class="col m6">\
                                                <div class="card-panel">\
                                                    <div class="row">\
                                                        <h5 class="col s10 m10">'+PartNumber+'</h5>\
                                                        <h5 class="col s2 m2 right-align">'+PartsCompleted+'/'+Quantity+'</h5>\
                                                    </div>\
                                                    <div class="progress">\
                                                        <div class="determinate" style="width:'+percentage+'%"></div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            ');
            } 
        }
    });
},1000);
});