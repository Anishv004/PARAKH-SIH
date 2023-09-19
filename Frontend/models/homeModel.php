<?php
class homeModel
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }
  public function dataInsertion($csvFile)
  {
    try {
      if (($handle = fopen($csvFile, "r")) !== false) {
        $stmt = $this->db->prepare("INSERT IGNORE INTO Qn_bank (question,exp,cop,opa,opb,opc,opd,subject_name,id,diff_score,correct,total) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");
        $firstRow = true;

        $diff=50;
        $zero=0;
        while (($data = fgetcsv($handle, 9999, ",")) !== false) {
          if ($firstRow) {
            $firstRow = false;
            continue;
          }
          

          // Bind parameters and execute the prepared statement
          $stmt->bindParam(1, $data[0]);
          $stmt->bindParam(2, $data[1]);
          $stmt->bindParam(3, $data[2]);
          $stmt->bindParam(4, $data[3]);
          $stmt->bindParam(5, $data[4]);
          $stmt->bindParam(6, $data[5]);
          $stmt->bindParam(7, $data[6]);
          $stmt->bindParam(8, $data[8]);
          $stmt->bindParam(9, $data[9]);
          $stmt->bindParam(10, $diff);
          $stmt->bindParam(11, $zero);
          $stmt->bindParam(12, $zero);

          $stmt->execute();

          // Check for errors
          if ($stmt->errorCode() !== '00000') {
            $errorInfo = $stmt->errorInfo();
            echo "Error inserting data: " . $errorInfo[2];
          }
        }
        fclose($handle);
      } else {
        echo "Error opening CSV file.";
      }
    } catch (PDOException $e) {
      echo "Database Error: " . $e->getMessage();
    }
  }

  public function fetchQuestion($qn_num)
  {
    $sql = "SELECT * FROM Qn_bank ORDER BY RAND() LIMIT 1";
    $temp = $this->db->prepare($sql);
    $temp->execute();
    if($qn_num<5){
      $qa = $temp->fetchall(PDO::FETCH_ASSOC);
      return $qa;
    }

    return null;
  }

  public function validateUserAns($qn_id,$user_ans){
    $query="SELECT cop from Qn_bank where id=:qnid";
    $temp = $this->db->prepare($query);
    $temp->bindParam(':qnid', $qn_id, PDO::PARAM_STR);
    $temp->execute();
    $crct_ans = $temp->fetchall(PDO::FETCH_ASSOC);

    $crct_ans=$crct_ans[0]['cop'];
    if($user_ans==$crct_ans){
      return 1;
    } else{
      return 0;
    }

  }

  public function updatePerc($qn_id,$res){
    if($res==1){
      $query="UPDATE Qn_bank SET correct=correct+1, total=total+1,
      diff_score=(1-correct/total)*100 WHERE id=:qnid";
    } 
    else{
      $query="UPDATE Qn_bank SET total=total+1, diff_score=(1-correct/total)
      WHERE id=:qnid";
    }
    $temp = $this->db->prepare($query);
    $temp->bindParam(':qnid', $qn_id, PDO::PARAM_STR);
    $temp->execute();
  }
}
