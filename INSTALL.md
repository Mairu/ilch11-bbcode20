# BBCode 2.0 Installationsanleitung für Ilch 1.1O
Installationsanleitung für BBCode 2.0 Modul für Ilchclan 1.1

## Anleitung, wenn BBCode direkt nach der Ilchinstallation vorgenommen wird (ohne Module)
1. Lade den kompletten Inhalt des upload Ordners auf deinen Webspace
2. Führe die bbcode\_install.php aus und lösche sie wieder (www.deineseite.de/bbcode\_install.php)

## Anleitung, wenn schon Module installiert wurde
1.  Lade die bbcode\_install.php auf deinen Webspace und führe sie aus und lösche sie wieder (im Browser
    www.deineseite.de/bbcode\_install.php aufrufen)
2.  Wenn du keine Module hast, die an den folgenden Dateien etwas ändern
    * include/templates/gbook.htm
  	* include/templates/forum/newpost.htm
  	* include/templates/forum/editpost.htm
  	* include/templates/forum/newtopic.htm
  	* include/templates/forum/pm/new.htm
  	* include/admin/templates/news.htm
    
	dann kannst du die Dateien einfach aus dem upload Ordner hochladen, ansonsten sollte in jeder der Dateien folgender
	Code zu finden sein
  
	    <!-- BB Code START -->
	      
	    <a href="javascript:simple('b')"><img style="padding-left: 4%; float: left;" src="include/images/icons/button.bold.gif" alt="b" title="{_lang_bold}" border="0"></a>
	    <a href="javascript:simple('i')"><img style="padding-left: 4%; float: left;" src="include/images/icons/button.italic.gif" alt="i" title="{_lang_italic}" border="0"></a>
	    <a href="javascript:simple('u')"><img style="padding-left: 4%; float: left;" src="include/images/icons/button.underline.gif" alt="u" title="{_lang_underlined}" border="0"></a>
	    <a href="javascript:simple('code')"><img style="padding-left: 4%; float: left;" src="include/images/icons/button.code.gif" alt="Code" title="{_lang_code}" border="0"></a>
	    <a href="javascript:simple_liste()"><img style="padding-left: 4%; float: left;" src="include/images/icons/button.insertunorderedlist.gif" alt="{_lang_list}" title="{_lang_list}" border="0"></a>
	    <a href="javascript:simple('url')"><img style="padding-left: 4%; float: left;" src="include/images/icons/button.link.gif" alt="Url" title="{_lang_link}" border="0"></a>
	    <a href="javascript:simple('img')"><img style="padding-left: 4%; float: left;" src="include/images/icons/button.image.gif" alt="{_lang_picture}" title="{_lang_picture}" border="0"></a>
	         
	     	<!-- BB Code START -->

	dieser muss dann einfach folgendes ersetzt werden

		<!-- BB Code START -->{__BBCodeButtons__}<!-- BB Code START -->

3.  Die restlichen Dateien sollte man einfach hochladen können, da sie durch andere Module eigentlich nicht geändert
	werden.