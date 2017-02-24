$('.wysihtml5').wysihtml5();
$(prettyPrint);

tinymce.init({
      selector: '.tinymce',
	  height: 300,
	  language: "en_GB",
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table contextmenu paste code'
	  ],
	  file_browser_callback : elFinderBrowser,
	  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	  content_css: [
	    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
	    '//www.tinymce.com/css/codepen.min.css'
	  ]
  });

tinymce.init({
      selector: '.tinymce_arabian',
	  height: 300,
	  directionality: 'rtl',
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table contextmenu paste code'
	  ],
	  file_browser_callback : elFinderBrowser,
	  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	  content_css: [
	    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
	    '//www.tinymce.com/css/codepen.min.css'
	  ]
  });

function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: '/new_version/public/assets/js/elfinder/elfinder.html',// use an absolute path!
    title: 'elFinder 2.0',
    width: 900,  
    height: 450,
    resizable: 'yes'
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}

$(function() {

	var $body = $('body');

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

});
