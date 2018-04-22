<?php
        //
        $rss = new DOMDocument();
      
        // feed de noticias
        $rss->load('http://www.fifa.com/worldcup/russia2018/news/rss.xml');
//       
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {
            $item = array(
                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            );
            array_push($feed, $item);
        }
        
        ?> 

            <?php
            //ciclo em que mostra um limite de notícias = 3
            $limit = 3;
            for ($x = 0; $x < $limit; $x++) {
                $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
                $link = $feed[$x]['link'];
                $description = $feed[$x]['desc'];
                $date = date(' F j, Y ', strtotime($feed[$x]['date']));

                echo '<p><strong><a href="' . $link . '" title="' . $title . '">' . $title . '</a></strong><br />';
                echo '<small><em>Posted on' . $date . '</em></small></p></br>';
                echo '<p>' . $description . '</p>';
            }
            ?> 