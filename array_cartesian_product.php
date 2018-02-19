<?php

function array_cartesian_product(...$items): array
{
    if (empty($items)) {
        return [];
    }

    if (count($items) == 1) {
        foreach ((array) $items[0] as $value) {
            $result[] = (array) $value;
        }
    } else {
        foreach ((array) $items[0] as $value) {
            foreach (array_cartesian_product(...array_slice($items, 1)) as $values) {
                array_unshift($values, $value);
                $result[] = $values;
            }
        }
    }

    return $result ?? [];
}

$values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King', 'Ace'];
$colors = ["Hearts", "Tiles", "Clovers", "Spades"];

$cards  = array_map('implode', array_cartesian_product($values, ' of ', $colors));

shuffle($cards);

var_dump(array_pop($cards));
