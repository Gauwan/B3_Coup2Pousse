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

    public function registrationUser($establishment, $login, $password, $fullname, $email)
    {
        $pdo = $this->connect();

        //Préparation de la requete
        $requete = "INSERT INTO Users (Login_User, Password_User, Fullname_User, Email_User, IsEtablissement_User) VALUES (:login, :password, :fullname, :email, :establishment)";

        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':fullname', $fullname);
        if (isset($email))
            $stmt->bindParam(':email', $email);
        $stmt->bindParam(':establishment', $establishment);

        if ($stmt->execute())
            return true;
        else
            return false;

    }

    public function connectionUser($login, $password, $cookie)
    {
        $pdo = $this->connect();

        //Recheche des utilisateurs
        $requete = "SELECT ID_User, Password_User FROM Users WHERE Login_User = '".$login."'";
        $stmt = $pdo->prepare($requete);
        if ($stmt->execute())
        {
            $result = $stmt->fetch();
            if ($result["Password_User"] == $password)
            {
                $_SESSION["C2P_ID"] = $result["ID_User"];
                if ($cookie)
                    setcookie("C2P_COOKIE", $result["ID_User"], time() + (86400 * 30));

                return true;
            }
            else
                return false;
        }
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

    //Generic function to get data from field.
    public function getUserField($id, $field)
    {
        $pdo = $this->connect();

        //Traitement
        $requete = "SELECT ".$field." FROM Users WHERE ID_User = '".$id."'";
        $stmt = $pdo->query($requete);
        $result = $stmt->fetch();
        return $result[$field];

    }

    public function getAddress($id)
    {
        $pdo = $this->connect();

        $stmt = $pdo->query("SELECT Number_Adresse, Name_Adresse, City_Adresse, CodePostal_Adresse FROM Adresses INNER JOIN Users WHERE Users.ID_Adresse = Adresses.ID_Adresse");
        $result = $stmt->fetch();
        return $result;

    }

}
