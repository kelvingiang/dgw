<?php

require_once (DIR_CONTROLER . 'controler.php');
new Controler_Main();

require_once (DIR_METABOX . 'metabox.php');
new Metabox_Main();

require_once (DIR_TAXONOMY . 'taxonomy.php');
new Taxonomy_Main();
