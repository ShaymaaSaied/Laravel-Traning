<?php
/**
 * Created by PhpStorm.
 * User: Shaymaa
 * Date: 04/03/2019
 * Time: 21:04
 */

namespace App\Billing;


class Stripe
{

    protected $key;

    public function __construct($key)
    {
        $this->key=$key;
    }
}