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

    public function registrationUser($email, $login, $password, $firstname, $lastname, $birthday)
    {
        $pdo = $this->connect();

        //Préparation de la requete
        $requete = "INSERT INTO Users (Email_User, Login_User, Password_User, Firstname_User, Lastname_User, Birthday_User, Signup_User) VALUES (:email, :login, :password, :firstname, :lastname, :birthday, :signup)";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':signup', date("Y-m-d"));

        if ($stmt->execute())
            return true;
        else
            return false;

    }

    public function connectionUser($email, $password)
    {
        $pdo = $this->connect();

        //Traitement
        $requete = "SELECT ID_User, Password_User FROM Users WHERE Email_User = '".$email."'";
        $stmt = $pdo->prepare($requete);

        if ($stmt->execute())
        {
            $result = $stmt->fetch();
            if ($result["Password_User"] == $password)
            {
                $_SESSION["C2P_ID"] = $result["ID_User"];

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
