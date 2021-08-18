<?php




function afficheMsg(){
echo '<div class="message warning">';
echo $_SESSION['msg'];
echo '</div>';

unset($_SESSION['msg']);


}

?>