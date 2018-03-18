<html>
<head><title>TextPaste</title></head>
<body>
  <h1>TextPaste: A simple way to create and share .txt files. Coded by internetperson.</h1>

<form method="post" action="">
       <TEXTAREA name="typed" rows="20" cols="80" value="<?= isset($_POST['typed']) ? htmlspecialchars($_POST['typed']) : '' ?>" >
   
   </TEXTAREA> // thanks to @nekofurball for fixing this for me!
    
<input type="submit" value="Paste!" />
  </form>

<?php
$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789');
shuffle($seed);
$rand = '';
foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
if(isset($_POST['typed'])) {
  $my_file = $rand.'.txt';
  $handle = fopen($my_file, 'w') or die('Cannot open file: '.$my_file);
  $txt = htmlspecialchars($_POST['paste']);
  fwrite($handle, $txt);
  echo 'https://ip1000.ml/textpaste/'.$my_file.' - Latest file you created.';
}
?>

