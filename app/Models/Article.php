<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = ['judul', 'slug', 'deskripsi', 'kategori_id', 'user_id', 'gambar_artikel', 'is_active', 'tgl_publish'];

    protected $hidden = [];

    public function categories()
    {
        return $this->belongsTo(Categorie::class, 'kategori_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
