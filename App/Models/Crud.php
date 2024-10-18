<?php

namespace App\Models;


interface Crud
{

    public function connection();
    public function all();
    public function show($id);
    public function create($data);
    public function delete($id);
    public function update($data, $id);
}
