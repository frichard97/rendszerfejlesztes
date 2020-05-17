
$(function(){
  $('#add').click(function() {

      var newTask = $('#Input').val();

      if(newTask !== '') {

          var count = $("#whitelist").children().length;

          $('#whitelist').append('<li class="list-group-item deletetask bg-success">'+ newTask + '</li>');


          $("#whitelist").append("<input type='text' id='"+newTask+"' name='emails[]' style='display:none;' value='"+newTask+"'>");

          deleteTasks();

          setTimeout(function(){
            $('#whitelist li.bg-success').removeClass('bg-success');
          },1000);

      } else {
      }
  });
  });

  function deleteTasks(){
   $('.deletetask').click(function(){
      $(this).remove();
      $("#"+$(this).html()).remove();
  });

  }
