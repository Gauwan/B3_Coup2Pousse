<?php

class dbAides extends database {

  public function getAides() {
    $pdo = $this->connect();
    $requete = "SELECT ID_Aide, Category_Aide, Level_Aide, Commentary_Aide FROM Aides";
    $stmt = $pdo->query($requete);
    $result = $stmt->fetch();
    return $result;
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
