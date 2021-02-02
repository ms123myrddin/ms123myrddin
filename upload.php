<?php
require_once('./header.html');
include('db.php');
session_start();
$session_id='1'; //$session id
?>
<html>
<head>
<title>Sharepic</title>
</head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.wallform.js"></script>

<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').on('change', function()			{ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>

<style>

body
{
font-family:arial;
}
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

</style>
<body>

<div style="width:600px">

	<div id='preview'>
	</div>
	


<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Upload your image 
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<div id='imageloadbutton'>
<input type="file" name="photoimg" id="photoimg" />
</div>
</form>
<form action="chat.php" method="post">
  Username:<br>
  <input type="text" name="firstname" value=""><br>
  Message:<br>
  <input type="text" name="lastname" value=""><br><br>
  <input type="submit" value="Submit">
</form>


</div>
</body>
</html>
<style>
input[type="file"] {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    
}
</style>