<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * app\Note
 *
 * @mixin \Eloquent
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $description_plain
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Block[] $blocks
 *
 * @method static Builder|\App\Note whereId($value)
 * @method static Builder|\App\Note whereTitle($value)
 * @method static Builder|\App\Note whereDescription$value)
 * @method static \Illuminate\Database\Query\Builder|\App\Note onlyTrashed()
 * @method static bool|null restore()
*/
class Note extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    /**
     * Получить все блоки текущей записки
     */
    public function blocks()
    {
        return $this->hasMany('App\Block', 'note_id')->orderBy('order');
    }

    /**
     * Получить текущую опубликоанную записку
     */
    public function publicNote()
    {
        return $this->hasOne('App\PublicNote', 'note_id');
    }

    /**
     * Найти все элементы, принадлежащие конкретной записке
     *
    */
    public function getElementsAttribute()
    {
        return $this->hasMany('App\Block', 'note_id')->orderBy('order')->get();
    }

    /**
     * Вывести дату в соответствии с таймзоной по Екатеринбургу
     *
     */
    public function getCreatedAtAttribute($value)
    {
        $date_time = new Carbon($value, config('app.timezone'));
        $date_time->timezone = 'Asia/Yekaterinburg';

        return $date_time;
    }

    /**
     * Экранировать описание записки от опасных символов
     *
     * @param string $value
    */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = htmlspecialchars($value, ENT_HTML5);
    }

    /**
     * Вывести описание записи, заменяя переводы строки на <br>
     *
     * @param string $value
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        $pattern = '/(\r\n)/i';
        $replacement = '<br>';
        return preg_replace($pattern, $replacement, $value);
    }

    /**
     * Вывести описание записи как есть в бд
     *
     * @return string
     */
    public function getDescriptionPlainAttribute()
    {
        return $this->attributes['description'];
    }
}
