<?php

function msgboxJS($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}



function console_log($output, $with_script_tags = true) 
{
    $js_code = 'console.log('.json_encode($output, JSON_HEX_TAG).');';
    if ($with_script_tags) 
    {
        $js_code = '<script>'.$js_code.'</script>';
    }
    echo $js_code;
}


function logDump($monologger, $someVar)
{
    ob_start();
    var_dump($someVar);
    $result = ob_get_clean();
    $monologger->error($result);
}





?>