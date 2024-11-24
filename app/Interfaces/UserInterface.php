<?php

namespace App\Interfaces;

interface UserInterface
{
    public function all();
    public function store(array $data);

    public function find($id);
}
