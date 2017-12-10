<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * app\NoteElement
 *
 * @property string $id
 * @property string $note_id
 * @property string $type
 * @property string $heading
 * @property string $content
 * @property string $content_plain
 * @property int $order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static Builder|\App\Block whereId($value)
 * @method static Builder|\App\Block whereNoteId($value)
 * @method static Builder|\App\Block whereType($value)
 * @method static Builder|\App\Block whereHeading($value)
 * @method static Builder|\App\Block whereContent($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Block onlyTrashed()
 * @method static bool|null restore()
*/
class Block extends Model
{
    // Возможные типы блоков
    const TYPE_TEXT = 'text';

    const TYPE_IMPORTANT = 'important';

    const TYPE_CODE = 'code';

    const TYPE_TASK = 'task';

    const TYPE_LITERATURE = 'literature';

    const TYPE_PICTURE = 'picture';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order', 'heading', 'content',
        'type'
    ];

    /**
     * Получить записку, к которой относится блок
     */
    public function note()
    {
        return $this->belongsTo('App\Note', 'note_id');
    }

    /**
     * Экранировать опасные символы в записываемом контенте
     *
     * @param string $value
     */
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = htmlspecialchars($value, ENT_HTML5);
    }

    /**
     * Вывести контент кода, заменяя переводы строки на <br>
     *
     * @param string $value
     * @return string
     */
    public function getContentAttribute($value)
    {
        if ($this->type == 'code') {
            $code = $value;
            $reform_code ='';

            while(!blank($code)) {
                if(strpos($code, PHP_EOL) == false) {
                    $temp = $code;
                    $code = '';
                } else {
                    $temp = strstr($code, PHP_EOL, true);
                    $code = strstr($code, PHP_EOL, false);
                    if (strlen($code) > 1) {
                        $code = substr($code, 1);
                    } else {
                        $code = '';
                    }
                }

                $padding = 0;
                while (substr($temp, 0, 1) == ' ') {
                    if (strlen($temp) > 1) {
                        $temp = substr($temp, 1);
                    }
                    $padding++;
                }

                $padding = $padding*10;
                $temp = '<div style="padding-left: '.$padding.'px;">'.$temp;
                $temp = $temp.'</div>';

                $reform_code = $reform_code.$temp;
            }

            return $reform_code;

        } else {
            return $this->attributes['content'];
        }
    }

    /**
     * Вывести контент как есть
     *
     * @return string
     */
    public function getContentPlainAttribute()
    {
        return $this->attributes['content'];
    }
}
