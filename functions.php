
<?php

/**
 * Array storing banking transactions.
 * 
 * @var array $transactions
 */
$transactions = [
    [
        "id" => 1,
        "date" => "2019-01-01",
        "amount" => 100.00,
        "description" => "Payment for groceries",
        "merchant" => "SuperMart",
    ],
    [
        "id" => 2,
        "date" => "2020-02-15",
        "amount" => 75.50,
        "description" => "Dinner with friends",
        "merchant" => "Local Restaurant",
    ],
];

/**
 * Calculates the total amount of all transactions.
 *
 * @param array $transactions The array of transactions.
 * @return float The total amount of all transactions.
 */
function calculateTotalAmount(array $transactions): float
{
    return array_reduce($transactions, function ($sum, $transaction) {
        return $sum += $transaction['amount'];
    });
}

/**
 * Finds a transaction by a part of its description.
 *
 * @param string $descriptionPart The keyword to search for in transaction descriptions.
 * @return array|string The matching transaction or an error message if not found.
 */
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

    echo "Finding transaction by description part: <pre>";
    print_r(findTransactionByDescription("friends"));
    echo "</pre>";

/**
 * Finds a transaction by its unique ID.
 *
 * @param int $id The ID of the transaction to find.
 * @return array The found transaction(s).
 */
function findTransactionById(int $id){
    global $transactions;
    
    $foundId = array_filter($transactions, function ($transaction) use ($id) {
        if($transaction['id'] == $id){
            return $transaction;
        };
    });

    return !empty($foundId) ? $foundId : "The transaction with given id does not exist!";
}

    echo "Finding transaction by ID: <pre>";  
    print_r(findTransactionById(2));
    echo "</pre>";

/**
 * Calculates the number of days since a given transaction date.
 *
 * @param DateTime $date The date of the transaction.
 * @return string The number of days since the transaction.
 */   
function daysSinceTransaction(DateTime $date)
{
    $today = new DateTime("now");
    $interval = $today->diff($date);

    return $interval->format('%a days');
}

/**
 * Adds a new transaction to the transactions list.
 *
 * @param int $id The unique identifier for the transaction.
 * @param string $date The date of the transaction in YYYY-MM-DD format.
 * @param float $amount The amount of the transaction.
 * @param string $description The description of the transaction.
 * @param string $merchant The name of the merchant.
 * @return void
 */
function addTransaction(int $id, string $date, float $amount, string $description, string $merchant): void
{
    global $transactions;

    $transaction = [
        'id' => $id,
        'date' => $date,
        'amount' => $amount,
        'description' => $description,
        'merchant' => $merchant
    ];

    array_push($transactions, $transaction);
}

addTransaction(3, "2019-05-10", 120.75, "Grocery shopping", "SuperMart");

/**
 * Sorts transactions by date in ascending order.
 *
 * @param array &$transactions The array of transactions (passed by reference).
 * @return void
 */
function sortTransactionByDate(array &$transactions)
{

    usort($transactions, function ($currentTransaction, $nextTransaction) {
        return $currentTransaction['date'] <=> $nextTransaction['date'];
    });
}

echo "Sorting by date: <pre>";  
sortTransactionByDate($transactions);
print_r($transactions);
echo "</pre>";

/**
 * Sorts transactions by amount in descending order.
 *
 * @param array &$transactions The array of transactions (passed by reference).
 * @return void
 */
function sortTransactionByAmountDesc(array &$transactions){

    usort($transactions, function($currentTransaction, $nextTransaction){

        return $nextTransaction['amount'] - $currentTransaction['amount'];
    });
}

echo "Sorting by amount in descending order: <pre>";  
    sortTransactionByAmountDesc($transactions);
    print_r($transactions);
    echo "</pre>";

