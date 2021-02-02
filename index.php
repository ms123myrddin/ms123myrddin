<?php
require_once('./header.html');
define('OTHPATH', './uploads/');
$files = [];
if (is_dir(OTHPATH) && $dir = opendir(OTHPATH)) {
    while (($file = readdir($dir)) !== false) {
        /* Skip anything that's not a regular file */
        if (filetype(OTHPATH . '/' . $file) !== 'file') {
            continue;
        }
        /* Skip files that don't end in .jpg */
         $allowed = array("png", "jpg", "gif", "jfif","html");
         $ext = pathinfo(OTHPATH . '/' . $file, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            continue;
        }
        /* Add this file to the array with its modification time as the key */
        $files[filemtime(OTHPATH . '/' . $file)] = $file;
    }
    closedir($dir);
}
/* Sort the array by key in reverse order */
$i = 0;
krsort($files);
echo"<div class='column'>";
foreach ($files as $value) {
if (strpos($value, '.html') == false) {
if (strpos($value, '+nsfw+') == false) {
echo "<img src='./uploads/$value'/>"; 
}
else {
$i++;
echo "<img id='$i' onclick='unblur()' class='nsfw blur' src='./uploads/$value'/>";
}
}else{
include "./uploads/$value";
}
}
echo"</div>";



/*
$arrayrandomfile = (glob("./blogs/*.php"));
$random_keys= array_rand($arrayrandomfile,3);

echo $arrayrandomfile[$random_keys[0]]."<br>";
echo $arrayrandomfile[$random_keys[1]]."<br>";
echo $arrayrandomfile[$random_keys[2]];echo $arrayrandomfile[$random_keys[3]];
*/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  background-color: #333333;
}

.header {
  text-align: center;
  padding: 32px;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
  position: absolute;
  left: 50%;
  transform: translate(-50%)
}

.column img {
  margin-top: 15px;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    -ms-flex: 50%;
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}
.blur{
  filter: blur(6px);
  -webkit-filter: blur(6px);
}
.unblur{
  filter: blur(1px) !important;
  -webkit-filter: blur(1px) !important;
}
p {
  margin: 15px auto;
  border-radius: 15px;
  background: #D32F2F;
  color: #fff;
  padding: 15px;
  text-align: center;
  font-weight: 700;
  font-family: arial;
  position: relative;
  word-wrap: break-word;
  z-index: 10;
}
p:before{
content: "";
  width: 0px;
  height: 0px;
  position: absolute;
  border-left: 15px solid #D32F2F;
  border-right: 15px solid transparent;
  border-top: 15px solid #D32F2F;
  border-bottom: 15px solid transparent;
  right: -16px;
  top: 0px;
  z-index: 9;
}
</style>
<script>
var j = 1;
function unblur() {
j = 1;
while (j <= <?php echo"$i";?>){
var blurred = document.getElementById(j)
if (!blurred.classList.contains('blur')){
blurred.classList.add("blur");
j++;
}else{
blurred.classList.remove("blur");
j++;
}
}
}
</script>