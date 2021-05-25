<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

use App\Repositories\TestRepositoryInterface;
use App\Requests\PostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    private $TestRepositoryInterface;


    public function __construct(TestRepositoryInterface $TestRepositoryInterface)
    {
        $this->TestRepositoryInterface = $TestRepositoryInterface;
    }

   
    public function index()
    {
        $data = $this->TestRepositoryInterface->get_all(request());
        
               
        // return response()->json([ 
        //         $data
        // ]);

        return new PostResource($data);
    }

    
     
    public function createPost(PostRequest $request)
    {   
        $v = $request->validated();
      
        $data = $this->TestRepositoryInterface->create($request);

        return response()->json([
            'data' =>
            [
                $data
            ],
        ]);
 
    }

    
   
    public function get_single($id)
    {
        $data = $this->TestRepositoryInterface->get_single($id);

        return response()->json([
            'data' =>
            [
                $data
            ],
        ]);
    }

    
   
    
    public function updatePost(PostRequest $request, $id)
    {  
        $validated = $request->validated();

        $data = $this->TestRepositoryInterface->update($id);
        
        return response()->json([
            'data' =>
            [
                $data
            ],
        ]);
    }

  
    public function deletePost($id)
    {
        $data = $this->TestRepositoryInterface->delete($id);

        return response()->json([
            'data' =>
            [
                $data
            ],
        ]);
    }
}
