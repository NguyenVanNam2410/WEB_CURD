<?php
    // cách 1:
    include_once '../connect.php';
    $a = new DB;
    $a->Connect();
    $class = $a->select('*','class','','');
    if(isset($_REQUEST['keyword']))
    {
        $output = '';
        $key_search = $_REQUEST['keyword'];
        // echo $key_search;
        $posts = $a->search('student', $key_search);
        foreach($posts as $value)
        {
            echo $output = 
            '<tr id="cate'.$value['id'].'">
                <th scope="row">'.$value['id'].'</th>
                <td >'.$value['name'].'</td>
                <td >'.$value['msv'].'</td>
                <td >'.$value['address'].'</td>
                <td >'.($value['class'] == $class[0]['id'] ? $class[0]['name'] : 'không có').'</td>
                <td>'.$value['date'].'</td>
                <td>
                    <a href= "student/edit.php?id='.$value['id'].'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href= "" data-id='.$value['id'].'  class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>';
        }
    }
    // cách 2:
    // if(isset($_POST['data']))
    // {
    //     $output = '';
    //     $key_search = $_POST['data'];
    //     $posts = $a->search('student', $key_search);
    //     foreach($posts as $value)
    //     {
    //         echo $output = 
    //         '<tr id="cate'.$value['id'].'">
    //             <th scope="row">'.$value['id'].'</th>
    //             <td >'.$value['name'].'</td>
    //             <td >'.$value['msv'].'</td>
    //             <td >'.$value['address'].'</td>
    //             <td >'.($value['class'] == $class[0]['id'] ? $class[0]['name'] : 'không có').'</td>
    //             <td>'.$value['date'].'</td>
    //             <td>
    //                 <a href= "student/edit.php?id='.$value['id'].'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
    //                 <a href= "" data-id='.$value['id'].'  class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
    //             </td>
    //         </tr>';
    //     }
    // }
    // echo 'hello';
?>