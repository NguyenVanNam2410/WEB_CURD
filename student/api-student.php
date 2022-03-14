<?php
    include_once '../connect.php';
    $a = new DB;
    $a->Connect();
    $page = $_GET['page'];
    $numPage = 3;
    $limit = ($page -1 ) * $numPage;
    $sql = $a->select('student.id, student.name, student.msv, student.address, student.date, class.name as mon_hoc'
    ,'student',
        'inner join `class` ON student.class = class.id ORDER BY id DESC limit '.$limit.', 3'
    );
    // $count = $limit + 1;
    foreach($sql as $post)
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