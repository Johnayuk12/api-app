<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PostCollection;
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
        
        return new PostCollection($data);
    }

    
     
    public function createPost(PostRequest $request)
    {   
        $v = $request->validated();
      
        $data = $this->TestRepositoryInterface->create($request);

        return new PostResource($data);
 
    }

    
   
    public function get_single($id)
    {
        $data = $this->TestRepositoryInterface->get_single($id);

        if (!$data)
        {
            return response()->json(['error' => 'No post with the ID'], 404);
        }
        return new PostResource($data);

    }

    
    
    public function updatePost(PostRequest $request, $id)
    {  
        $validated = $request->validated();

        $data = $this->TestRepositoryInterface->update($id);
    
        return new PostResource($data);
    }

  
    public function deletePost($id)
    {
        $data = $this->TestRepositoryInterface->delete($id);

        if (!$data)
        {
            return response()->json(['error' => 'No post with the ID'], 404);
        }

        return response()->json('null',204);
    }
}
