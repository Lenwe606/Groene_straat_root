jQuery(document).ready(function($){
	
/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/
	$('#page_template').change(checkTemplate);
	
	function checkTemplate(){
		var template = $('#page_template').attr('value');
		
		//only run on the posts page
		if(template == 'tpl-home.php' ){
			
			$('#acf_acf_page-options').fadeIn("slow");
			
		}else{
			$('#acf_acf_page-options').fadeOut("slow");
		}
		
		
	}
	$(window).load(function(){
		checkTemplate();
	})
});


