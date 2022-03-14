
<?php
    include_once '../connect.php';
    include_once '../admin/header.php';
    $a = new DB;
    $a->Connect();
    $class = $a->select('*','class','','');
    $error = array();
    $data = array();
    if(isset($_POST['submit']))
    {
        $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $data['msv'] = isset($_POST['msv']) ? $_POST['msv'] : '';
        $data['address'] = isset($_POST['address']) ? $_POST['address'] : '';
        $data['class'] = isset($_POST['class']) ? $_POST['class'] : '';
        $data['date'] = isset($_POST['date']) ? $_POST['date'] : '';

        include_once '../student/vadidate.php';
        if (empty($data['name'])){
            $error['name'] = 'Bạn chưa nhập tên';
        }
     
        if (empty($data['msv'])){
            $error['msv'] = 'Bạn chưa nhập msv';
        }
        else if (empty($data['address'])){
            $error['address'] = 'bạn chưa nhập địa chỉ';
        }
     
        if (empty($data['date'])){
            $error['date'] = 'Bạn chưa nhập ngày sinh';
        }
        if (!$error){
            if($a->store('student',$data) == true) 
            {
                header('location: ../index.php'); 
            }else{
                echo 'Thêm mới không thành công';
            }
        }
    }
    
?>
<body>
    <div class="container">
        <div class="row">
            <h2 class="fom-control" style="text-align: center"> Thêm sinh viên</h2>
            <div class="form-control">
                <form action="" method="post">
                    <div class="form-group">
                        <legend>Tên sinh viên</legend>
                        <input type="text" name="name" id="" placeholder="tên sinh viên....."  value="<?php echo isset($data['name']) ? $data['name'] : '';?>"class="form-control">
                        <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                    </div>
                    <div class="form-group">
                        <legend>mã sinh viên</legend>
                        <input type="text" name="msv" id="" placeholder="mã sinh viên....." value="<?php echo isset($data['msv']) ? $data['msv'] : ''; ?>" class="form-control">
                        <?php echo isset($error['msv']) ? $error['msv'] : ''; ?>
                    </div>
                    <div class="form-group">
                        <legend>Địa chỉ</legend>
                        <input type="text" name="address" id="" placeholder="Địa chỉ sinh viên....." value="<?php echo isset($data['address']) ? $data['address'] : '';  ?>" class="form-control">
                        <?php echo isset($error['address']) ? $error['address'] : ''; ?>
                    </div>
                    <div class="form-group">
                        <legend>Lớp</legend>
                        <select name="class" id="" class="form-control">
                            <?php
                                foreach($class as $key => $value){
                                    echo '<option ' .'value = '.$value['id'].' >'.$value['name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <legend>date</legend>
                        <input type="text" name="date" id="" placeholder="ngày sinh ....."  value="<?php isset($data['date']) ? $data['date'] : '';  ?>"class="form-control">
                        <?php echo isset($error['date']) ? $error['date'] : ''; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;" name="submit">Thêm mới</button>
                        <a class="btn btn-primary" style="margin-top: 20px;" href="../index.php">quay lại</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

<?php 
    include_once '../admin/footer.php'
?>
