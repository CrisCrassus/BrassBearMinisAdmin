<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table = 'configuration';

    protected $fillable = [
        'show_services',
        'show_contact',
        'featured_title'
    ];

    protected $casts = [
        'show_services' => 'boolean',
        'show_contact' => 'boolean',
        'featured_title' => 'string'
    ];

    public static function getConfiguration()
    {
        return Configuration::first();
    }

    public function services() {
        return $this->show_services;
    }

    public function contact() {
        return $this->show_contact;
    }

    public function featuredTitle() {
        return $this->featured_title;
    }
}
