<?php

namespace account;

class Balance
{
    public $amount = 5000;

    public function showBalance()
    {
        echo "Account Balance: $" . $this->amount . "<br>";
    }
}
