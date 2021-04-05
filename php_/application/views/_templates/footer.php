<?php 
if (isset($amount_of_tasks) && isset($show_pages)){
if ($amount_of_tasks  > $show_pages)
{
       $r = 1;
       while ($r <= ceil($amount_of_tasks /$show_pages))
       {
           if ($r != $this_page)
           {          
                echo '<p align="center"><a href="index.php?url=tasks/index2/'.$r.'/" title="Перейти на страницу '.$r.'">'.$r.'</a></p>';
           }
           else
           {
               echo '<b>' . $r . '</b>'; // Если это текущая страница - то ссылка на саму себя не нужна
            }
            $r++;      
       }
}
}

?>
</div>
</header>
</div>
</body>

</html>