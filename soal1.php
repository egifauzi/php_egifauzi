<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";
$total = 0;
for ($a = $jml; $a > 0; $a--) {
    $sum = 0;
    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
        $sum += $b;
    }
    $total += $sum;
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td colspan='$a'>TOTAL: $sum</td>";
    echo "</tr>\n";
}
