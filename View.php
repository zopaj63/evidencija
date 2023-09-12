<?php

class OcjenaView
{
    
    // medoda za prikaz forme za unos studenta
    public function prikaziFormuStudent()
    {
        echo'
        <hr>
        <h2>Unos novog studenta</h2>
            <form method="post" action="">
                <input type="text" name ="ime" placeholder="Ime" required><br><br>
                <input type="text" name ="prezime" placeholder="Prezime" required><br><br>
                <input type="number" name ="id" placeholder="ID studenta" required><br><br>
    
                <input type="submit" name="sbmtstudent" value="Unesi studenta">
            </form>
            <br><hr>
        ';
        }

    // medoda za prikaz forme za unos ocjene
    public function prikaziFormuOcjena()
    {
        echo'
        <hr>
        <h2>Unos ocjena</h2>
            <form method="post" action="">
                <input type="text" name ="predmet" placeholder="Predmet" required><br><br>
                <input type="number" name ="ocjena" placeholder="Ocjena" required><br><br>
                <input type="number" name ="studenti_id" placeholder="ID studenta" required><br><br>

                <input type="submit" name="sbmtocjena" value="Unesi ocjenu">
            </form>
            <br><hr>
        ';
    }

    // ispis svih ocjena 5 iz baze
    public function prikaziOcjene5($sve_ocjene5)
    {
        echo "<h2>Popis svih odlikaša</h2>";
        echo "<table>
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>ID studenta</th>
            <th>Predmet</th>
            <th>Ocjena</th>
        </tr>";

        foreach($sve_ocjene5 as $ev5)
        {
            echo "
                <tr>
                    <td>{$ev5['ime']}</td>
                    <td>{$ev5['prezime']}</td>
                    <td>{$ev5['studenti_id']}</td>
                    <td>{$ev5['predmet']}</td>
                    <td>{$ev5['ocjena']}</td>
                </tr>";
            
        }
        echo "</table>";
    }

        // ispis svih ocjena 5 iz baze
        public function prikaziSveStudente($svi_studenti)
        {
            echo "<h2>Popis svih studenata u bazi</h2>";
            echo "<table>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>ID studenta</th>
            </tr>";
    
            foreach($svi_studenti as $student)
            {
                echo "
                    <tr>
                        <td>{$student['ime']}</td>
                        <td>{$student['prezime']}</td>
                        <td>{$student['id']}</td>
                    </tr>";
                
            }
            echo "</table>";
        }

        // ispis evidencije iz baze
        public function prikaziEvidencija($evidencija)
        {
            echo "<h2>Evidencija ocjena po predmetima</h2>";
            echo "<table>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>ID studenta</th>
                <th>Predmet</th>
                <th>Ocjena</th>
            </tr>";
    
            foreach($evidencija as $ev)
            {
                echo "
                    <tr>
                        <td>{$ev['ime']}</td>
                        <td>{$ev['prezime']}</td>
                        <td>{$ev['studenti_id']}</td>
                        <td>{$ev['predmet']}</td>
                        <td>{$ev['ocjena']}</td>
                    </tr>";
                
            }
            echo "</table>";
        }


}


?>