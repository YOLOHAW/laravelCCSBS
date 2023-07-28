<?php
namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class Blog{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public function __construct($title,$slug,$intro,$body)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
    }
    public static function find($slug){
        $path=resource_path("blogs/$slug.html");
        if(!file_exists($path)){
            return redirect("/");
        };
        $blog=cache()->remember("posts.slug", 3, function() use ($path){
            //var_dump("file get contents");
            return file_get_contents($path);
           });
        return $blog;
    }
    public static function all(){
        $blogs=[];
        $files=File::files(resource_path("blogs"));
        foreach($files as $file){

        $obj=YamlFrontMatter::parsefile($file);
        $blog=new Blog($obj->title,$obj->slug,$obj->intro,$obj->body());
        $blogs[]=$blog;
        // $blogs=array_map(function($file){
        //     // echo "<pre>";
        //     // var_dump($file);
        //     return $file->getContents();
        // },$files);
    }
        return $blogs;
    }

}

?>