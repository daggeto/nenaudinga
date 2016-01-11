<?php
	$obj->tabela("shity", "0");
	$obj->getName('page');
	$obj->ileNaStrone($conf->pobierz('img_na_strone'));
	$query = $obj->pobierz();

	if(mysql_num_rows($query)) {
		while($img = mysql_fetch_array($query)) {
			if($obj->isImage($img['type'])) {
                                $author = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `id`='".$img['author']."'"));
				if($conf->pobierz('img_title')) echo'<div class="img_title"><a href="obrazek.php?'.$img['id'].'">'.$img['title'].'</a></div>';
				echo'<div class="shit">
                                        <a href="obrazek.php?'.$img['id'].'"><img src="'.$img['img'].'" alt="'.$img['title'].'" /></a>'
                                        .'<div id="info">'
                                            .'<div class="social-info table-row to-left">'
                                                .'<div class="fb-like" data-href="http://'.$conf->host().'/obrazek.php?'.$img['id'].'" data-send="true" data-layout="box_count" data-width="100%" data-show-faces="false" data-colorscheme="light" data-font="verdana"></div>'
                                            .'</div>'
                                            .'<div class="table-row">'
                                                .'<div class="to-left">' . $content->getValue("global","dodano") . ': ' . $obj->getDateFromDateTime($img['data']) . '</div>'
                                                .'<div class="to-right">' . $content->getValue("obrazek","dodanoPrzez") . ': ' . $author['login'] . '</div>'
                                            .'</div>'
                                        .'</div>'
                                    .'</div>';
				}
			if($conf->pobierz('reklama')) adModule();	
		}
	}
	else {
		echo '<div style="text-align:center;">' . $content->getValue("global","brakWiadomosci") . '</div>';
	}
?>
<div class="strony">
<?php
	if($obj->getName() != NULL)  $page = $obj->getName();
	else $page = 1;
	if($obj->prevStrona()) echo '<a href="?page='.($page-1).'">&lt; ' . $content->getValue("global","poprzedni") . '</a> ';
	$obj->strony();
	if($obj->nextStrona()) echo ' <a href="?page='.($page+1).'">' . $content->getValue("global","nastepny") . ' &gt;</a>';
?>
</div>
