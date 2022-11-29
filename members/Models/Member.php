<?php
//namespace Users;
require '../Includes/db.inc.php';


class Member
{
  private $db;

  public function __construct($conn)
  {
    $this->db = $conn;
  }

  public function getAllMembers()
  {
    $sql = "SELECT * FROM members";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt;
  }


  public function getLevelMembers($level){
    $query="SELECT * FROM members WHERE fellowships=:level ";
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':level',$level);
    $stmt->execute();
    return $stmt;
  }   

  //get all the details about the admin
  public function getmemberinfo($userid)
  {
    try {
      $sql = "SELECT * FROM members WHERE id=:userid";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(":userid", $userid);
      $stmt->execute();
      $returned_row = $stmt->fetch(pdo::FETCH_ASSOC);
      return [
        'id' => $returned_row['id'],
        'email' =>         $returned_row['email'],
        'firstname' =>   $returned_row['firstname'],
        'lastname' =>   $returned_row['lastname'],
        'date' =>       $returned_row['date'],
        'rollid' =>      $returned_row['rollid'],
        'mobile' =>      $returned_row['mobile'],
        'birthday' =>      $returned_row['birthday'],
        'ministry' =>      $returned_row['ministry'],
        'gender' =>      $returned_row['gender'],
        'department' =>      $returned_row['department'],
        'birthmonth' =>      $returned_row['birthmonth'],
        'fellowship' =>      $returned_row['fellowship'],
        'residence' =>      $returned_row['residence'],
        'origin' =>      $returned_row['origin'],

      ];
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  public function EditCheckusername($username, $sessionid)
  {
    try {

      $sql = "SELECT * FROM administrator WHERE username =:username AND id!=:sessionid ";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':sessionid', $sessionid);
      $stmt->execute();
      // Check if row is actually returned
      if ($stmt->rowCount() > 0) {
        //  echo "username has been used";
        return false;
      } else {
        //   echo 'continue to sign up';
        return true;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }

  public function EditCheckEmail($email, $sessionid)
  {
    try {

      $sql = "SELECT * FROM administrator WHERE email =:email AND id !=:sessionid ";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':sessionid', $sessionid);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return false;
      } else {
        return true;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }





  public function updateProfile($dp, $firstname, $lastname, $username, $email, $biotext, $interest, $country, $website, $sessionid)
  {

    try {

      $dpsql = "UPDATE administrator SET profileimage=:image, firstname=:firstname, lastname=:lastname, username=:username, email=:email,Bio=:description, Country=:country, interest=:interest, website=:website WHERE id=:userid";

      $stmt = $this->db->prepare($dpsql);
      $stmt->bindParam(":image", $dp);
      $stmt->bindParam(":userid", $sessionid);
      $stmt->bindParam(":description", $biotext);
      $stmt->bindParam(":firstname", $firstname);
      $stmt->bindParam(":lastname", $lastname);
      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":country", $country);
      $stmt->bindParam(":interest", $interest);
      $stmt->bindParam(":website", $website);

      if ($stmt->execute()) {
        //return the users data and email will be the unique key                  
        /*       return [
                    'id' => $sessionid,  
                    'bio' => $biotext,
                    'image' => $dp
                        ];*/
        return true;
      } else {
        //   echo "error while inserting";
        return false;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }


  public function changepassword($sessionid, $newpassword)
  {
    $user_hashed_newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

    $query = "UPDATE administrator SET Password=:newpassword WHERE id=$sessionid ";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(":newpassword", $user_hashed_newpassword);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function checkSecurityQuestion($question, $email, $answer)
  {
    try {
      $sql = "SELECT * FROM administrator WHERE email =:email";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        //Return row as an array indexed by both column name
        $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($returned_row['forget_question'] == $question && $returned_row['forget_answer'] == $answer) {
          return true;
        } else {
          return false;
        }
      } else {
        //return false;
        echo "no returned result";
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }  //login

  public function deleteAccount($userid)
  {
    $sqldelete = 'DELETE FROM administrator WHERE id=:userid ';
    $stmt = $this->db->prepare($sqldelete);
    $stmt->bindParam(":userid", $userid);
    $stmt->execute();
    return $stmt;
  }
}
