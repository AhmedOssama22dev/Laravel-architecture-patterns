<?php

namespace App\Core\Domain\Entities;

class Discount {
    private $type;
    private $fixedAmount;
    private $percentage;

    public function __construct($type, $fixedAmount = null, $percentage = null) {
        $this->type = $type;
        $this->fixedAmount = $fixedAmount;
        $this->percentage = $percentage;
    }

    public function getType() {
        return $this->type;
    }

    public function getFixedAmount() {
        return $this->fixedAmount;
    }

    public function getPercentage() {
        return $this->percentage;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setFixedAmount($fixedAmount) {
        $this->fixedAmount = $fixedAmount;
    }

    public function setPercentage($percentage) {
        $this->percentage = $percentage;
    }
}