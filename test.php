<?php
// echo password_hash('secret', PASSWORD_DEFAULT, array('cost'=>10));
echo password_hash('secret', PASSWORD_BCRYPT, array('cost'=>10));
?>