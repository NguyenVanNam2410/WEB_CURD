    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        // xóa student
        $(document).ready(function(){
            $('.delete').click(function(e){
                e.preventDefault();
                const id = $(this).attr('data-id');
                $.ajax({
                    type: 'get',
                    url: './student/delete.php?id='+id,
                    success: function(response){
                        $('#cate'+id).remove();
                    }
                })
            });
        });
        // load more
        var currentPage = 1;
        function loadMore(that){
            currentPage++;
            $.get('./student/api-student.php?page='+currentPage,function(data){
                if(data == null || data == ''){
                    $(that).parent().hide();
                }
                $('#results').append(data);
            });
        }
        // search
        $(document).ready(function(){
            // cách 1
            $(document).on('keyup', '#keyword', function(){
                var keyword  = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: './student/api-search.php',
                    data: {
                        keyword: keyword
                    },
                    // dataType: 'json',
                    success: function(res)
                    {
                        if (keyword == null || keyword == ''){
                            loadMore(that);
                        }
                        $('.load_hide').parent().hide();
                        $(".results").html(res);
                    }
                });

            })
            // cách 2
            // $(document).ready(function(){
            //     $('#keyword').keyup(function(){
            //         var keyword = $('#keyword').val();
            //         $.post('./student/api-search.php',{data: keyword},function(res){
            //             $('.load_hide').parent().hide();
            //             $('.results').html(res);
            //         })
            //     })
            // });
            $("#product__checked").on('change',function(){
                var url = $(this).val();
                // alert(url.search);
                if(url){
                    window.location = url;
                    $('#load_hide').hide();
                    // alert(window.location.search);
                }
                return false;
            });
            
        });

    </script>
</body>
</html>