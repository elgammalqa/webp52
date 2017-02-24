// if it is necesary. for the moment no.

$(function(){

  $("body").on('change', '[data-rel="filter-dep"]', function(){
    $this = $(this);
    url = $this.attr('data-route') + "/" + $this.val() ;  

    $.ajax({
        url: url,
        type: 'GET'
        })
        .done(function( newUrl ) {
        	if(newUrl)
        	window.location.href = newUrl  
        });

    
  });

  $("body").on('click', '[data-rel="change-user-type"]', function(){
      $this = $(this);
      if($this.val() == 1){
        $('.justStaff').show();
      }else{
        $('.justStaff').hide();
      }
    });

   
   
})
