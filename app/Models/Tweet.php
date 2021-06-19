<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Tweet extends Model
{
    use HasFactory;
    //O SoftDelete faz com que nao somente o registro seja apagado, mas como também os seus filhos.

    protected $fillable = [
        'id_usuario',
        'tweet',
        'titulo'
    ];

    public static function buscarTodosTweets(int $id)
    {
        //return self::where('id_usuario', $id)->get();

        return DB::table('tweets')
                ->select(DB::raw('tweets.id, tweets.id_usuario, tweets.tweet, tweets.created_at, tweets.titulo, users.apelido'))
                ->leftJoin('users', 'tweets.id_usuario', '=', 'users.id')
                ->where('tweets.id_usuario', '=', $id)
                ->orderByDesc('tweets.id')
                ->get();
    }
}
