<?php

class dbAides extends database {

  public function getAides() {

    $pdo = $this->connect();

    $requete = "SELECT Category_Aide, Level_Aide, Commentary_Aide FROM Aides";
    $stmt = $pdo->query($requete);

      if($stmt->rowCount() == 0)
      {
          echo '<p>Aucune aide disponible</p>';
      }
      else
      {
        for ($i =0; $i < $stmt->rowCount(); $i++)
        {
            $aide = $stmt->fetch();
            echo '<div class="col-sm-6">';
            echo '<h2>' . utf8_encode($aide["Category_Aide"]) . ' <small>' . utf8_encode($aide["Level_Aide"]) . '</small></h2>';
            echo '<p>' . utf8_encode($aide["Commentary_Aide"]) . '</p>';
            echo '<button class="btn btn-success">Je pousse!</button>';
            echo '</div>';

        }
      }


      $this->disconnect($pdo);
  }

  public function addAide($cat, $level, $comm) {
    $pdo = $this->connect();
    $requete = "INSERT INTO Aides (Category_Aide, Level_Aide, Commentary_Aide, Reserved_Aide, ID_Pousseur_User VALUES (:cat, :level, :comm, 0, :pousseurID)";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':cat', $cat);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':comm', $comm);
    $stmt->bindParam(':pousseurID', $_SESSION['C2P_ID']);
    if ($stmt->execute())
        return true;
    else
        return false;
  }
}
