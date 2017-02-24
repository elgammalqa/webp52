$(function() {

	var $body = $('body');

  $('.datepicker').datepicker($.extend({        
        dateFormat:'yy-m-d',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        showButtonPanel: true,
        minDate:0,
        onSelect: function(date){
          console.log("por aqui ...");
        }
      }
  ));

  $body.on('click', '[data-rel="change-user-type"]', function(){
  	$this = $(this);
  	if($this.val() == 1){
  		$('.justStaff').show();
  	}else{
  		$('.justStaff').hide();
  	}
  });

  $body.on('click', '[data-rel="show-content"]', function(){
    $this = $(this);
    $content = $("#" + $this.attr("data-content"));
    
    $content.toggle('slow');

  });

  $body.on('click', '[data-rel="delete-letter"]', function(){
    $this = $(this);
    $id = $this.attr("data-id");
    
    console.log($id);

    $url = "myletters/" + $id + "/delete";

    $.ajax({
            url: $url,
            type: 'GET'
        })
        .done(function( data ) {
             location.reload(); 
        });

  });

  $body.on('click', '[data-rel="submit-form"]', function(){
    $this = $(this);
    $form = $("#" + $this.attr("data-form"));
    
    $this.html('<span class="glyphicon glyphicon-refresh spinning"></span> Sending...');

    $form.submit();
    $this.submit();

  });      


 });