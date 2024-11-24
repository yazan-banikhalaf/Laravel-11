<?php

namespace App\Interfaces;

interface UserInterface
{
    public function all();
    public function store(array $data);
}
