// if it is necesary. for the moment no.

$(function(){

    $("body").on('click', '[data-rel="change-user-type"]', function(){
      $this = $(this);
      if($this.val() == 1){
        $('.justStaff').show();
      }else{
        $('.justStaff').hide();
      }
    });
    
   $("body").on("click", ".openModal",  function(){
   		$content = $(this).attr('data-remote');
      $title   = $(this).attr('data-title');
   		$.ajax({
            url: $content,
            type: 'GET'
        })
        .done(function( data ) {
        	updateModalContent(data, $title);        	
        });
        
    });

   $("body").on("click", ".openWindow",  function(){
      $content = $(this).attr('data-remote');
      $title   = $(this).attr('data-title');
      
      window.open($content,'_blank',
                  "status=yes,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=no");
        
    });

   $("body").on('change', '[data-rel="filter-dep"]', function(){
    $this = $(this);
    url = "jobs/" + $this.val() ;     
      $.ajax({
            url: url,
            type: 'GET'
        })
        .done(function( data ) {
          updateModalContent(data, '');         
        });
  });

   $("body").on('change', '[data-rel="filter-employee"]', function(){
    $this = $(this);
    url = "intranet/public/employees/" + $this.val() ;     
      $.ajax({
            url: url,
            type: 'GET'
        })
        .done(function( data ) {
          updateModalContent(data, '');         
        });
  });

   updateModalContent = function(data, title){

      if (title != "")
        $('#myModal').find("span.title").html(title);
   		$('#myModal').find(".modal-body").html(data);
      $('#myModal').modal('show');          	
   }

   $("body").on("submit", "form",  function(e){      
      e.preventDefault();
      $path = $(this).attr("action");
      
      $title = $(this).attr('title');

      $.post($path, 
         $($(this)).serialize(), 
         function(data, status, xhr){
           updateModalContent(data, $title);
         });
      
    });
/*
   $("body").on('click', '[data-rel="submit-form"]', function(e){
    e.preventDefault();
    $this = $(this);
    $form = $("#" + $this.attr("data-form"));
    
    $this.html('<span class="glyphicon glyphicon-refresh spinning"></span> Sending...');

    //$form.submit();
    $(this).submit();

  });  
*/
   $("body").on("click", ".showdetails",  function(){
      $id = $(this).attr('data-event-id');
      url = "intranet/public/event/" + $id + "/data" ;     
      $.ajax({
            url: url,
            type: 'GET'
        })
        .done(function( data ) {
          updateDetailContent(data);         
        });
        
    });

   updateDetailContent = function(data){
      $('#myModal').find("#viewdetails").html(data);
      $('#myModal').find("#viewdetails").show();
   }

   $("body").on('click', '[data-rel="show-video"]', function(){
    
      $this = $(this);

      if($("#youtube").hasClass('in'))
        $this.html('<span class="glyphicon glyphicon-film"></span> View Video</a>');
      else
        $this.html('<span class="glyphicon glyphicon-film"></span> Hide Video</a>');

    
  });
   
})
