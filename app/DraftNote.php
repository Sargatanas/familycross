<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * app\Note
 *
 * @mixin \Eloquent
 * @property string $id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static Builder|\App\Note whereId($value)
 * @method static Builder|\App\Note whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Note onlyTrashed()
 * @method static bool|null restore()
 */
class DraftNote extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'draft_notes';
}
