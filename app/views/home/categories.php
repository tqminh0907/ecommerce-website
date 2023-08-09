<div class="list-group mt-3">
    <?php 

    foreach ($dataCat as $key => $value) {
        if ($value['parent_id'] == 0) {
            ?>
            <div class="btn-group dropdown row row-cols-3 list-group-item list-group-item-action">
                <a href="index.php?controller=home&action=index&cat_id=<?php echo $value['cat_id'] ?>&cat_name=<?php echo $value['cat_name'] ?>"  class="btn btn-default col-10 text-start">
                    <p><?php echo $value['cat_name'] ?></p>
                </a>
                <a class="btn btn-default col-1" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-chevron-compact-right"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php showCategories($dataCat, $value['cat_id']); ?>
                </ul>
            </div>
            <?php
        }
    }
    ?>
<?php
    //HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    function showCategories($dataCat, $parent_id = 0)
    {
        // LẤY DANH SÁCH CATE CON
        $cate_child = array();
        foreach ($dataCat as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id)
            {
                $cate_child[] = $item;
                unset($dataCat[$key]);
            }
        }
        
        // HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child)
        {
            foreach ($cate_child as $key => $item)
            {
                // Hiển thị tiêu đề chuyên mục
                ?>
                <li><a class="dropdown-item" href="index.php?controller=home&action=index&cat_id=<?php echo $item["cat_id"] ?>&cat_name=<?php echo $item["cat_name"] ?>"><?php echo $item["cat_name"] ?></a></li>
                <?php
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($dataCat, $item['cat_id']);
            }
        }
    }

    
?>
</div>