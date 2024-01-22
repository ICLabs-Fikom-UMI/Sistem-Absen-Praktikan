
<?php

class connectException extends  Exception {
    protected $message;

    public function __construct($message){
        $this->message = $message;
    }
}

?>