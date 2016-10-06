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
        $requete = "INSERT INTO users (Login_User, Password_User, Fullname_User, Email_User) 
					VALUES (:login, :password, :fullname, :email)";
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
        $requeteP = "
			SELECT ID_User, Password_User 
			FROM users 
			WHERE Login_User = '".$login."'";
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
					FROM aides";
		$stmt = $pdo->query($requete);
		$result = $stmt->fetch();
		return $result;
		
	}

	public function addAide($category, $level, $commentary) {
		
		$pdo = $this->connect();
		$idUser = $_SESSION["C2P_ID"];
		$requete = "INSERT INTO aides (Category_Aide, Level_Aide, Commentary_Aide, ID_Pousse_User)
					VALUES (:category, :level, :commentary, :id)";
		$stmt = $pdo->prepare($requete);
		$stmt->bindParam(':category', $category);
		$stmt->bindParam(':level', $level);
		$stmt->bindParam(':commentary', $commentary);
		$stmt->bindParam(':id', $idUser);
		if ($stmt->execute())
			return true;
		else
			return false;
		
	}
	
}
