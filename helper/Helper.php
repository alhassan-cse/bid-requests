<?php

class Helper extends Connect{
     
    public function paginationDisplay($results_per_page, $page ,$sql)
    { 
        $page_first_result = ($page-1) * $results_per_page;  
        $query = $sql;
        $data = mysqli_query($this->conn, $query);  
        $count = mysqli_num_rows($data); 
        $number_of_page = ceil ($count / $results_per_page);
        $peges = '';
        for($page = 1; $page<= $number_of_page; $page++) {  
            $peges .= '<ul class="pagination"><li class="page-item"><a class="page-link" href = "index.php?page=' . $page . '">' . $page . ' </a></li></ul>';  
        }  
        return $peges ;
    }
}
?>