setInterval(function(){
    var partnumber = [];
    var partcount = [];
    var downtime = [];
    var downtimePart = [];
        $.ajax({
            type:"GET",
            dataType:"json",
            async:"true",
            url:"testdata.php",
            success: function(results){
              for (var i = 0; i <= results.length - 1; i++) {
                    var jsonData = results[i];
                        partnumber.push(jsonData.PartNumber);
                        partcount.push(jsonData.count);
                    }
                    console.log(partnumber);
        
        var ctx = document.getElementById("partsCompleted")
        ctx.height = 350;
        ctx.width = 850;
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: partnumber,
            datasets: [{
                label: '# of Parts Completed',
                data: partcount,
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            animation:false,
            maintainAspectRatio: true,
            responsive: true,
            aspectRatio: 0,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    },
                    gridLines: {
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
        
    });
    
            },
            error: function(results){
                console.log(results);
            }
        });
    },10000);