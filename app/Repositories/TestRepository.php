<?php

namespace App\Repositories;

use App\Post;

use Illuminate\Http\Request;

use App\Requests\PostRequest;
use App\Resources\PostResource;
use App\Traits\ResponseApi;

class TestRepository implements TestRepositoryInterface
{
    use ResponseApi;

   public function get_all()
   {
      
    try {
        $post = Post::orderBy('created_at','ASC')->paginate(6);
       
        return $post;
    } catch (\Exception $e) {
        // return $this->error($e->getMessage(), $e->getCode());
        return $e->getMessage();

    }

       

    //    return $post;
   }


   public function get_single($id)
   {
       try {
        $post = Post::where('id', $id)->first();

        // if (!$post) {
        //     return $this->error('No post with this ID $id', 404);
        // }

        // return $this->success('Post Detail',$post,);
        return $post;


       } catch (\Exception $e) {
        return $e->getMessage();
        // return $this->error($e->getMessage(), $e->getCode());
       }
   }


   public function create(Request $request)
   {
    //    $validated = $request->validated();
  
       try {
        $post = new Post();
        $post->title = $request['title'];
        $post->description = $request['description'];

        $post->save();
        
        // return $this->success('All Post',$post,);
        return $post;


       } catch (\Exception $e) {
            //   return $this->error($e->getMessage(), $e->getCode());
        return $e->getMessage();

       }
       
   }

   public function update($id)
   {
    

       try {
           
          $post = Post::where('id', $id)->first();

          $post->title = request('title');
          $post->description = request('description');


          $post->save();

        //   return $this->success('post updated', $post);
        return $post;


       } catch (\Exception $e) {
        // return $this->error($e->getMessage(), $e->getCode());
        return $e->getMessage();

       }
   }

   public function delete($id)
   {
      try {
        $post = Post::where('id',$id)->delete();

        // if(!$post) return $this->error("No Post with ID $id", 404);
        return $post;


      } catch (\Exception $e) {
        // return $this->error($e->getMessage(), $e->getCode());
        return $e->getMessage();

      }
    
   }  
       
    

       

}

