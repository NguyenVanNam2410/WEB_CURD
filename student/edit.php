
<?php
    include_once '../admin/header.php';
    include_once '../connect.php';
    $a  = new DB;
    if(isset($_GET['id']))
    {
        $posts = $a->select('*', 'student', 'id = '.$_GET['id'].'', '1');
        $class = $a->select('*', 'class', '', '');
        //  echo '<pre>';
        // print_r($class);
        // echo '<pre>';
    }
    if(isset($_POST['submit']) && isset($_GET['id']))
    {
        $posts = $a->select('*', 'student', 'id = '.$_GET['id'].'', '1');
        $class = $a->select('*', 'class', '', '');
        $date = [
            'name' => $_POST['name'],
            'msv' => $_POST['msv'],
            'address' => $_POST['address'],
            'class' => $_POST['class'],
            'date' => $_POST['date'],
        ];
        if($a->Update('student',$date,$_GET['id']) == true) 
        {
            header('location: ../index.php'); 
        }else{
            echo 'update không thành công';
        }
    }
?>
<body>
    <div class="container">
        <div class="row">
            <h2 class="fom-control" style="text-align: center">sửa sản phẩm <?php echo $_GET['id']; ?> </h2>
            <div class="form-control">
                <form action="" method="post">
                    <div class="form-group">
                        <legend>Tên sinh viên</legend>
                        <input type="text" name="name" value="<?php  echo $posts[0]['name'];?>" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <legend>mã sinh viên</legend>
                        <input type="text" name="msv" id="" value="<?php  echo $posts[0]['msv'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <legend>địa chỉ</legend>
                        <input type="text" name="address" value="<?php  echo $posts[0]['address'];?>" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <legend>lớp</legend>
                        <select name="class" id="" class="form-control">
                            <?php
                                foreach($class as $key => $value){
                                    echo '<option '. ($posts[0]['class'] === $value['id'] ? 'selected' : '') .' value = '.$value['id'].' >'.$value['name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <legend>ngày sinh</legend>
                        <input type="text" name="date" id=""value="<?php  echo $posts[0]['date'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;" name="submit">update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

<?php 
    include_once '../admin/footer.php'
?>
