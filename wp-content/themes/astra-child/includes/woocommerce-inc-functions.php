<?php

function get_categories_product($categories_list = "", $parent_id = 0, $i = 0) {

	$get_categories_product = get_terms("product_cat", [
		"orderby" => "name", // Тип сортировки
		"order" => "ASC", // Направление сортировки
		"hide_empty" => 1, // Скрывать пустые. 1 - да, 0 - нет.
		"hierarchical" => 1,
		"parent" => $parent_id
	]);

	if(count($get_categories_product) > 0) {

		if($parent_id == 0) {

//			$categories_list .= '<ul class="main_categories_list">';

			$i = 0;

		} else {

			$i++;

//			$categories_list .= '<ul class="sub_categories_list sub_categories_list_'.$i.'">';

		}
        $retArr = [];
		foreach($get_categories_product as $categories_item) {
//            var_dump($categories_item);
            $insObj = new WP_Post($categories_item);
//            $insObj->title = $categories_item->name;
//            $insObj->url = $categories_item->slug;

//			$categories_list .= '<li><a href="'.esc_url(get_term_link((int)$categories_item->term_id)).'">'.esc_html($categories_item->name).'</a>';
//			$categories_list .= get_categories_product("", $categories_item->term_id, $i);
//			$categories_list .= '</li>';
            $retArr[] = $insObj;
		}

		$categories_list .= '</ul>';

	}
return $retArr;
//	return $categories_list;

}
