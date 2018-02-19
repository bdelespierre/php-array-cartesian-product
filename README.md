# php-array-cartesian-product

[Cartesian product](https://en.wikipedia.org/wiki/Cartesian_product) implementation in PHP

## Function

```PHP
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
```

## Example

```PHP
$a = ['x', 'y', 'z'];
$b = [1 , 2 , 3];

// prints [["x",1],["x",2],["x",3],["y",1],["y",2],["y",3],["z",1],["z",2],["z",3]]
echo json_encode(array_cartesian_product($a, $b));
```

```PHP
$values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King', 'Ace'];
$colors = ["Hearts", "Tiles", "Clovers", "Spades"];
$cards  = array_map('implode', array_cartesian_product($values, ' of ', $colors));

shuffle($cards);
echo array_pop($cards); // e.g. "6 of Hearts"
```
