<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use HasUlids;

    protected $guarded = ['id'];

    public function generateTags(): array
    {
        return [
            'department'
        ];
    }
}
