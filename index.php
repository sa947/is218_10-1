<?php

$message = '';


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}


switch ($action) {
    case 'start_app':

       
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

       
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        
        
        if (empty($invoice_date_s) || empty($due_date_s)) {
            $message = 'Dates not entered. Please enter the dates and try again.';
            break;
        }

        try {
            $invoice_date_o = new DateTime($invoice_date_s);
            $due_date_o = new DateTime($due_date_s);
            } catch (Exception $e) {
            $message = 'Dates must be in a valid format. Please check the dates and try again.';
            break;
        }
     
        
        if ($due_date_o < $invoice_date_o) {
            $message = 'The due date must come after the invoice date. Please try again.';
            break;
        }
        
         $format_string = 'F j, Y';

     
        $invoice_date_f = 'not implemented yet';
        $due_date_f = 'not implemented yet'; 
        
      
        $current_date_f = 'not implemented yet';
        $current_time_f = 'not implemented yet';
        
       
        $due_date_message = 'not implemented yet';

        break;
}
include 'date_tester.php';
?>