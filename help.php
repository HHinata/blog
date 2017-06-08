<?php
function judge($x)
{
    if(strlen($x)>10||strlen($x)<6) return 1;
    for($y=0;$y<strlen($x);$y++)
    {
        if($x[$y]>='0'&&$x[$y]<='9'||$x[$y]>='a'&&$x[$y]<='z'||$x[$y]>='A'&&$x[$y]<='Z')
            continue;
        else return 1;
    }
    return 0;
}
function change($text,$url)
{
    echo "<script language='javascript'>";
    echo "alert('$text')";
    echo "</script>";
    echo "<script language='javascript' 
    type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>