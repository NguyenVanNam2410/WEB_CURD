<?php
    include_once './admin/header.php';
    include_once './connect.php';
?>
<body>
    <?php
        $a = new DB;
        $connect = $a->Connect();
        if(isset($_GET['sort_by']))
        {
            $sort_by = $_GET['sort_by'];
            $posts = $a->select('student.id, student.name, student.msv, student.address, student.date, class.name as mon_hoc'
            ,'student',
            'inner join `class` ON student.class = class.id WHERE class = '.$sort_by.' order by id DESC'
            );

        }else{
            $posts = $a->select('student.id, student.name, student.msv, student.address, student.date, class.name as mon_hoc'
            ,'student',
            'inner join `class` ON student.class = class.id  order by id DESC'
        );
        }
        $class = $a->select('*','class','','');

    ?>
    <header>
        <div class="div">
            <h1 class="header_item">DANH SÁCH SINH VIÊN</h1>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <a href="./student/create.php" class="btn btn-success">Thêm sinh viên</a>
            <div class="row">
                <div class="search">
                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline search-item" action="" > 
                            <input class="form-control mr-sm-2" name ='key' id="keyword"  type="text" placeholder="Search" >
                        </form>
                        
                    </nav>
                    <div class="input-group mb-3">

                        <select class="custom-select" id="product__checked">
                            <option value="index.php" selected>..... Tìm kiếm theo lớp .....</option>
                            <?php
                                    foreach($class as $key => $value){
                                        echo '<option ' .'value = index.php?sort_by='.$value['id'].' '. ($sort_by == $value['id'] ? 'selected' : '') .' >'.$value['name'].'</option>';
                                    }
                                ?>
                        </select>
                    </div>
                </div>
            </div>
        
            <table class="table table-hover" style="margin-top:20px">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">mã sinh viên</th>
                    <th scope="col">địa chỉ</th>
                    <th scope="col">lớp</th>
                    <th scope="col">ngày sinh</th>
                    <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody id="results" class="results">
                    <?php
                        foreach($posts as $post)
                        {
                            echo '<tr id="cate'.$post['id'].'">
                            <th scope="row">'.$post['id'].'</th>
                            <td >'.$post['name'].'</td>
                            <td >'.$post['msv'].'</td>
                            <td >'.$post['address'].'</td>
                            <td >'.$post['mon_hoc'].'</td>
                            <td>'.$post['date'].'</td>
                            <td>
                                <a href= "student/edit.php?id='.$post['id'].'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href= "" data-id='.$post['id'].'  class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
            <!-- <p class="button" style="text-align: center;">
                <a href="javascript:" onclick="loadMore(this)" class="btn btn-info load_hide"  id="load_hide" >load More</a>
            </p> -->
            </div>
        </div>
    <style>
    </style>
<?php
 include_once './admin/footer.php';
?>