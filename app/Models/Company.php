<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use HasUlids;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function contracts()
    {
        return $this->hasMany(Document::class);
    }

    public function generateTags(): array
    {
        return [
            'company'
        ];
    }
}
