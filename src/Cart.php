<?php
  namespace PrincessFoxx\PhpunitTesting;

  class Cart
  {
    public float $price;
    public static float $tax = 1.2;

    public function getNetPrice()
    {
      return $this->price * self::$tax;
    }

    public function AddToPrice(int $amount)
    {
      $this->price += $amount;
    }
  }