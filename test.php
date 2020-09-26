<?php
header('Content-type: text/html');

$list = ['Banh khot', 'Banh xeo', 'Bun bo Hue', 'Cao lau', 'Cha ca', 'Ga tan', 'Goi cuon', 'Nem ran', 'Pho', 'Rau muong'];
$n = 4;

function splitList($list, $n) {
    $html = '<table style="width: 100%" border="1">';
    $arrayLength = count($list);
    $partLength = floor($arrayLength / $n);
    $partRemains = $arrayLength % $n;
    $partition = [];
    $startPoint = 0;

    for($i = 0; $i < $n; $i ++) {
        $incr = ($i < $partRemains) ? $partLength + 1 : $partLength;
	$partition[$i] = array_slice($list, $startPoint, $incr);
	$startPoint += $incr;
    }

    $a = 0;

    $maxRows = max(array_map(function($n) use ($a) {
        $numOfElements = count($n);

    	if ($a < $numOfElements) {
	    $a = $numOfElements;
    	}

    	return $a;
    }, $partition));

    for ($i = 0; $i < $maxRows; $i++) {
	$html .= '<tr>';
	foreach ($partition as $key => &$parts) {
	    $html .= '<td>' . array_shift($parts) . '</td>';
	}
	$html .= '</tr>';
    }

    unset($parts);

    $html .= '</table>';

    return $html;
}

echo splitList($list, $n);
