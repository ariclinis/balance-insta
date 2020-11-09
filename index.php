<?php

require_once('Balance.php');

$b = new Balance('ariclinis','pass');

echo $b->getUserFollowers();

