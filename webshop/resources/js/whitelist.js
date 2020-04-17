$(function(){
  $('#add').click(function() {
    
      var newTask = $('#Input').val();
  
      if(newTask !== '') {
        
          var count = $("#whitelist").children().length;
          
          $('#whitelist').append('<li class="list-group-item deletetask bg-success">'+ newTask + '</li>');
         
          $('#Input').val('');
          
          deleteTasks();
          
          setTimeout(function(){
            $('#whitelist li.bg-success').removeClass('bg-success');
          },1000); 
        
      } else {
          alert('Come on, you\'re better than that');   
      }
  });  
  });
  
  function deleteTasks(){
   $('.deletetask').click(function(){
      $(this).remove();
  }); 
  
  }