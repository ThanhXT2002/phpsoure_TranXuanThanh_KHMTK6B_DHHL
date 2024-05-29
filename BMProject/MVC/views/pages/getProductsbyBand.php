<?php
// Kiểm tra xem đã được gửi đi hay chưa
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Xử lý dữ liệu form ở đây

    //Gán giá trị mới cho action sau khi xử lý form
    $newAction = "";
}else{

    //Giá trị action ban đầu
    $newAction = "displayProductByBand";
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
                    <div class="col-sm-12">
                        <label class="control-label">Select Band</label>
                        <select class="form-control m-b" name="selectBand" id="">
                            <option value="telmisartan">telmisartan</option>
                            <option value="Amoxapine">Amoxapine</option>
                            <option value="PYRETHRUM">PYRETHRUM</option>
                            <option value="Oxygen">Oxygen</option>
                            <option value="Keppra">Keppra</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary m-l-sm" name="btnSearch" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($data['Products'])) {

    echo "<div class=\"ibox-content\">";
    echo "<table class=\"table table-bordered\">";
    echo "<thead>";
    echo "<tr>";
    
    // Đổi tên biến cho nhất quán
    $fieldNames = $data["Products"]->fetch_fields();
    
    foreach ($fieldNames as $field) {
        // Sửa lại lỗi cú pháp và hàm strtoupper
        echo "<th class=\"text-center\">".strtoupper($field->name)."</th>";
    }
    
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while($row = mysqli_fetch_array($data["Products"])){
        echo "<tr>";
        echo "<td class=\"text-center\">".$row["id"]."</td>";
        echo "<td class=\"text-center\">".$row["pid"]."</td>";
        echo "<td class=\"text-center\">".$row["pname"]."</td>";
        echo "<td class=\"text-center\">".$row["company"]."</td>";
        echo "<td class=\"text-center\">".$row["year"]."</td>";
        echo "<td class=\"text-center\">".$row["band"]."</td>";
        echo "<td class=\"text-center\">".'<img src="'.$row["pimage"].'" alt="Image Product">'."</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";

}
?>

<!-- <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Border Table </h5>
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

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div> -->