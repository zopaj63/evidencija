<?php

class OcjenaView
{
    
    // medoda za prikaz forme
    public function prikaziFormu()
    {
        echo'
        <hr>
        <h3>Unos ocjena</h3>
            <hr>
            <p>Ispunite polja:</p>
            <form method="post" action="">
                <input type="text" name ="predmet" placeholder="Predmet" required><br><br>
                <input type="number" name ="ocjena" placeholder="Ocjena" required><br><br>
                <input type="number" name ="studenti_id" placeholder="ID studenta" required><br><br>

                <input type="submit" value="Pošalji">
            </form>
            <hr>
        ';
    }

    // ispis svih ocjena iz baze, radi kontrole funkcionalnosti
    public function prikaziOcjene($sve_ocjene)
    {
        echo "<h2>Popis svih ocjena</h2>";
        echo "<table border=1>
        <tr>
            <th>ID ocjene</th>
            <th>Predmet</th>
            <th>Ocjena</th>
            <th>ID studenta</th>
        </tr>
        </table><br>";

        foreach($sve_ocjene as $ocjene)
        {
            echo "<table border=1>
            <tr>
                <td>{$ocjene['id']}</td>
                <td>{$ocjene['predmet']}</td>
                <td>{$ocjene['ocjena']}</td>
                <td>{$ocjene['studenti_id']}</td>
            </tr>
            </table>";
        }
    }


}


?>