<?php
namespace App;
  class helper{

  
    public static function formatdate($value,$format)
        {
            if (!empty($value)) {
                $timestamp = strtotime($value);
                if ($timestamp !== false) {
                    return date($format, $timestamp);
                }
            }
            return 'Date of Birth Not Selected';
        }
    }


?>