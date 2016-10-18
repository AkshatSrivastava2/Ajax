<!DOCTYPE html>
<html>
<head>
	<title>Polling Area</title>
	<script>
		function getVote(int)
		{
			if(window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200){
					document.getELementById("poll").innerHTML=this.responseText;
				}
			}	

			xmlhttp.open("GET","poll_vote.php?vote="+int,true);
			xmlhttp.send();
		}
	</script>
</head>
<body>

<div id="poll">
	<h1>Whom Do You Like ? Rahul Gandhi or Narendra Modi </h1>
	<form>
	Rahul Gandhi :
	<input type="radio" name="gender" value="female" onclick="getVote(this.value=0)">
	Narendra Modi :
	<input type="radio" name="gender" value="male" onclick="getVote(this.value=1)">
	</form>
</div>
</body>
</html>