<?php
function Judge($x)  //判断x字符串是否是合法的
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
function Pop_info($text) //弹窗输出信息
{
    echo "<script language='javascript'>";
    echo "alert('$text')";
    echo "</script>";
}
function Jump_page($url)  //跳转页面
{
    echo "<script language='javascript' 
    type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>