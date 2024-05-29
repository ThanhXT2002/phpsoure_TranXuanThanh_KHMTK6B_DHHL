<?php

class ProductController extends Controller
{
    
    public $productModel;

    public function __construct()
    {
        $this->productModel = $this->model("ProductModel");
    }

    function displayIntroduction(){
        $this->view("master", [
            "Page" => "home"
        ]);
    }

    function getProductsbyBand(){
        $this->view("master",[
            "Page" =>"getProductsbyBand"
        ]);
    }

    public function displayProductByBand(){
        if(isset($_POST["btnSearch"])){
            $band= $_POST["selectBand"];
            $tblname = 'tblproduct';
            $field = "band";
            $products = $this->productModel->getRecordsbyField($tblname, $field, $band);
            $this->view(
                "master",
                [
                    "Page"=>"getProductsbyBand",
                    "Products"=>$products
                ]
                );

        }
    }

    function getProductsbyYear(){
        $this->view("master",[
            "Page" =>"getProductsbyYear"
        ]);
    }

    public function displayProductByYear(){
        if(isset($_POST["btnSearch"])){
            $Year= $_POST["selectYear"];
            $tblname = 'tblproduct';
            $field = "year";
            $products = $this->productModel->getRecordsbyField($tblname, $field, $Year);
            $this->view(
                "master",
                [
                    "Page"=>"getProductsbyYear",
                    "Products"=>$products
                ]
                );

        }
    }

    function getProductsbyYearAndCompany(){
        $this->view("master", [
            "Page" => "getProductsbyYearAndCompany"
        ]);
    }
    
    public function displayProductByYearAndCompany(){
        if (isset($_POST["btnSearch"])) {
            if (isset($_POST["companyCheckbox"]) && isset($_POST["yearCheckbox"])) {
                $year = $_POST["selectYear"];
                $company = $_POST["selectCompany"];
                $tblname = 'tblproduct';
                $field1 = "year";
                $field2 = "company";
                $products = $this->productModel->getRecordsby2Field($tblname, $field1, $field2, $year, $company);
            } else if(isset($_POST["yearCheckbox"])) {
                $year = $_POST["selectYear"];
                $tblname = 'tblproduct';
                $field1 = "year";
                $products = $this->productModel->getRecordsbyField($tblname, $field1, $year);
            } else if (isset($_POST["companyCheckbox"])){
                $company = $_POST["selectCompany"];
                $tblname = 'tblproduct';
                $field2 = "company";
                $products = $this->productModel->getRecordsbyField($tblname, $field2, $company);
            } else {
                echo "Nhập 1 trong 2.";
            }
            $this->view(
                "master",
                [
                    "Page" => "getProductsbyYearAndCompany",
                    "Products" => $products
                ]
            );
        }
    }

    function getOrderCustomer(){
        $this->view("master", [
            "Page" => "getOrderCustomer"
        ]);
    }
    
    public function displayOrderCustomer() {
        if(isset($_POST["btnSearch"])) {
            // Lấy dữ liệu được nhập từ form
            $cid = $_POST["cid"];
            $oid = $_POST["oid"];
    
            // Gọi phương thức trong model để thực hiện truy vấn
            $products = $this->productModel->getRecordsByCIDAndOID("viewOrderCustomer", $cid, $oid);
    
            // Truyền dữ liệu và hiển thị view
            $this->view(
                "master",
                [
                    "Page" => "getOrderCustomer",
                    "Products" => $products,
                ]
            );
        }
    }

    function impInsertProduct(){
        $this->view("master", [
            "Page"=>"insertProduct"
        ]);
    }


    public function insertProduct(){
        if(isset($_POST["btnInsert"])){
            $pid = $_POST["pid"];
            $pname = $_POST["pname"];
            $company = $_POST["company"];
            $year = $_POST["selectYear"];
            $band = $_POST["selectBand"];
    
            // Khởi tạo biến $pimage với giá trị mặc định
            $pimage = '';
    
            // Kiểm tra xem tệp đã được tải lên thành công hay không
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                // Đọc nội dung tệp và mã hóa thành chuỗi base64
                $imageData = file_get_contents($_FILES['img']["tmp_name"]);
                if ($imageData !== false) {
                    $pimage = 'data:image/png;base64,' . base64_encode($imageData);
                } else {
                    // Xử lý lỗi khi đọc tệp hình ảnh
                    echo "Error reading image file.";
                }
            } else {
                // Xử lý khi không có tệp hình ảnh được tải lên hoặc có lỗi xảy ra
                echo "Image file not uploaded or upload error.";
            }
    
            // Gọi phương thức model để chèn sản phẩm
            $result = $this->productModel->insertProduct($pid, $pname, $company, $year, $band, $pimage);
    
            // Hiển thị view với kết quả
            $this->view("master", [
                "Page" => "insertProduct",
                "result" => $result
            ]);
        }
    }
    
}

?>