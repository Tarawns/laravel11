<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
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