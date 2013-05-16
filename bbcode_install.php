<?php
#   Copyright by Thomas Bowe [Funjoy]
#   ilch.de
#   maintained by Mairu

define ( 'main' , TRUE );
require_once ('include/includes/config.php');
require_once ('include/includes/func/db/mysql.php');

db_connect();

$tables = array();
$sql = db_query("SHOW TABLES LIKE 'prefix_bbcode_%'");
while ($row = db_fetch_row($sql)) {
    $tables[] = str_replace(DBPREF.'bbcode_','',$row[0]);
}

$sql_statements = array();
//> Badwordlist
if (!in_array('badword', $tables)) {
    $sql_statements[] = "CREATE TABLE `prefix_bbcode_badword` (`fnBadwordNr` int(10) unsigned NOT NULL auto_increment,`fcBadPatter` varchar(70) NOT NULL default '',`fcBadReplace` varchar(70) NOT NULL default '',PRIMARY KEY  (`fnBadwordNr`))";
    $sql_statements[] = "INSERT INTO `prefix_bbcode_badword` (`fcBadPatter`,`fcBadReplace`) VALUES ('Idiot', '*peep*')";
    $sql_statements[] = "INSERT INTO `prefix_bbcode_badword` (`fcBadPatter`,`fcBadReplace`) VALUES ('Arschloch', '*peep*')";
}

if (!in_array('buttons', $tables)) {
//> BBCode Buttons
$sql_statements[] = "CREATE TABLE
			`prefix_bbcode_buttons`
				(`fnButtonNr` int(10) unsigned NOT NULL auto_increment,
				 `fnFormatB` tinyint(1) unsigned NOT NULL default '1',
				 `fnFormatI` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatU` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatS` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatEmph` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatColor` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatSize` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatUrl` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatUrlAuto` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatEmail` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatLeft` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatCenter` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatRight` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatSmilies` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatList` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatKtext` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatImg` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatScreen` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatVideo` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatPhp` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatCss` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatHtml` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatCode` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatQuote` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatCountdown` tinyint(1) unsigned NOT NULL default '0',
				 `fnFormatFlash` tinyint(1) unsigned NOT NULL default '0',
				 PRIMARY KEY  (`fnButtonNr`)
				)";

$sql_statements[] = "INSERT INTO `prefix_bbcode_buttons` (`fnButtonNr`, `fnFormatB`, `fnFormatI`, `fnFormatU`, `fnFormatS`, `fnFormatEmph`, `fnFormatColor`, `fnFormatSize`, `fnFormatUrl`, `fnFormatUrlAuto`, `fnFormatEmail`, `fnFormatLeft`, `fnFormatCenter`, `fnFormatRight`, `fnFormatSmilies`, `fnFormatList`, `fnFormatKtext`, `fnFormatImg`, `fnFormatScreen`, `fnFormatVideo`, `fnFormatPhp`, `fnFormatCss`, `fnFormatHtml`, `fnFormatCode`, `fnFormatQuote`, `fnFormatCountdown`) VALUES (1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1)";
}

if (!in_array('config', $tables)) {
//> BBcode Konfiguration
$sql_statements[] = "CREATE TABLE
				`prefix_bbcode_config`
					(`fnConfigNr` int(10) unsigned NOT NULL auto_increment,
					 `fnYoutubeBreite` smallint(3) unsigned NOT NULL default '0',
					 `fnYoutubeHoehe` smallint(3) unsigned NOT NULL default '0',
					 `fcYoutubeHintergrundfarbe` varchar(7) NOT NULL default '',
					 `fnGoogleBreite` smallint(3) unsigned NOT NULL default '0',
					 `fnGoogleHoehe` smallint(3) unsigned NOT NULL default '0',
					 `fcGoogleHintergrundfarbe` varchar(7) NOT NULL default '',
					 `fnMyvideoBreite` smallint(3) unsigned NOT NULL default '0',
					 `fnMyvideoHoehe` smallint(3) unsigned NOT NULL default '0',
					 `fcMyvideoHintergrundfarbe` varchar(7) NOT NULL default '',
					 `fnSizeMax` tinyint(2) unsigned NOT NULL default '0',
					 `fnImgMaxBreite` smallint(3) unsigned NOT NULL default '0',
					 `fnImgMaxHoehe` smallint(3) unsigned NOT NULL default '0',
					 `fnScreenMaxBreite` smallint(3) unsigned NOT NULL default '0',
					 `fnScreenMaxHoehe` smallint(3) unsigned NOT NULL default '0',
					 `fnUrlMaxLaenge` smallint(3) unsigned NOT NULL default '0',
					 `fnWortMaxLaenge` smallint(3) unsigned NOT NULL default '0',
					 `fnFlashBreite` smallint(3) unsigned NOT NULL default '0',
					 `fnFlashHoehe` smallint(3) unsigned NOT NULL default '0',
					 `fcFlashHintergrundfarbe` varchar(7) NOT NULL default '',
					 PRIMARY KEY  (`fnConfigNr`)
					)";
$sql_statements[] = "INSERT INTO `prefix_bbcode_config` (`fnConfigNr`, `fnYoutubeBreite`, `fnYoutubeHoehe`, `fcYoutubeHintergrundfarbe`, `fnGoogleBreite`, `fnGoogleHoehe`, `fcGoogleHintergrundfarbe`, `fnMyvideoBreite`, `fnMyvideoHoehe`, `fcMyvideoHintergrundfarbe`, `fnSizeMax`, `fnImgMaxBreite`, `fnImgMaxHoehe`, `fnScreenMaxBreite`, `fnScreenMaxHoehe`, `fnUrlMaxLaenge`, `fnWortMaxLaenge`, `fnFlashBreite`, `fnFlashHoehe`, `fcFlashHintergrundfarbe`) VALUES (1, 425, 350, '#000000', 400, 326, '#ffffff', 470, 406, '#ffffff', 20, 500, 500, 150, 150, 60, 70, 400, 300, '#ffffff')";
}

if (!in_array('design', $tables)) {
//> BBCode Design
$sql_statements[] = "CREATE TABLE
				`prefix_bbcode_design`
					(`fnDesignNr` int(10) unsigned NOT NULL auto_increment,
					 `fcQuoteRandFarbe` varchar(7) NOT NULL default '',
					 `fcQuoteTabelleBreite` varchar(7) NOT NULL default '',
					 `fcQuoteSchriftfarbe` varchar(7) NOT NULL default '',
					 `fcQuoteHintergrundfarbe` varchar(7) NOT NULL default '',
					 `fcQuoteHintergrundfarbeIT` varchar(7) NOT NULL default '',
					 `fcQuoteSchriftformatIT` varchar(6) NOT NULL default '',
					 `fcQuoteSchriftfarbeIT` varchar(7) NOT NULL default '',
					 `fcBlockRandFarbe` varchar(7) NOT NULL default '',
					 `fcBlockTabelleBreite` varchar(7) NOT NULL default '',
					 `fcBlockSchriftfarbe` varchar(7) NOT NULL default '',
					 `fcBlockHintergrundfarbe` varchar(7) NOT NULL default '',
					 `fcBlockHintergrundfarbeIT` varchar(7) NOT NULL default '',
					 `fcBlockSchriftfarbeIT` varchar(7) NOT NULL default '',
					 `fcKtextRandFarbe` varchar(7) NOT NULL default '',
					 `fcKtextTabelleBreite` varchar(7) NOT NULL default '',
					 `fcKtextRandFormat` varchar(6) NOT NULL default '',
					 `fcEmphHintergrundfarbe` varchar(7) NOT NULL default '',
					 `fcEmphSchriftfarbe` varchar(7) NOT NULL default '',
					 `fcCountdownRandFarbe` varchar(7) NOT NULL default '',
					 `fcCountdownTabelleBreite` varchar(7) NOT NULL default '',
					 `fcCountdownSchriftfarbe` varchar(7) NOT NULL default '',
					 `fcCountdownSchriftformat` varchar(7) NOT NULL default '',
					 `fnCountdownSchriftsize` smallint(2) unsigned NOT NULL default '0',
					 PRIMARY KEY  (`fnDesignNr`)
					)";

$sql_statements[] = "INSERT INTO `prefix_bbcode_design` (`fnDesignNr`, `fcQuoteRandFarbe`, `fcQuoteTabelleBreite`, `fcQuoteSchriftfarbe`, `fcQuoteHintergrundfarbe`, `fcQuoteHintergrundfarbeIT`, `fcQuoteSchriftformatIT`, `fcQuoteSchriftfarbeIT`, `fcBlockRandFarbe`, `fcBlockTabelleBreite`, `fcBlockSchriftfarbe`, `fcBlockHintergrundfarbe`, `fcBlockHintergrundfarbeIT`, `fcBlockSchriftfarbeIT`, `fcKtextRandFarbe`, `fcKtextTabelleBreite`, `fcKtextRandFormat`, `fcEmphHintergrundfarbe`, `fcEmphSchriftfarbe`, `fcCountdownRandFarbe`, `fcCountdownTabelleBreite`, `fcCountdownSchriftfarbe`, `fcCountdownSchriftformat`, `fnCountdownSchriftsize`) VALUES (1, '#f6e79d', '320', '#666666', '#f6e79d', '#faf7e8', 'italic', '#666666', '#f6e79d', '350', '#666666', '#f6e79d', '#faf7e8', '#FF0000', '#000000', '90%', 'dotted', '#ffd500', '#000000', '#FF0000', '90%', '#FF0000', 'bold', 10)";
}

//Update
if (empty($sql_statements)) {
    //config
    $fields = array();
    $fields2add = array(
		'fnFlashBreite'	=> 'ADD `fnFlashBreite` smallint(3) unsigned NOT NULL default \'0\'',
		'fnFlashHoehe' => 'ADD `fnFlashHoehe` smallint(3) unsigned NOT NULL default \'0\'',
		'fcFlashHintergrundfarbe' => 'ADD `fcFlashHintergrundfarbe` varchar(7) NOT NULL default \'0\''
    );
    $standardvalues = array(
	    'fnFlashBreite'	=> '400',
		'fnFlashHoehe' => '300',
		'fcFlashHintergrundfarbe' => '\'#ffffff\''

    );
    $r = db_query("SHOW FULL COLUMNS FROM `prefix_bbcode_config`");
    while ($a = db_fetch_assoc($r)) {
        $fields[] = $a['Field'];
    }

    foreach ($fields2add as $k => $v) {
        if (in_array($k, $fields)) {
            unset($fields2add[$k]);
            unset($standardvalues[$k]);
        }
    }

    if (count($fields2add) > 0) {
        $sql_statements[] = "ALTER TABLE `prefix_bbcode_config` ".implode(', ', $fields2add);
        $tmp = array();
        foreach ($standardvalues as $k => $v) $tmp[] = "`$k` = $v";
        $sql_statements[] = "UPDATE `prefix_bbcode_config` SET ".implode(', ', $tmp)." WHERE `fnConfigNr` = 1";
        unset($tmp);
    }
    //config ende

    //buttons
    $fields = array();
    $fields2add = array(
		'fnFormatFlash'	=> 'ADD `fnFormatFlash` tinyint(1) unsigned NOT NULL default \'0\'',
    );
    $standardvalues = array(
	    'fnFormatFlash'	=> '0',
    );
    $r = db_query("SHOW FULL COLUMNS FROM `prefix_bbcode_buttons`");
    while ($a = db_fetch_assoc($r)) {
        $fields[] = $a['Field'];
    }

    foreach ($fields2add as $k => $v) {
        if (in_array($k, $fields)) {
            unset($fields2add[$k]);
            unset($standardvalues[$k]);
        }
    }

    if (count($fields2add) > 0) {
        $sql_statements[] = "ALTER TABLE `prefix_bbcode_buttons` ".implode(', ', $fields2add);
        $tmp = array();
        foreach ($standardvalues as $k => $v) $tmp[] = "`$k` = $v";
        $sql_statements[] = "UPDATE `prefix_bbcode_buttons` SET ".implode(', ', $tmp)." WHERE `fnButtonNr` = 1";
        unset($tmp);
    }
    //buttons ende
}

if (db_count_query('SELECT COUNT(*) FROM `prefix_modules` WHERE `url` = "bbcode"') == 0) {
  $sql_statements[] = "INSERT INTO `prefix_modules` (`id` ,`url` ,`name` ,`gshow` ,`ashow` ,`fright`) VALUES (NULL , 'bbcode', 'BBCode 2.0', '1', '1', '0')";
}

foreach ( $sql_statements as $sql_statement ) {
  if ( trim($sql_statement) != '' ) {
    echo '<pre>'.$sql_statement.'</pre>';
    $e = db_query($sql_statement);
    if (!$e) { echo '<font color="#FF0000"><b>Es ist ein Fehler aufgetreten</b></font>, bitte alles auf dieser Seite kopieren und auf ilch.de im Forum fragen...:<div style="border: 1px dashed grey; padding: 5px; background-color: #EEEEEE">'. mysql_error().'<hr>'.$sql_statement.'</div><br /><b>Es sei denn,</b> es ist ein Fehler mit <i>duplicate entry</i> aufgetreten, das liegt einfach nur daran, dass du die Installdatei mehrmals ausgeführt hast.<br />'; }
    echo '<hr>';
	}
}

echo "Tabellen wurden erfolgreich angelegt.<br> Bitte die Datei Löschen !!!";
db_close();
?>