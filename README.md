# Arrays and functions

## Installation and Project Launch Instructions
 
### Step 1: Installing PHP 

1. Download the latest version of PHP from the official website: https://www.php.net/downloads.
2. Add the PHP path to the environment variables (`Path`).
3. Verify the installation by running the following command in the terminal: `php -v`.

### Step 2: Launching the project

1. Cloning the repository:

   1.1 On GitHub, navigate to the main page of the repository.

   1.2 Above the list of files, click <> Code.
   
   1.3 Copy the URL for the repository.

   1.4 Open Terminal, сhange the current working directory to the location where you want the cloned directory.

   1.5 Type `git clone`, and then paste the URL you copied earlier.

   1.6 Press Enter to create your local clone.
   
2. Navigating to the project folder in terminal: `cd [absolute-path-to-the-project-folder]`.
3. Starting the PHP server: `php -S localhost:8080`.
4. Opening the project in a browser: `http://localhost:8000/filename.php`.

## Lab's description 

This project is a banking transaction management system in PHP with features for adding, deleting, sorting, and searching transactions. It also includes file system operations to display images in a gallery format.

## Usage Examples

**Sorting transactions**

*usort* — Sort an array by values using a user-defined comparison function

My comparison function receives two arguments: `$currentTransaction` and `$nextTransaction`, which represent two elements of the array that need to be compared.

Spaceship Operator (`<=>`):
- This operator returns:
  - -1 if the left-hand side (`$currentTransaction['date']`) is less than the right-hand side (`$nextTransaction['date']`).
  - 0 if both sides are equal.
  - 1 if the left-hand side is greater than the right-hand side.

    ```php
    
        function sortTransactionByDate(array &$transactions)
        {

            usort($transactions, function ($currentTransaction, $nextTransaction) {
                return $currentTransaction['date'] <=> $nextTransaction['date'];
            });
        }
    
    ```

<img scr="docs-images/sorting.png">

**Finding by description's part**

The `explode()` function splits the description string into an array of words by using a space `' '` as the delimiter. 

>For example, if the description is "Dinner with friends", it will return an array: 
>["Dinner", "with", "friends"].

The `in_array()` function checks if $descriptionPart is found in the array of words resulting from `explode()`. If it finds the $descriptionPart in the transaction's description, it returns true, and the current transaction is returned.

   ```php
        function findTransactionByDescription(string $descriptionPart)
        {
            global $transactions;

            foreach ($transactions as $transaction) {

                if (in_array($descriptionPart, explode(' ', $transaction['description']))) {
                    return $transaction;
                }
            }
            return "The transaction with given description part does not exist!";
        }

        print_r(findTransactionByDescription("friends"));
   ```

<img scr="docs-images/description.png">

## Control Q

1. What is the array in PHP?

An array in PHP is actually an ordered map. A map is a type that associates values to keys. This type is optimized for several different uses; it can be treated as an array, list (vector), hash table (an implementation of a map), dictionary, collection, stack, queue, and probably more.

    array(
        key  => value,
        key2 => value2,
        key3 => value3,
        ...
    )

2. How does an array can be created? 

 - You can create arrays by using the `array()` function: `$cars = array("Volvo", "BMW", "Toyota");`
 - You can also use a shorter syntax by using the [] brackets: `$cars = ["Volvo", "BMW", "Toyota"];`
 - As you can see, indexed arrays are the same as associative arrays, but associative arrays have names instead of numbers: 

    ```php
      $myCar = [
      "brand" => "Ford",
      "model" => "Mustang",
      "year" => 1964
      ];
    ```

 - You can declare an empty array first, and add items to it later: 

    ```php
      $cars = [];
      $cars[0] = "Volvo";
      $cars[1] = "BMW";
      $cars[2] = "Toyota";
    ```
 The same goes for associative arrays, you can declare the array first, and then add items to it:

   ```php
    $myCar = [];
    $myCar["brand"] = "Ford";
    $myCar["model"] = "Mustang";
    $myCar["year"] = 1964;
   ```

3. What is the `foreach` loop used for?

The foreach construct provides an easy way to iterate over arrays.

   ```php
        foreach (iterable_expression as $value) {
            statement_list
        }
   ```

   ```php
        foreach (iterable_expression as $key => $value) {
            statement_list
        }
   ```

## Source List

- [Function empty()](https://www.php.net/manual/en/function.empty.php)
- [Function unsort()](https://www.php.net/manual/en/function.usort.php)
- [Arrays](https://www.php.net/manual/en/function.usort.php)
- [Creating arrays in php](https://www.w3schools.com/php/php_arrays_create.asp)
- [foreach loop](https://www.php.net/manual/en/control-structures.foreach.php)
- [Arrays presentation](https://moodle.usm.md/pluginfile.php/760291/mod_resource/content/1/%28PHP%29%20Arrays.pdf)
- [Functions presentation](https://moodle.usm.md/pluginfile.php/761090/mod_resource/content/2/%28PHP%29%20Functions.pdf)

