<?php
include 'simple_html_dom.php';
$html = new simple_html_dom();

$html = file_get_html('https://monotaro.id/');
$ret = $html->find('li[class=has-children]');

foreach($ret as $v){
	$a = $v->find('a[class=fc-base]');
	foreach($a as $k){
		$span = $k->find("span");
		foreach($span as $x){
			//$kategori[] = $x;
			echo $x."<br><hr>";
		}

	}

	$category_title =  $v->find('ul[class=cd-secondary-dropdown is-hidden]');
	foreach($category_title as $kat){
		$title_child = $kat->find("li[class=has-children col s9]");
		foreach($title_child as $tl){
			$col_s4 = $tl->find("div[class=col s4]");
			foreach($col_s4 as $tl2){
				$tle = $tl2->find("div[class=category-title]");
				
				//ini adalah title
				foreach($tle as $tl3){
					$tl_a = $tl3->find("a");

					foreach($tl_a as $title){
						echo $title->innertext."<hr><br>";
						//$subkategori[] = $title;
						$htmls = file_get_html($title->href);
						$stl_div = $htmls->find("div[class=filter-options-content]");
						foreach($stl_div as $stl_3){
							$stl_ol = $stl_3->find("ol[class=items]");
							foreach($stl_ol as $stl_4){
								$stl_li = $stl_4->find("a");
								foreach($stl_li as $subtitle){
									//$childkategori[] = $subtitle;
									echo $subtitle->innertext."<br>";
								}
							}
							break;
							//agar brand tidak ngikut
						}	
					}
				}
				//ini adalah title
				echo "<br>";
			}
		}
	}

	echo "<br>";
	break;
	//exit;
}


?>		