<?php
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class Blog{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;
    public function __construct($title,$slug,$intro,$body,$date)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
        $this->date=$date;
    }
    public static function find($slug){
        $blogs=static::all();
        return $blogs->firstWhere('slug',$slug);
        // $path=resource_path("blogs/$slug.html");
        // if(!file_exists($path)){
        //     return redirect("/");
        // };
        // $blog=cache()->remember("posts.slug", 3, function() use ($path){
        //     //var_dump("file get contents");
        //     return file_get_contents($path);
        //    });
        // return $blog;
    }
    public static function findOrFail($slug){
        $blogs=static::all();
        $blog=$blogs->firstWhere('slug',$slug);
        if(!$blog){
            throw new ModelNotFoundException();
        }
        return $blog;
    }
    public static function all(){
        $files=File::files(resource_path("blogs"));
        return collect($files)
        ->map(function($file){
            $obj=YamlFrontMatter::parsefile($file);
            return new Blog($obj->title,$obj->slug,$obj->intro,$obj->body(),$obj->date);
        })
        ->sortByDesc('date');
        // $files=File::files(resource_path("blogs"));
        //  return array_map(function($file){
        //     $obj=YamlFrontMatter::parsefile($file);
        //     return new Blog($obj->title,$obj->slug,$obj->intro,$obj->body());
        // },$files);
    }

}

?>