<?php

function sanitizeQuery($query)
{
    $query_tr = trim($query);
    $query_ss = stripslashes($query_tr);
    $query_html = htmlspecialchars($query_ss);
    return $query_html;
}

?>
