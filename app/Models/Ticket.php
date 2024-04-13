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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dateForHumans()
    {
        return $this->created_at->format(
            $this->created_at->year === now()->year
                ? 'M d, g:i A' : 'M d, Y, g:i A'
        );
    }
}
