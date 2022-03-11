<?php

require_once "../classes/Security.php";




var_dump(Security::checkCommentOwnerShip(38, 3));


var_dump(Security::checkPostOwnerShip(6, 3));