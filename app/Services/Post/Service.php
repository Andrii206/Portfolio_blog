<?php 

    namespace App\Services\Post;

    use App\Models\Post;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;
    
    class Service{
        public function store($data){
            try{
                Db::beginTransaction();
                if(isset($data['image'])){
                    $data['image'] = Storage::disk('public')->put('/images', $data['image']);
                }
                if(isset($data['tag_ids'])){
                    $tagIds = $data['tag_ids'];
                    unset($data['tag_ids']);
                }
               
        
                $post = Post::firstOrCreate($data);
                $post -> tags() -> attach($tagIds);

                DB::commit();
             
            } catch(\Exception $exception){
                DB::rollBack();
                abort(500);
            }
        }
        public function updata($data, $post){
            try{
                Db::beginTransaction();
                if(isset($data['image'])){
                    $data['image'] = Storage::disk('public')->put('/images', $data['image']);
                }
                if(isset($data['tag_ids'])){
                    $tagIds = $data['tag_ids'];
                    unset($data['tag_ids']);
                }
               
                $post->update($data);
                $post -> tags() -> attach($tagIds);

                DB::commit();
             
            } catch(\Exception $exception){
                DB::rollBack();
                abort(500);
            }
            return $post;
        }
    }
?>