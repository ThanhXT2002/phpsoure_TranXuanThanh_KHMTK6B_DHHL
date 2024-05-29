<?php
// Kiểm tra xem đã được gửi đi hay chưa
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Xử lý dữ liệu form ở đây

    //Gán giá trị mới cho action sau khi xử lý form
    $newAction = "";
}else{

    //Giá trị action ban đầu
    $newAction = "displayOrderCustomer";
}
?>
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Form Search</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <form action="<?php echo $newAction;?>" method="post">
                    <div class="form-group has-success"><label class="col-sm-2 control-label">Input CID</label>
                        <div class="col-sm-10 m-b-md">
                            <input type="text" name="cid" class="form-control">
                        </div>
                    </div>
                    <div class="form-group has-success"><label class="col-sm-2 control-label">Input OID</label>
                        <div class="col-sm-10 m-b-md">
                            <input type="text" name="oid" class="form-control">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary m-l-sm" name="btnSearch" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if(isset($data['Products'])) {
    echo "<div class=\"ibox-content\">";

   
$row = mysqli_fetch_array($data["Products"]);

    echo '<div class="form-group has-success"><label class="col-sm-2 control-label">Customer Name</label>
            <div class="col-sm-10 m-b-md">
                <input type="text" name="cname" class="form-control" value="' . $row["cname"] . '" readonly >
            </div>
          </div>';

    echo '<div class="form-group has-success"><label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10 m-b-md">
                <input type="text" name="address" class="form-control" value="' . $row["address"] . '" readonly >
            </div>
          </div>';

    echo '<div class="form-group has-success"><label class="col-sm-2 control-label">Order Date</label>
            <div class="col-sm-10 m-b-md">
                <input type="text" name="odate" class="form-control" value="' . $row["odate"] . '" readonly >
            </div>
          </div>';



    echo "<table class=\"table table-bordered\">";
    echo "<thead>";
    echo "<tr>";
    
    // Đổi tên biến cho nhất quán
    $fieldNames = $data["Products"]->fetch_fields();
    
    foreach ($fieldNames as $field) {
        $fieldName = strtoupper($field->name);
            if ($fieldName !== "CID" && $fieldName !== "CNAME" && $fieldName !== "ADDRESS" && $fieldName !== "OID" && $fieldName !== "ODATE") {
                echo "<th class=\"text-center\">" . $fieldName ."</th>";
            }
    }
    
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while($row = mysqli_fetch_array($data["Products"])){
        echo "<tr>";

        echo "<td class=\"text-center\">".$row["pid"]."</td>";
        echo "<td class=\"text-center\">".$row["pname"]."</td>";
        echo "<td class=\"text-center\">".$row["company"]."</td>";
        echo "<td class=\"text-center\">".$row["quantity"]."</td>";
        echo "<td class=\"text-center\">".$row["unit_price"]."</td>";
        echo "<td class=\"text-center\">".$row["total"]."</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";

}else{
    echo "<h2 class='text-center'>Không có bản ghi nào</h2>";
}
?>
