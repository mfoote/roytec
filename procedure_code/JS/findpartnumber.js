$(document).ready(function(){
    M.AutoInit();
  });

  $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      var instance = M.Collapsible.getInstance($('.collapsible'));
    
      if(value !== '')
      {
          instance.open();
      }
      else
      {
          instance.close();
      }
    
      $("table > tbody > tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });

  });