(function($){
	$(document).ready(function(){

		 //form submit

		 let un,pass;
		 $('input#btn').click(function(){

		 	un=$('input#usenam').val();
		 pass=$('input#pass').val();

		 if(un =='' || pass ==''){

		 	$('.box img').show();

		 	

		 	let cls =setInterval(function(){
		 		$('.box img').hide();

		 		$('h2').html('<span style="color:red;">** Data Must be Required</span>');

		 		clearInterval(cls);

		 		let im = setInterval(function(){
		 			$('h2').html('');
		 			clearInterval(im);

		 		},1000);


		 	},3000);
		 	


		 }else{

		 $('.box img').show();

		 	

		 	let cls =setInterval(function(){
		 		$('.box img').hide();

		 		$('h2').html('<span style="color:green;">** Data Stable</span>');

		 		clearInterval(cls);

		 		let im = setInterval(function(){
		 			$('h2').html('');
		 			clearInterval(im);

		 		},1000);


		 	},3000);
		 	

		 	
		 }




		 });
			












	});

})(jQuery)