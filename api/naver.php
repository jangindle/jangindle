<?php
error_reporting(0);
include_once($_SERVER['DOCUMENT_ROOT'].'/api/simple_html_dom.php');

function naver_blog_parser($page_no) {
    $myfile = fopen("newBlog.txt", "a+") or die('Unable to open file!');


    $url = 'https://cafe.naver.com/ArticleList.nhn?search.clubid=17593353&search.menuid=51&search.boardtype=L&search.totalCount=151&search.page='.$page_no;
    $html = file_get_html($url);

    $board = $html->find('div[class=article-board m-tcol-c]');

    foreach ($board[1]->find('tr') as $article) {

        $article_title_link = $article->find('a[class=article]')[0];
        $article_title = $article_title_link->plaintext;
        $article_link = $article_title_link->href;
        $article_publisher = $article->find("td[class=p-nick]")[0]->plaintext;
        $article_date = $article->find('td[class=td_date]')[0]->innertext;

        if ($article_title == ""){
            continue;
        }

        // echo $article_publisher;

        $pattern = "/열린( )?견적서(?! (의뢰|작성))/";
        if(preg_match($pattern, $article_title)){
            fwrite($myfile, $article_link."\n");
            // echo '<a href="';
            // echo "https://cafe.naver.com".$article_link;
            // echo '">';
            // echo $article_title."[작성자] ".$article_publisher;
            // echo "</a>";
            // echo '<br />';
        }
    }
    fclose($myfile);
}

for ($i=1; $i<1000 ; $i++) {
    naver_blog_parser($i);
}