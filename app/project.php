<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
      protected $fillable = [
                "title",
                "description",
                "git_url",
                "time"
            ];
            
    protected $primaryKey = 'project_id';
}
