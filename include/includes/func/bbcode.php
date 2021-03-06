<?php
/**
 * BBCode Modul laden
 */
defined('main') or die('no direct access');

/**
 * Erstellt Farben f�r die getBBCodeButtons Funktion
 * 
 * @param array $ar
 * @return string
 */
function getBBCodeColorlist($ar) {
    $l = '';
    foreach ($ar as $k => $v) {
        $l .= '<td width="10" style="background-color: ' . $k . ';"><a href="javascript:bbcode_code_insert(\'color\',\'' . $k . '\'); hide_color();"><img src="include/images/icons/bbcode/transparent.gif" border="0" height="10" width="10" alt="' . $v . '" title="' . $v . '"></td>';
    }
    return ($l);
}

/**
 * Konfiguration des BBCode laden und vorhalten
 * 
 * @staticvar array $config
 * @return array BBCode Konfigarray mit den Subkeys info, permitted, boolButton, cfgInfo
 */
function getBBCodeConfig() {
    static $config = null;
    if ($config === null) {
        include 'include/includes/bbcode_config.php';
        $config = array(
            'info' => $info,
            'permitted' => $permitted,
            'boolButton' => $boolButton,
            'cfgInfo' => $objConfig
        );
    }
    return $config;
}

/**
 * Setzte BBCoodeButtons String wie konfiguriert zusammen
 * 
 * @global string $ILCH_BODYEND_ADDITIONS
 * @staticvar string $BBCodeButtons
 * @return string
 */
function getBBCodeButtons() {
    static $BBCodeButtons = null;
    global $ILCH_BODYEND_ADDITIONS;
    $config = getBBCodeConfig();
    $cfgInfo = $config['cfgInfo'];
    $boolButton = $config['boolButton'];

    if ($BBCodeButtons !== null) {
        return $BBCodeButtons;
    }
    
    $ILCH_BODYEND_ADDITIONS .= '<script type="text/javascript" src="include/includes/js/interface.js"></script>';
    
    $BBCodeButtons = '';
    //> Schriftfarbeauswahlcontainer
    if ($boolButton['fnFormatColor'] == 1) {
        $colorar = array('#FF0000' => 'red', '#FFFF00' => 'yellow', '#008000' => 'green', '#00FF00' => 'lime', '#008080' => 'teal', '#808000' => 'olive', '#0000FF' => 'blue', '#00FFFF' => 'aqua', '#000080' => 'navy', '#800080' => 'purple', '#FF00FF' => 'fuchsia', '#800000' => 'maroon', '#C0C0C0' => 'grey', '#808080' => 'silver', '#000000' => 'black', '#FFFFFF' => 'white',);
        $BBCodeButtons .= '<div style="position:absolute;"><div style="display:none; position:relative; top:-30px; left:100px; width:200px; z-index:100;" id="colorinput">
			<table width="100%" class="border" border="0" cellspacing="1" cellpadding="0">
				<tr class="Chead" onclick="javascript:hide_color();"><td colspan="16"><b>Farbe w�hlen</b></td></tr>
				<tr class="Cmite" height="15">' . getBBCodeColorlist($colorar) . '</tr></table>
			</div></div>';
    }

    //> Fett Button!
    if ($boolButton['fnFormatB'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert('b','Gib hier den Text an der fett formatiert werden soll.')\"><img src=\"include/images/icons/bbcode/bbcode_bold.png\" alt=\"Fett formatieren\" title=\"Fett formatieren\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Kursiv Button!
    if ($boolButton['fnFormatI'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert('i','Gib hier den Text an der kursiv formatiert werden soll.')\"><img src=\"include/images/icons/bbcode/bbcode_italic.png\" alt=\"Kursiv formatieren\" title=\"Kursiv formatieren\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Unterschrieben Button!
    if ($boolButton['fnFormatU'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert('u','Gib hier den Text an der unterstrichen formatiert werden soll.')\"><img src=\"include/images/icons/bbcode/bbcode_underline.png\" alt=\"Unterstrichen formatieren\" title=\"Unterstrichen formatieren\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Durchgestrichener Button!
    if ($boolButton['fnFormatS'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert('s','Gib hier den Text an der durchgestrichen formatiert werden soll..')\"><img src=\"include/images/icons/bbcode/bbcode_strike.png\" alt=\"Durchgestrichen formatieren\" title=\"Durchgestrichen formatieren\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Leerzeichen?
    if ($boolButton['fnFormatB'] == 1 || $boolButton['fnFormatI'] == 1 || $boolButton['fnFormatU'] == 1 || $boolButton['fnFormatS'] == 1) {
        $BBCodeButtons .= "&nbsp;";
    }

    //> Links Button!
    if ($boolButton['fnFormatLeft'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_code_insert('left','0')\"><img src=\"include/images/icons/bbcode/bbcode_left.png\" alt=\"Links ausrichten\" title=\"Links ausrichten\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Zentriert Button!
    if ($boolButton['fnFormatCenter'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_code_insert('center','0')\"><img src=\"include/images/icons/bbcode/bbcode_center.png\" alt=\"Mittig ausrichten\" title=\"Mittig ausrichten\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Rechts Button!
    if ($boolButton['fnFormatRight'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_code_insert('right','0')\"><img src=\"include/images/icons/bbcode/bbcode_right.png\" alt=\"Rechts ausrichten\" title=\"Rechts ausrichten\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Leerzeichen?
    if ($boolButton['fnFormatLeft'] == 1 || $boolButton['fnFormatCenter'] == 1 || $boolButton['fnFormatRight'] == 1) {
        $BBCodeButtons .= "&nbsp;";
    }

    //> Listen Button!
    if ($boolButton['fnFormatList'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert('list','Gib hier den Text ein der aufgelistet werden soll.\\nUm die liste zu beenden einfach auf Abbrechen klicken.')\"><img src=\"include/images/icons/bbcode/bbcode_list.png\" alt=\"Liste erzeugen\" title=\"Liste erzeugen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Hervorheben Button!
    if ($boolButton['fnFormatEmph'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_code_insert('emph','0')\"><img src=\"include/images/icons/bbcode/bbcode_emph.png\" alt=\"Text hervorheben\" title=\"Text hervorheben\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Schriftfarbe Button!
    if ($boolButton['fnFormatColor'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:hide_color();\"><img id=\"bbcode_color_button\" src=\"include/images/icons/bbcode/bbcode_color.png\" alt=\"Text f&auml;rben\" title=\"Text f&auml;rben\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Schriftgr��e Button!
    if ($boolButton['fnFormatSize'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert_with_value('size','Gib hier den Text an, der in einer anderen Schriftgr&ouml;�e formatiert werden soll.','Gib hier die Gr&ouml;&szlig;e des textes in Pixel an. \\n Pixellimit liegt bei " . $cfgInfo['fnSizeMax'] . "px !!!')\"><img src=\"include/images/icons/bbcode/bbcode_size.png\" alt=\"Textgr&ouml;&szlig;e ver&auml;ndern\" title=\"Textgr&ouml;&szlig;e ver&auml;ndern\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Leerzeichen?
    if ($boolButton['fnFormatList'] == 1 || $boolButton['fnFormatEmph'] == 1 || $boolButton['fnFormatColor'] == 1 || $boolButton['fnFormatSize'] == 1) {
        $BBCodeButtons .= "&nbsp;";
    }

    //> Url Button!
    if ($boolButton['fnFormatUrl'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert_with_value('url','Gib hier die Beschreibung f�r den Link an.','Gib hier die Adresse zu welcher verlinkt werden soll an.')\"><img src=\"include/images/icons/bbcode/bbcode_url.png\" alt=\"Hyperlink einf&uuml;gen\" title=\"Hyperlink einf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> E-Mail Button!
    if ($boolButton['fnFormatEmail'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert_with_value('mail','Gib hier den namen des links an.','Gib hier die eMail - Adresse an.')\"><img src=\"include/images/icons/bbcode/bbcode_email.png\" alt=\"eMail hinzuf&uuml;gen\" title=\"eMail hinzuf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Leerzeichen?
    if ($boolButton['fnFormatUrl'] == 1 || $boolButton['fnFormatEmail'] == 1) {
        $BBCodeButtons .= "&nbsp;";
    }

    //> Bild Button!
    if ($boolButton['fnFormatImg'] == 1) {
        $infoText = 'Hinweise: Die Breite und H&ouml;he des Bildes ist auf '
            . $cfgInfo['fnImgMaxBreite'] . 'x' . $cfgInfo['fnImgMaxHoehe']
            . ' eingeschr&auml;nkt und w&uuml;rde verkleinert dargstellt werden.\\n\\n'
            . 'Die Darstellung des Bildes kann �ber Parameter angepasst werden, die �ber [img=params]url[/img] angegebene werden k�nnen,\\n'
            . 'wobei die einzelnen Parameter mit Semikolon ( ; ) voneinander getrennt werden.\\n'
            . 'M�gliche Parameter:\\n    1. left oder right: Bild innerhalb des Texts flie�en lassem, left|right ist dabei die Position des Bildes\\n'
            . '    2. Breite und H�he des Bilder, als Zahl nachgestellt mit w f�r Breite und h f�r H�he, w ist optional, wenn es die einzige Angabe ist\\n'
            . 'Beispiel: [img=right,300w,200h]http://path/to/image.png[/img]\\n\\n'
            . 'Gib hier (nur) die Adresse des Bildes an:\\n';
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert('img','{$infoText}')\"><img src=\"include/images/icons/bbcode/bbcode_image.png\" alt=\"Bild einf&uuml;gen\" title=\"Bild einf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Screenshot Button!
    if ($boolButton['fnFormatScreen'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert('shot','Gib hier die Adresse des Screens an.\\nDie Breite und H&ouml;he des Bildes ist auf " . $cfgInfo['fnScreenMaxBreite'] . "x" . $cfgInfo['fnScreenMaxHoehe'] . " eingeschr�nkt und wird verkleinert dargstellt.\\nEs ist m�glich ein Screenshot rechts oder links von anderen Elementen darzustellen, indem man [shot=left] oder [shot=right] benutzt.')\"><img src=\"include/images/icons/bbcode/bbcode_screenshot.png\" alt=\"Bild einf&uuml;gen\" title=\"Screen einf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Leerzeichen?
    if ($boolButton['fnFormatImg'] == 1 || $boolButton['fnFormatScreen'] == 1) {
        $BBCodeButtons .= "&nbsp;";
    }

    //> Quote Button!
    if ($boolButton['fnFormatQuote'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_code_insert('quote','0')\"><img src=\"include/images/icons/bbcode/bbcode_quote.png\" alt=\"Zitat einf&uuml;gen\" title=\"Zitat einf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Klapptext Button!
    if ($boolButton['fnFormatKtext'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert_with_value('ktext','Gib hier den zu verbergenden Text ein.','Gib hier einen Titel f&uuml;r den Klapptext an.')\"><img src=\"include/images/icons/bbcode/bbcode_ktext.png\" alt=\"Klappfunktion hinzuf&uuml;gen\" title=\"Klappfunktion hinzuf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Video Button!
    if ($boolButton['fnFormatVideo'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert_with_value_2('video','Gib hier die Video ID vom Anbieter an.','Bitte Anbieter ausw&auml;hlen.\\nAkzeptiert werden: Google, YouTube, MyVideo und GameTrailers')\"><img src=\"include/images/icons/bbcode/bbcode_video.png\" alt=\"Video einf&uuml;gen\" title=\"Video einf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Flash Button!
    if ($boolButton['fnFormatFlash'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert_with_multiple_values('flash',{tag:['Gib hier den Link zur Flashdatei an',''],width:['Gib hier die Breite f�r die Flashdatei an','400'],height:['Gib hier die H�he f�r die Flashdatei an','300']})\"><img src=\"include/images/icons/bbcode/bbcode_flash.png\" alt=\"Flash einf&uuml;gen\" title=\"Flash einf&uuml;gen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Countdown Button!
    if ($boolButton['fnFormatCountdown'] == 1) {
        $BBCodeButtons .= "<a href=\"javascript:bbcode_insert_with_value('countdown','Gib hier das Datum an wann das Ereignis beginnt.\\n Format: TT.MM.JJJJ Bsp: 24.12." . date("Y") . "','Gib hier eine Zeit an, wann das Ergeinis am Ereignis- Tag beginnt.\\nFormat: Std:Min:Sek Bsp: 20:15:00')\"><img src=\"include/images/icons/bbcode/bbcode_countdown.png\" alt=\"Countdown festlegen\" title=\"Countdown festlegen\" width=\"23\" height=\"22\" border=\"0\"></a> ";
    }

    //> Leerzeichen?
    if ($boolButton['fnFormatQuote'] == 1 || $boolButton['fnFormatKtext'] == 1 || $boolButton['fnFormatVideo'] == 1 || $boolButton['fnFormatFlash'] == 1 || $boolButton['fnFormatCountdown'] == 1) {
        $BBCodeButtons .= "&nbsp;";
    }

    //> Code Dropdown!
    if ($boolButton['fnFormatCode'] == 1 || $boolButton['fnFormatPhp'] == 1 || $boolButton['fnFormatHtml'] == 1 || $boolButton['fnFormatCss'] == 1) {
        $BBCodeButtons .= "<select onChange=\"javascript:bbcode_code_insert_codes(this.value); javascript:this.value='0';\" style=\"font-family:Verdana;font-size:10px; margin-bottom:6px; z-index:0;\" name=\"code\"><option value=\"0\">Code einf&uuml;gen</option>";
    }

    if ($boolButton['fnFormatPhp'] == 1) {
        $BBCodeButtons .= "<option value=\"php\">PHP</option>";
    }

    if ($boolButton['fnFormatHtml'] == 1) {
        $BBCodeButtons .= "<option value=\"html\">HTML</option>";
    }

    if ($boolButton['fnFormatCss'] == 1) {
        $BBCodeButtons .= "<option value=\"css\">CSS</option>";
    }

    if ($boolButton['fnFormatCode'] == 1) {
        $BBCodeButtons .= "<option value=\"code\">Sonstiger Code</option>";
    }

    if ($boolButton['fnFormatCode'] == 1 || $boolButton['fnFormatPhp'] == 1 || $boolButton['fnFormatHtml'] == 1 || $boolButton['fnFormatCss'] == 1) {
        $BBCodeButtons .= "</select>";
    }

    return $BBCodeButtons;
}

/**
 * Wandelt bbcode-formatierten Text zu HTML-Code um
 * 
 * @global string $ILCH_BODYEND_ADDITIONS
 * @staticvar array $smilesArray
 * @staticvar boolean $bbcodeJsLoaded
 * @param string $s bbcode formatierter Test
 * @param integer $maxLength
 * @param integer $maxImgWidth
 * @param integer $maxImgHeight
 * @return string generierter HTML-Code
 */
function BBcode($s, $maxLength = 0, $maxImgWidth = 0, $maxImgHeight = 0) {
    global $ILCH_BODYEND_ADDITIONS;
    static $smilesArray = null, $bbcodeJsLoaded = false;
    $config = getBBCodeConfig();

    //Javascript f�r BBCode laden
    if ($bbcodeJsLoaded !== true) {
        $ILCH_BODYEND_ADDITIONS .= '<script type="text/javascript" src="include/includes/js/BBCodeGlobal.js"></script>'
            . '<script type="text/javascript">var bbcodemaximagewidth = ' . $config['info']['ImgMaxBreite']
            . ', bbcodemaximageheight = ' . $config['info']['ImgMaxHoehe'] . ';</script>';
        $bbcodeJsLoaded = true;
        
        //Klasse laden
        require_once 'include/includes/class/bbcode.php';
    }
    
    //> Smilies in array abspeichern.
    if (empty($smilesArray)) {
        $smilesArray = array();
        $erg = db_query("SELECT ent, url, emo FROM `prefix_smilies`");
        while ($row = db_fetch_object($erg)) {
            $smilesArray[$row->ent] = $row->emo . '#@#-_-_-#@#' . $row->url;
        }
    }

    $bbcode = new bbcode();
    $bbcode->smileys = $smilesArray;
    $bbcode->permitted = $config['permitted'];
    $bbcode->info = $config['info'];

    if ($maxLength != 0) {
        $bbcode->info['fnWortMaxLaenge'] = $maxLength;
    }
    if ($maxImgWidth != 0) {
        $bbcode->info['fnImgMaxBreite'] = $maxImgWidth;
    }
    if ($maxImgHeight != 0) {
        $bbcode->info['fnImgMaxBreite'] = $maxImgHeight;
    }

    return $bbcode->parse($s);
}