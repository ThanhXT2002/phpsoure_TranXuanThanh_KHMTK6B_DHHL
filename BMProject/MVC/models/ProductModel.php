<?php 
class ProductModel extends dbProduct
{
    public function getRecords($tablename){
        $qr = "SELECT * FROM $tablename";
        return mysqli_query($this->con, $qr);
    }

    public function getRecordsbyField($tblname, $field, $keyword){
        $sql = "SELECT * FROM $tblname where $field ='$keyword'";
        return mysqli_query($this->con, $sql);
    }

    public function getRecordsby2Field($tblname, $field1, $field2, $year, $company){
        $sql = "SELECT * FROM $tblname WHERE $field1 = '$year' AND $field2 = '$company'";
        return mysqli_query($this->con, $sql);
    }

    public function getRecordsByCIDAndOID($tblname, $cid, $oid) {
        $sql = "SELECT * FROM $tblname WHERE cid = '$cid' AND oid = '$oid'";
        return mysqli_query($this->con, $sql);
    }

    public function insertProduct($pid, $pname, $company, $year, $band, $pimage) {
        $result = false;
        $sql = "INSERT INTO tblProduct (pid, pname, company, year, band, pimage) VALUES ('$pid', '$pname', '$company', '$year', '$band', '$pimage')";
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return $result;
    }

    // Phương thức select tổng quát không bảo mật
    public function select($tablename, $conditions = []) {
        $sql = "SELECT * FROM $tablename";
        
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        return mysqli_query($this->con, $sql);
    }
}
?>