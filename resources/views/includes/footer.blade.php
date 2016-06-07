 <script type="text/javascript">

var whiteSpace = " \t\n\r";
function isEmpty(fieldValue)
{
	if((fieldValue == null) || (fieldValue.length == 0))
	return true ;
	for(var i=0;i< fieldValue.length;i++)
	{
			var c = fieldValue.charAt(i);
			if(whiteSpace.indexOf(c) == -1)
			return false ;
	}
	return true ;
}	 
	 
function checkEmail(email)
{
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
	return emailPattern.test(email);
} 
	 
function phoneFormat(form) { 
  var numbers = form.value.replace(/\D/g, ''),
        char = { 0: '(', 3: ') ', 6: '-' };
            form.value = '';
            for (var i = 0; i < numbers.length; i++) {
                form.value += (char[i] || '') + numbers[i];
            } 
    
}
	 
function phoneFormat2(form) {
    var get_input_id = form.id; 
    var pid=get_input_id+'_phoneSpan';
    var title=form.title;  
    var phoneRegEx =/^\(\d{3}\) \d{3}-\d{4}$/;
    value = form.value;  
     if(value.match(phoneRegEx)) {
         //alert('valid');         
         $("#"+pid).remove();    
     } else{
          //alert('InValid');         
         //Check error id is created or not => if id length is zero then add one id
         if (jQuery("#"+pid).length == 0){ 
             $( "<div id='"+pid+"'>Test</div>" ).insertAfter( "#"+get_input_id );
              //$( ".error-message" ).remove(); 
             $("#"+pid).html('<div class="error-message"  style="text-align: left !important;">Please enter valid '+title+'.<br> eg. (878) 345-3454</div>'); 
            } else {
             $("#"+pid).html('<div class="error-message"  style="text-align: left !important;">Please enter valid '+title+'.<br> eg. (878) 345-3454</div>'); 
            }
        
     }
    
}
</script>
<style>
	.success {
color: #4F8A10;
}
</style>	

	
  <div class="footerSec">
    	<div class="container">
        	<div class="ftInn">
            	<div class="ftCol col-md-4">
                	<div class="ftMenu">
                    	<h4>Menu</h4>
                        <p><a href="{!!Request::root()!!}">Home</a><span> / </span>
						<a href="{!!Request::root().'/page/about-us'!!}">About Us</a> <span> / </span> 
						<a href="{!!Request::root().'/page/contact-us'!!}">Contact us</a> <span> / </span> 
						<a href="{!!Request::root().'/page/privacy'!!}">Privacy</a> </p> 
                    </div>
                    <?php /*?>
                    <div class="ftAbout">
                    	<h4>About</h4>
						<p></p>
                        <div class="readMoreSec">
							<a href="{!!Request::root().'/page/about-us'!!}" class="readMore">Read More</a>
                        	<!--<input type="button" value="Read More" class="readMore">-->
                        </div>
                    </div>
                    <?php */?>                    
                </div>
                <div class="ftCol col-md-4">
                	<div class="ftContact">
                    	<h4>Contact</h4>
                        <p><strong>Our office:</strong> <br>Address Line 1 <br>Line 2<br>
							Email: <a href="malito:contact@youtubevideo.com">contact@youtubevideo.com</a></p>
                    </div>
                    
                </div>
                
                <div class="ftCol col-md-4">
                	<div class="ftContact">
                    	<h4>Social</h4>
                        <div class="socialBtns">
                        	<a href="#" target="_blank"><img src="{!!Request::root().'/images/fb.png'!!}" alt=""></a> 
							<a href="#"><img src="{!!Request::root().'/images/tweet.png'!!}" alt=""></a>
							<a href="#"><img src="{!!Request::root().'/images/googlePlus.png'!!}" alt=""></a>
                        </div>
                    </div>
                    
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<a href="#0" class="cd-top">Top</a> 
<a href="#0" class="cd-top">Top</a> 

<!-- Load Facebook SDK for JavaScript  Comment post-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1520322508268208";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



