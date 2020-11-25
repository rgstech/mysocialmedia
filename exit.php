<?php

require_once 'classes/Session.php';

Session::start();

Session::free();

header('Location: login.php');