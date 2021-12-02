<?php

$page = $_GET ['page']??'';

if ($page === ''|| $page === 'Blog'){
    include 'view/view_index.php';
}

elseif($page === 'Blog Beitrag erstellen'){
    include 'view/view_createpost.php';
}

elseif($page === 'Andere Blogs'){
    include 'view/view_otherblogs.php';
}

else{
    echo '404 Page not found.';
}

?>