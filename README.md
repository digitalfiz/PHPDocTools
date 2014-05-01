# PHPDocTools

This is a set of convenience classes to make working with files like CSV and JSON files easier and more consistent.

## Reading JSON
With the JSON loader you have 2 options for loading the file.

**Force entire thing to an array**

```php
$file = new DocTools\Loaders\JSON('example_files/example.json', true); // Second parameter forces to array
```

**This will produce:**

```
Array
(
    [0] => Array
        (
            [ProductName] => Pizza
            [Category] => 1
            [Price] => 3.99
            [Cost] => 1.45
        )

    [1] => Array
        (
            [ProductName] => Cake
            [Category] => 1
            [Price] => 1.50
            [Cost] => 0.50
        )

)
```

**Don't force entire thing to an array :P**

```php
$file = new DocTools\Loaders\JSON('example_files/example.json');
```

**This will produce:**

```
Array
(
    [0] => stdClass Object
        (
            [ProductName] => Pizza
            [Category] => 1
            [Price] => 3.99
            [Cost] => 1.45
        )

    [1] => stdClass Object
        (
            [ProductName] => Cake
            [Category] => 1
            [Price] => 1.5
            [Cost] => 0.5
        )

)
```

## Reading CSV
With the CSV loader you have the option to use the first row and the array key values.


**Example with first row as key values**

```php
$file = new DocTools\Loaders\CSV('example_files/example.csv', true); // Second paremeter says use first row for keys
```


**This will produce:**

```
Array
(
    [0] => Array
        (
            [ProductName] => Pizza
            [Category] => 1
            [Price] => 3.99
            [Cost] => 1.45
        )

    [1] => Array
        (
            [ProductName] => Cake
            [Category] => 1
            [Price] => 1.50
            [Cost] => 0.50
        )

)
```


**Example just turning CSV to an array with numeric keys**

```php
$file = new DocTools\Loaders\CSV('example_files/example.csv');
```

**This will produce:**

```
Array
(
    [0] => Array
        (
            [0] => ProductName
            [1] => Category
            [2] => Price
            [3] => Cost
        )

    [1] => Array
        (
            [0] => Pizza
            [1] => 1
            [2] => 3.99
            [3] => 1.45
        )

    [2] => Array
        (
            [0] => Cake
            [1] => 1
            [2] => 1.50
            [3] => 0.50
        )

)
```