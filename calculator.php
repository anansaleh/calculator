<?php
    if (count($argv) < 2) {
        print_r('Error File name argument is missed' . PHP_EOL);
        errorLog("File name argument is missed ");
        exit();
    }
    for ($i = 1; $i < count($argv); $i++) {
        if (file_exists($argv[$i])) {
            calcInputFile($argv[$i]);
        } else {
            errorLog("File: " . $argv[$i] . "is not existing");
        }
    }

    /**
     * This function get parameter file name string and parse every line for calculate
     * @param $file_name
     */
    function calcInputFile($file_name)
    {
        $file = fopen($file_name, "r");
        $result = 0;
        // check the first line if it not number then exit;
        if (feof($file)) {
            errorLog("File: " . $file_name . "is empty");
            return;
        }

        $line = trim(fgets($file));
        if (!is_numeric($line)) {
            errorLog("File: " . $file_name . " line 1 is not include number only");
            return;
        }
        $result = floatval($line);

        $line_number =1;
        // As in proposal from the 2nd line and up every line separated with operator + space + number
        while (!feof($file)) {
            $line_number ++;

            $line = fgets($file);
            // Remove the '\r' and '\n' from line;
            $line = str_replace("\r", "", $line);
            $line = str_replace("\n", "", $line);

            // if length of line is 0 the continue to the next line
            if (strlen(trim($line)) === 0) {
                errorLog("File: " . $file_name . " line ". $line_number ." is empty. " );
                continue;
            }

            // print_r($line);
            $arr = explode(" ", $line);
            // var_dump($arr);

            // check if the 2nd part of line is not number then continue to the next line
            if (!is_numeric(trim($arr[1]))) {
                errorLog("File: " . $file_name . " line ". $line_number ." not has number. [". $line. "]");
                continue;
            }
            $number = floatval($arr[1]);
            switch (strtolower(trim($arr[0]))) {
                case "add":
                    $result = $result + $number;
                    break;
                case "subtract":
                    $result -= $number;
                    break;
                case "multiply":
                    $result = $result * $number;
                    break;
                case "divide":
                    $result = $result / $number;
                    break;
                default:
                    errorLog("File: " . $file_name . " line ". $line_number ." unknown operator: " . $arr[0]);
            }

        }
        fclose($file);
        print_r("File: ". $file_name. " result :" . $result . PHP_EOL);
    }

    /**
     * This function set error log file to "my-errors.log" (if not exist it will be created) has parameter message wich will be written in the log file
     * @param $error_message
     */
    function errorLog($error_message)
    {
        // path of the log file where errors need to be logged
        $log_file = "./my-errors.log";

        // setting error logging to be active
        ini_set("log_errors", TRUE);

        // setting the logging file in php.ini
        ini_set('error_log', $log_file);

        // logging the error
        error_log($error_message);
    }

?>