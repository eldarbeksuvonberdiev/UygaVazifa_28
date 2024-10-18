<?php
namespace App\Models;


interface Crud{

    public function conecction();
    public function all();
    public function show($id);
    public function create();
    public function delete($id);
    public function update($data,$id);
}

?>