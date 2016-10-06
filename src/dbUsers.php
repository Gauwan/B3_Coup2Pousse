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

        //Traitement



        $found = false;

        //Recheche des utilisateurs
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
	
	public function getAides() {
		
		$pdo = $this->connect();
		$requete = "SELECT ID_Aide, Category_Aide, Level_Aide, Commentary_Aide
					FROM Aides";
		$stmt = $pdo->query($requete);
		$result = $stmt->fetch();
		return $result;
		
	}

}
