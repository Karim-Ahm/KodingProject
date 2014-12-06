<?php
if(isset($_POST['text']))
     print_r($_POST);
     
else {
     echo '<form method="POST"><input type="text" name="text"></form>';
}
