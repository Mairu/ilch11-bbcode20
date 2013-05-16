# BBCode 2.0 Modul für ilchClan 1.1

Das Modul ersetzt den integrierten BBCode, mit mehr Funktionen.

## Entwickelt
- von **Funjoy**
- Anpassungen und Bufixes von **Mairu** unter Beihilfe von **boehserdavid**
- auf Basis von IlchClan 1.1 K (funktioniert nicht mit älteren Versionen)

## Für Updater von alten Versionen vor 1.1I
 Folgende Dateien werden nicht mehr vom Modul geändert und sollten wenn möglich
 mit den Standarddateien ersetzt werden, soweit noch nicht durch das Update auf I geschehen

- include/admin/admin.php
- include/boxes/adminmenu.php
- include/includes/loader.php (hier ggf. die beiden Zeilen löschen die wegen dem Modul eingetragen worden)
 
## Installation
- Im Normalfall können alle Dateien überschrieben werden, es könnte aber sein,
  dass sich dann einige Module nicht mit dem BBCode vertragen, dies betrifft die Dateien
  - include/admin/templates/news.htm
  - include/templates/gbook.htm
  - include/templates/forum/newpost.htm
  - include/templates/forum/newtopic.htm
  - include/templates/forum/postedit.htm
  - include/templates/forum/pm/new.htm
  Informationen dazu kannst du in der install.html finden
- nach dem Upload der Dateien bbcode\_install.php aufrufen (http://www.deineseite.de/bbcode\_install.php)
  und nach erfolgreichen Ausführen dann löschen
- Optionen im Adminmenü einrichten und fertig

## Changelog
- vom 17.19.2011
  - Farbauswahlpositionierung verändert, so dass es für kein Design Positionierungsprobleme geben sollte
- vom 04.09.2010
  - Links innerhalb von [size] Tags sollten nun funktionieren
- vom 01.05.2010
  - Umlaute in Links werden wieder richtig dargestellt
- vom 19.04.2010 (1.1O)
 - # in Links werden wieder richtig interpretiert
- vom 21.03.2010
  - Shortwords angepasst, damit Flash auch mit Parameterangabe nicht gekürzt wird und dadurch nicht funktioniert
- vom 14.11.2009
  - kleine Sachen geändert, Badwordfilter für Umlaute, Noticefehler entfernt
- vom 28.10.2009
 - [url=http://...][color=...]... funktioniert wieder
 - Standardtexte bei url und Schriftgröße wieder hinzugefügt
- vom 11.10.2009 (für 1.1N)
  - Smileys werden anders erkannt, damit sie nicht andere Elemente zerstören, dafür muss von einem Smiley nun ein Leerzeichen kommen
  - Flash nun mit Angabe von Höhe und Breite
  - Handhabung der Buttons etwas angepasst
  - PHP Code wird auch ohne <?(php) und ?> formatiert
- vom 01.03.2009
  - Fehler bei kurzer maximaler Wortlänge mit Countdown und Liste behoben
- vom 21.07.2008
  - Fehler mit der Anzeige des Flash-Buttons behoben
  - Fehler in Installationsdatei behoben
- vom 12.07.2008
  - Fehler mit zu breiten Codecontainern behoben
  - Fehler mit langen Dateinamen für Codecontainern behoben
  - Fehler mit Emailadressen behoben
  - rudimentäre Flashunterstützung (standardmäßig deaktiviert)
  - bbcode\_install.php und bbcode\_update.php zusammengefasst, also einfach nur noch bbcode\_install.php aufrufen
- vom 11.01.2008
  - Fehler wenn man alle Codes deaktiviert hatte und dann ein Quote oder Farbe einfügen wollte (interface.js)
- vom 09.01.2008
  - Fehler im Klapptext behoben, es wurden keine Umlaute um Titel unterstützt (class/bbcode.php)
- vom 20.12.2007 (für I)
  - Anpassung an Version I des Clanscriptes und damit große Vereinfachung und der Installation und
  Reduzierung von Inkompatibilitäten mit anderen Modulen
  - kleine Fehler beseitig
- vom 09.08.2007
  - Bilder die verkleinert dargestellt werden, sind nun mit dem Original verlinkt (es sei denn sie sind mit [url] anderweitig verlinkt worden)
  - Man kann bei [img] und [shot] nun einen float-Wert mit angeben, also [img=left], [img=right] oder [img=none] (äquivalent bei shot)
  damit wird das Bild vom Text umflossen
- vom 08.07.2007
 - Einfügen einer Farbauswahlbox
 - Bei Code kann nun ein Dateiname sowie Startzeile angegeben werden und es funktioniert auch im IE7
 - Nochmaliger Überarbeitung der Bildverkleinerung, ich hoffe nun gehts auch im IE7 immer
 - Geänderte Installationsanleitung !!
- Änderungen von F zu H
 - "Schutz" vor langen Wörtern überarbeitet
 - kleine (interne) Änderungen am Linksystem - Fehlerbehebung
 - Installationsroutine überarbeitet

## Bekannte Einschränkungen / Fehler

## Haftungsausschluss
Ich übernehme keine Haftung für Schäden, die durch dieses Skript entstehen.
Benutzung ausschließlich AUF EIGENE GEFAHR.

Fehler bitte im ilch Forum posten, am besten in einem bestehenden BBCode 2 Thread.

