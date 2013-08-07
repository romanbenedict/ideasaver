<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Lightbulb Idea Saver</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="js/backstretch.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/main.css" type="text/css" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/smoothness/jquery-ui.css" type="text/css" />
 
</head>
 
<body id="index" class="home">

<div id="container">

<div id="header">
<h1>Lightbulb</h1>
</div>

<div id="ideacontainer">
<div id="arealeft"></div>
<div id="arearight">
<div class="sidebar" id="addnew"><img src="img/plus.png"></div>
<div class="sidebar" id="sharethis"><img src="img/checkmark.png"></div>
<div id="sharebox" style="display: none">
	<div class="addthis_toolbox">
			<div class="vertical">
				<a class="addthis_button_email">Email</a>
				<a class="addthis_button_print">Print</a>
				<a class="addthis_button_twitter">Twitter</a>
				<a class="addthis_button_facebook">Facebook</a>
				<a class="addthis_button_evernote">Evernote</a>
				<a class="addthis_button_wordpress">Wordpress</a>
				<a class="addthis_button_tumblr">Tumblr</a>
				<div class="more">
				<a class="addthis_button_expanded">More Destinations</a>
			</div>
		</div>
	</div>
</div>
<div class="sidebar" id="deletethis"><img src="img/close.png"></div>
<div id='deletebox' style='display: none'>Are you sure you want to forget idea <span id="deleteideanumber">#</span>? This can not be undone.<form id="forgetform" method="get" action="php/forget.php"><input type="hidden" name="inputideanumber" value="0"></form></div>
<script>
  $(function() {
    $( "#sharebox" ).dialog({
      autoOpen: false,
      show: {
        effect: "fade",
        duration: 1000
      },
      hide: {
        effect: "fade",
        duration: 1000
      }
    });
 
    $( "#sharethis" ).click(function() {
      $( "#sharebox" ).dialog( "open" );
    });
  });</script>
<script>
    $( "#deletebox" ).dialog({
      autoOpen: false,
	  modal: true,
	  	  buttons: {
        "Forget": function() {//submittodelete
					$('#forgetform').ajaxSubmit(options={target: '#ideacontent', success: $( "#deletebox" ).dialog( "close" ) }); 
					//$( "#deletebox" ).dialog( "close" );
					return false;
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      show: {
        effect: "fade",
        duration: 1000
      },
      hide: {
        effect: "fade",
        duration: 1000
      }
    });
 </script><script>
    $( "#deletethis" ).click(function() {
	  $("#deletebox").html(function() {
			var ideanumber = $("#ideaid").text();
			return "Are you sure you want to forget idea <span id='deleteideanumber'>" + ideanumber + "</span>? This can not be undone.<form id='forgetform' method='get' action='php/forget.php'><input type='hidden' name='inputideanumber' value="+ ideanumber +"></form>";
					});      
		$( "#deletebox" ).dialog( "open" );    
});
</script>
</div>
<div id="mainnote">
<div id="ideacontent" class="refresh">Something went wrong!
</div>
<div id="addideaform" class="addnew">
<form id="ideaboxform" method="post" action="php/addnew.php">
<textarea name="ideabox" id="ideabox" rows="0" cols="0">What are you thinking?</textarea>
<script>
    CKEDITOR.replace( 'ideabox', {
    uiColor: '#FFE7C8'
} );
</script>
</form>
</div>
</div>
</div>

<div id="footer">


<button class="minimal refresh" id="refreshidea">Another!</button>
<script>
$("#refreshidea").click(function(){
		$.ajax({url:"php/random.php",success:function(result){
			$("#ideacontent").html(result);
  }});
});</script>
<script>
$(document).ready(function() {
		$.ajax({url:"php/random.php",success:function(result){
			$("#ideacontent").html(result);
  }});
});</script>


<div id="addedbuttonsbox" class="addnew" style="display:none">
<button class="minimal" id="saveidea">Save idea for later</button><button class="minimal" id="cancelsaveidea">Forget about it</button>
<script>
$("#addnew").click(function(){
$( ".refresh" ).hide( "fade", 250 );
$( ".addnew" ).delay(250).show( "fade", 250 );
});</script>
<script>
$("#cancelsaveidea").click(function(){
$( ".addnew" ).hide( "fade", 250 );
$( ".refresh" ).delay(250).show( "fade", 250 );
});
</script></div>


</div>
<script>
$(document).ready(function() {
  $( ".sidebar" ).hide( "slide", { direction: "left" }, 500 );
});</script>
<script>
$( "#ideacontainer" ).hover(
function() {
  $( ".sidebar" ).show( "slide", 800 );
  },
function() {
  $( ".sidebar" ).hide( "slide", 250 );
});
</script>

</div>
<script>//form submit script
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#ideaboxform').ajaxForm({ 
				beforeSerialize:  function(){
					for ( instance in CKEDITOR.instances )
							{
					CKEDITOR.instances[instance].updateElement();
							}
					return true
					},
				target: '#ideacontent',
				clearForm: true,
				success: function(){
						$( ".addnew" ).hide( "fade", 250 );
						$( ".refresh" ).delay(250).show( "fade", 250 );
						CKEDITOR.instances.ideabox.setData("And another?")
							}
            }); 
        }); 
		$('#saveidea').click(function() {
			$('#ideaboxform').submit();
				});
</script>
<script>//idea delete script
</script>
<script>$.backstretch("img/grey%20background.jpg");</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
</body>
</html>