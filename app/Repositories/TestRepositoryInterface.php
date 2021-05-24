<?php

namespace App\Repositories;

use App\Requests\PostRequest;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


interface TestRepositoryInterface
{
    

   public function get_all();
   

   public function get_single($id);


   public function create(Request $request);


   public function update($id);


   public function delete($id);

}
