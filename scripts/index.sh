#!/bin/bash
echo "Content-type: text/html

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Reserviere deinen Tennisplatz!</title>
        <link href="styles.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div id="navigation">
            <div id="banner">
              <h1>Platzreservierung</h1>
            </div>
            <p id="menu">
            <a href="#">Home</a>
            <a href="booking.html" id="buchen">Platz buchen!</a>
            <a href="#" id="123">Register</a>
            </p>
          </div>
          <div id='book'>
            <form id='theform_name'>
              <input id='test' value='Markierungen buchen' type='submit'>
            </form><br>
            <p id="infoText"><p>
          </div>
          <div id='tabelle'>
            <table>
            "

            while read zeitraum platz1 platz2 platz3 platz4;
            do 
                counter=0;
                if (counter<1)
                echo "<tr> 
                    <td>Zeitraum</td>
                    <td>Platz1</td>
                    <td>Platz2</td>
                    <td>Platz3</td>
                    <td>Platz4</td>
                </tr>";
                    counter++
                fi
            done <<< $(cat gebucht.txt)
            
            while read zeitraum platz1 platz2 platz3 platz4;
            do
              echo "
              <tr>
                    <td><div>$zeitraum</div></td>
                    <td><a href="booking.sh"><div>$platz1</div></a></td>
                    <td><a href="booking.sh"><div>$platz2</div></a></td>
                    <td><a href="booking.sh"><div>$platz3</div></a></td>
                    <td><a href="booking.sh"><div>$platz4</div></a></td>
              </tr>
              ";
            done <<< $(cat gebucht.txt)


            echo "
            </table>
      </div>

    </body>
</html>
"