<?php declare(strict_types=1);
define("hName","Arangattil",true);
echo hName."<br>";
$names=array("Purushothaman","Vijayakumari","Jeeshma","Sowraf");
$age=array(60,52,26,25);
$nLength=count($names);
$aLength=count($age);
for($i=0;$i<$nLength;$i++)
{
    echo $names[$i]." ".hname." ";
    if($i<$aLength)
    {
    echo "Aged"." ".$age[$i]."<br>";
    }
}
?>