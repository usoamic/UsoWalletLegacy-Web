<?php
$type = get_get_value('type');
function getErrorText($type) {
    switch ($type) {
        case 403:
            $str = "You are not authorised to view this page or directory";
            break;
        case 404:
            $str = "The requested file or directory was not found";
            break;
        case 500:
            $str = "The server encountered a problem and was unable to fulfill the request";
            break;
        case 510:
            $str = "High Usage Limit";
            break;
        default:
            $str = "Unknown error";
            break;
    }
    return $str;
}
?>

<main role="main" class="container">
    <div class="my-3 p-3 card">
        <h6 class="border-bottom border-gray pb-2 mb-0"><?='Error '.$type?></h6>
        <div class="pt-3 pb-2">
            <?=getErrorText((int)$type)?>
        </div>
    </div>
</main><!-- /.container -->
