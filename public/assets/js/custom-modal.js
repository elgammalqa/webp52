$(document).ready(function(){
	$('.close_popup').click(function(){
		parent.oTable.fnReloadAjax();
		parent.jQuery.fn.colorbox.close();
		return false;
	});
	$('#deleteForm').submit(function(event) {
		var form = $(this);
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize()
		}).done(function() {
			parent.jQuery.colorbox.close();
			parent.oTable.fnReloadAjax();
		}).fail(function() {
		});
		event.preventDefault();
	});
});

$('.wysihtml5').wysihtml5();

$(function() {
    $('.datepicker').datepicker($.extend({	      
	      dateFormat:'yy-m-d',
	      changeMonth: true,
          changeYear: true,
          yearRange: "-100:+0",
          showButtonPanel: true,
	      onSelect: function(date){
	      	console.log("por aqui ...");
	      }
	    }
	));
/*
	$( "#search" ).autocomplete({
	  source: "search",
	  extraParams: {
	  	dep: function(){return $("#department").val()}
	  },
	  minLength: 3,
	  select: function(event, ui) {
	  	$('#search').val(ui.item.value);
	  	$('#user_id').val(ui.item.id);
	  }
	});
*/
	var src = "search", src_id = "search_id";
	$("#search").autocomplete({
	    source: function(request, response) {
	        $.ajax({
	            url: src,
	            dataType: "json",
	            data: {
	                term : request.term,
	                dep : $("#department").val()
	            },
	            success: function(data) {
	                response(data);
	            }
	        });
	    },
	    min_length: 3,
	    select: function(event, ui) {
		  	$('#search').val(ui.item.value);
		  	$('#user_id').val(ui.item.id);
		  }
	});

	$("#search_r").autocomplete({
	    source: function(request, response) {
	        $.ajax({
	            url: src_id,
	            dataType: "json",
	            data: {
	                term : request.term,
	                dep : $("#department").val()
	            },
	            success: function(data) {
	                response(data);
	            }
	        });
	    },
	    min_length: 3,
	    select: function(event, ui) {
		  	$('#search').val(ui.item.name);
		  	$('#user_id').val(ui.item.id);
		  }
	});

 });
$(prettyPrint)