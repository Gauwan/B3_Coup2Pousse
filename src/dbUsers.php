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

    public function registrationUser($login, $password, $email, $firstname, $lastname)
    {
        $pdo = $this->connect();

        //Préparation de la requete
        $requete = "INSERT INTO users (Login_User, Password_User, Email_User, Firstname_User, Lastname_User) VALUES (:login, :password, :email, :firstname, :lastname)";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);

        if ($stmt->execute())
            return true;
        else
            return false;

    }

    public function connectionUser($email, $password, $cookie)
    {
        $pdo = $this->connect();

        //Traitement
        $requete = "SELECT ID_User, Password_User FROM Users WHERE Login_User = '".$email."'";
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

}
