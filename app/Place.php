<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Place extends Model
{
    //

    protected $fillable = [
        'name', 'address', 'latitude', 'longitude', 'creator_id','category_id',
    ];

    public $appends = [
        'coordinate', 'map_popup_content',
    ];


    // public function getNameLinkAttribute()
    // {
    //     $title = __('app.show_detail_title', [
    //         'name' => $this->name, 'type' => __('outlet.outlet'),
    //     ]);
    //     $link = '<a href="'.route('outlets.show', $this).'"';
    //     $link .= ' title="'.$title.'">';
    //     $link .= $this->name;
    //     $link .= '</a>';

    //     return $link;
    // }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }

    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Nama Tempat').':</strong><br>'.$this->name.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Jenis').':</strong><br>'.Category::find($this->category_id)->name.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Koordinat').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
