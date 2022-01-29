<?php

/**
 *
 * Задача 3.
 *
 * @param $customer_ids
 * @return array
 */
function get_customers($customer_ids)
{
    $customer_ids = explode(',', $customer_ids);
    $customer_new_ids = '';
    $data = [];

    foreach ($customer_ids as $key => $customer_id) {

        // To be sure that every value is integer
        // and combine them all for not to call to to db for every single number
        // and call one time for all numbers.
        // If we have empty values there is no need to open mysql connection and close it.

        $customer_id = (int)$customer_id;
        if ($customer_id > 0) {
            $customer_new_ids .= $customer_id . ',';
        }
    }

    $customer_new_ids = rtrim($customer_new_ids, ',');
    if (!empty($customer_new_ids)) {
        $db = mysqli_connect("localhost", "root", "password", "db_name");
        $sql = $db->prepare("SELECT * FROM customers WHERE id IN ($customer_new_ids)");
        $sql->execute();

        $result = $sql->fetchAll();
        foreach ($result as $item) {
            $data[$item['id']] = $item['customer_name'];
        }
        mysqli_close($db);
    }

    return $data;
}
