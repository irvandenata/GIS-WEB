<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $guard = [];

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

    // public function creator()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }

 public function bangunan(){
        return $this->belongsTo(Bangunan::class);
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa(){
        return $this->belongsTo(Desa::class);
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
        $mapPopupContent .= '<div class="my-2 "><div class="row justify-content-center"><img src="'. asset('assets/images/gambar.jpg') .'" width="150px" height="150px"></div></div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Nama Tempat').':</strong><br>'.$this->nama.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Jenis').':</strong><br>'.Bangunan::find($this->bangunan_id)->nama.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('Koordinat').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
