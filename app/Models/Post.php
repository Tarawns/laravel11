<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['author', 'category'];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $fillters):void {
        $query->when($filters['seacrh'] ?? false, 
        fn($query, $seacrh)=>
             $query->where('title', 'like', '%' . $seacrh . '%')
        ); 

        $query->when($filters['category'] ?? false, 
        fn($query, $category)=>
             $query->whereHas('category',fn($query) => $query -> where('slug', $category))
        );

        $query->when($filters['author'] ?? false, 
        fn($query, $author)=>
             $query->whereHas('author',fn($query) => $query -> where('username', $author))
        );
    }
}

// ini metode yg sebelumnya
// public static function all() {
//         return [
//             [
//                 'id' => 1,
//                 'slug' => 'judul-artikel-1',
//                 'title' => 'Judul Artikel 1',
//                 'author' => 'Penulis',
//                 'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint sapiente totam placeat facilis, assumenda voluptatem tempora? Fuga autem nam nesciunt at tempore consequuntur, libero quia dolore laborum enim quis hic.'
//             ],
//             [
//                 'id' => 2,
//                 'slug' => 'judul-artikel-2',
//                 'title' => 'Judul Artikel 2',
//                 'author' => 'Penulis',
//                 'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores id eos doloremque maxime ea pariatur est deserunt expedita amet esse, perspiciatis accusantium consequuntur velit, delectus provident molestiae aliquid aliquam deleniti!'
//             ]
            
//             ];
//     }

// public static function find($slug):array 
// {
// pake use untuk menarik variable yang diluar
//ini metode callback
    // return Arr::first(static::all(), function($post) use ($slug) {
    //     return $post['slug'] == $slug;
    // });

//ini metode arrowfunction
//     $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug );
//     if(! $post ) {
//         abort(404);
//     }
//     return $post;
// } -->