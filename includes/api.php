<?php

/*
 * All the API function to connect with the Sereni Invoicing Microservice
 */

function teamleader_api_url() {
    return "";
}

function teamleader_create_client($order_id)
{
    $order = wc_get_order($order_id);
    $order_data = $order->get_data(); // The Order data

    /*
    $client_url = teamleader_api_url().'/api/eol/client/create/' . get_option('teamleader_eol_endpoint');
    $language = get_current_language_as_number();
    $full_name = $order_data['billing']['first_name'] . ' ' . $order_data['billing']['last_name'];

    if ($order_data['billing']['company'] != "") {
        $full_name = $order_data['billing']['company'] . ' | ' . $full_name;
    }

    $create_client_array =  array(
        "DIVISION" => get_option('teamleader_eol_division'), // ADMINISTRATIE
        "client" => array(
            'NAME' => $full_name,
            'EMAIL' => $order_data['billing']['email'],
            'PHONE' => $order_data['billing']['phone'],
            'VATCODE' => null,
            'STREETANDHOUSENUMBER' => $order_data['billing']['address_1'] . ' ' . $order_data['billing']['address_2'],
            'POSTALCODE' => $order_data['billing']['postcode'],
            'CITY' => $order_data['billing']['city'],
            'COUNTRY' => $order_data['billing']['country']
        ),
        'Language' => $language // 1 = NL, 2 = FR
    );
    $client_response = teamleader_api_call('POST', $client_url, json_encode($create_client_array));

    if (!isset($client_response['ClientID'])) {
        write_log(json_encode($client_response));
    }

    $client_id = $client_response['ClientID'];
    return $client_id;*/
}

function teamleader_create_invoice($client_id, $order_id)
{
    $order = wc_get_order($order_id);

    /*
    $invoice_url = teamleader_api_url().'/api/eol/invoice/create/' . get_option('teamleader_eol_endpoint');

    $lines = [];
    foreach ($order->get_items() as $item_key => $item) {
        $item_data    = $item->get_data();
        $product = $item->get_product();
        $product_data = $product->get_data();
        $taxes = WC_Tax::get_rates($product->get_tax_class());
        $rates = array_shift($taxes);
        $item_rate = round(array_shift($rates));

        $lines[] = [
            'AccountNumber' => get_option('teamleader_eol_general_ledger'),
            'ProductCode' => null,
            'Description' => $product_data['description'],
            'Quantity' => $item_data['quantity'],
            'PricePerUnit' => round($product_data['price'], 2),
            'VatPercentage' => $item_rate,
            'CostCode' => get_option('teamleader_eol_costcode')
        ];
    }

    $language = get_current_language_as_string();
    $create_invoice_array = [
        'DIVISION' => get_option('teamleader_eol_division'),
        'Description' => 'W###' . get_option('teamleader_eol_costcode') . '#' . $order_id,
        'ClientID' => $client_id,
        'Journal' => get_option('teamleader_eol_journal'), // MOET NOG AANGEPAST WORDEN NAAR JOURNAAL WEBSHP
        'TransactionId' => $order->get_transaction_id(),
        'SendEmail' => get_option('teamleader_eol_send_mail') == 1 ? true : false, // TBD OOK
        'Language' => $language,
        'Lines' => $lines
    ];

    $invoice_response = teamleader_api_call('POST', $invoice_url, json_encode($create_invoice_array));

    if (!isset($invoice_response['InvoiceNumber'])) {
        write_log(json_encode($invoice_response));
    }

    $invoice_number = $invoice_response['InvoiceNumber'];
    return $invoice_number;*/
}

function teamleader_api_call($method, $url, $data)
{
    /*
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . get_option('teamleader_eol_token'),
        'Content-Type: application/json',
        'Accept: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if (!$result) {
        die("Connection Failure");
    }
    curl_close($curl);
    return json_decode($result, true);
    */
}