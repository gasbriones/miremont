<?php

function getSubMenu($query,$section,$count) {
    if ($query->have_posts()) {
        $i=$count;
        $origin = $count;
        $goto = '';
        while ($query->have_posts()) {
            $query->the_post();

            if ($i % $count == 0 && $i > $count){
                $origin += $count;
                $goto = '-'.$origin;
            }
            $i++;
            echo '<li><a href="' . site_url().'/?page='.$section.'&more='.$origin.'#'.$section.$goto.'">' . get_the_title() . '</a></li>';
        }
    }
}




