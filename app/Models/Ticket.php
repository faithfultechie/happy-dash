<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    use HasUlids;

    protected $guarded = ['id'];

    use HasFactory;

    public function getAttachmentListAttribute()
    {
        if ($this->attachments) {
            return explode(',', $this->attachments);
        }
        return [];
    }
}
