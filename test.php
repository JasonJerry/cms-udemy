<?php
echo password_hash('secret', PASSWORD_DEFAULT, array('cost' => 10)) // bigger the cost number slower the algo work

?>