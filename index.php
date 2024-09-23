<?php
$date="date.txt";
$text="text.txt";
date_default_timezone_set("Asia/Tbilisi");
if(isset($_POST['save'])) {
	@unlink($date);
	$open=fopen("$date","w");
	fwrite($open,"$_POST[date]");
	fclose($open);
	@unlink($text);
	$open=fopen("$text","w");
	fwrite($open,"$_POST[text]");
	fclose($open);
	echo '<h4 style="color: green;"><a href="/index.php" title="გადატვირთვა"><img src="/loader.gif"></a> <font style="color: green;"><i>წარმატებით განახლდა! </font> <font style="color: gray;">გმადლობთ.</font></i></h4>';
} else {
	echo '<h4><a href="/index.php" title="გადატვირთვა"><img src="/loader.gif"></a>  <font style="color: black;"><i>ბოლოს განახლდა:</font> <font style="color: blue;">'; echo file_get_contents($date); echo '</i></font></h4>';
}

?>
<Title>საწერი დაფა</Title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<style>
textarea[placeholder]
{
    text-align: left; padding: 20px; color: #f4511e;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<script>
function copy() {
  let textarea = document.getElementById("textarea");
  textarea.select();
  document.execCommand("copy");
}
$("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
document.querySelector("button").onclick = function(){
    document.querySelector("textarea").select();
    document.execCommand('copy');
}
</script>
<form method="post" action="/index.php">
<input type="hidden" name="date" value="<?php echo date('d-m-Y l H:i:s'); ?>">
	<textarea maxlength="9999" id="textarea" style="width:100%; height: 100%; border-color: #f4511e; border-style: dashed; border-radius: 20px 20px 20px 20px;" name="text" placeholder="შეიყვანეთ ტექსტი..."><?php echo file_get_contents($text); ?></textarea>
	<br/>
	<button class="button" style="vertical-align:middle" type="submit" title="რედაქტირება" name="save"><span>დაწერა</span></button><a class="button" style="vertical-align:middle" title="ასლის გაკეთება" onclick="copy()"><span>გადატანა</span></a>
</form>
<div style="padding: 10px; display: block; position: fixed; bottom: 0; right: 0;"><?php include 'top.php'; ?></div>
