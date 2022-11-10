<?php

    echo '<nav aria-label="Search results pages">
            <ul class="pagination justify-content-center pagination-sm">';

    for($i=1; $i<=$total_pages; $i++){
        if($i==$current_page){
            echo '<li class="page-item active"><a class="page-link" href="?per_page='.$item_per_page.'&page='.$i.'">'.$i.'</a></li>';
        }else{
            echo '<li class="page-item"><a class="page-link" href="?per_page='.$item_per_page.'&page='.$i.'">'.$i.'</a></li>';
        }
    }

    echo '</ul>
    </nav>';
?>