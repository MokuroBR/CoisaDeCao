<?php

if (mail ('andre@luferat.net', 'teste', 'Somente um teste')) {
	echo 'foi';
} else {
	echo 'não foi';
}

?>