<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageAttachment extends Model
{
    /** @use HasFactory<\Database\Factories\MessageAttachmentFactory> */
    use HasFactory;

    protected $fillable = [
        'message_id',
        'name',
        'path',
        'category',
        'type',
        'size',
    ];
    protected array $categoryMap = [
        'pdf' => 'document',
        'csv' => 'document',
        'doc' => 'document',
        'docx' => 'document',
        'xls' => 'document',
        'xlsx' => 'document',
        'ppt' => 'document',
        'pptx' => 'document',
        'txt' => 'document',
        'jpg' => 'image',
        'jpeg' => 'image',
        'png' => 'image',
        'gif' => 'image',
        'bmp' => 'image',
        'svg' => 'image',
    ];

    protected function setPathAttribute($value)
    {
        $this->attributes['path'] = $value;
        $extension = pathinfo($value, PATHINFO_EXTENSION);
        if (empty($this->getAttribute('type'))) {
            $this->attributes['type'] = $extension;
        }
        if (empty($this->getAttribute('category'))) {
            $this->attributes['category'] = $this->categoryMap[$extension] ?? 'unknown';
        }
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
