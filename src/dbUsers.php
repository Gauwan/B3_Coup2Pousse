<?php
/**
 * Created by PhpStorm.
 * User: gauth
 * Date: 05/10/2016
 * Time: 14:08
 */
class dbUsers extends database {

    /*-------------------------*/
    /*-----  Zone Public  -----*/
    /*-------------------------*/

    public function registrationUser($login, $password, $firstname, $lastname, $email)
    {
        $pdo = $this->connect();

        //Préparation de la requete
        $requete = "INSERT INTO users (Login_User, Password_User, Firstname_User, Lastname_User, Email_User) VALUES (:login, :password, :firstname, :lastname, :email)";

        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        if (isset($email))
            $stmt->bindParam(':email', $email);

        if ($stmt->execute())
            return true;
        else
            return false;

    }

    public function connectionUser($login, $password, $cookie)
    {
        $pdo = $this->connect();

        //Traitement



        $found = false;

        //Recheche des particuliers
        $requeteP = "SELECT ID_User, Password_User FROM Users WHERE Login_User = '".$login."'";
        $stmt = $pdo->prepare($requeteP);
        if ($stmt->execute())
        {
            $result = $stmt->fetch();
            if ($result["Password_User"] == $password)
            {
                $found = true;
                $_SESSION["C2P_ID"] = $result["ID_User"];
                if ($cookie)
                    setcookie("C2P_COOKIE", $result["ID_User"], time() + (86400 * 30));
            }
        }

        //recherche des etablissements
        if (!$found)
        {
            $requeteE = "SELECT ID_Etablissement, Password_Etablissement FROM etablissements WHERE Login_User = '".$login."'";
            $stmt = $pdo->prepare($requeteE);
            if ($stmt->execute())
            {
                $result = $stmt->fetch();
                if ($result["Password_Etablissement"] == $password)
                {
                    $found = true;
                    $_SESSION["C2P_ID"] = $result["ID_Etablissement"];
                    if ($cookie)
                        setcookie("C2P_COOKIE", $result["ID_Etablissement"], time() + (86400 * 30));
                }
            }
        }

        $this->disconnect($pdo);

        if ($found)
            return true;
        else
            return false;
    }

    public function getUserName($id)
    {
        $pdo = $this->connect();

        //Traitement
        $requete = "SELECT Login_User FROM Users WHERE ID_User = '".$id."'";
        $stmt = $pdo->query($requete);
        $result = $stmt->fetch();
        return $result["Login_User"];

    }

}
