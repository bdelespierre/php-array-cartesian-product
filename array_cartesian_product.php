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
