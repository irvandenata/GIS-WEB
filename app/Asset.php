<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['nama', 'subpotensi_id', 'potensi_id', 'kecamatan_id', 'kabupaten_id', 'desa_id', 'deskripsi', 'latitude', 'longitude'];



    public $appends = [
        'search',
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

    public function subpotensi()
    {
        return $this->belongsTo(Subpotensi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    public function potensi()
    {
        return $this->belongsTo(Potensi::class);
    }


    // public function getCoordinateAttribute()
    // {
    //     if ($this->latitude && $this->longitude) {
    //         return $this->latitude.', '.$this->longitude;
    //     }
    // }

    public function getSearchAttribute()
    {
        $cardAttribute = '';
        $cardAttribute .= ' <li class="list-group-item">Desa Berlistrik, Temajok, Paloh, Sambas</li>';

        // $card .= '<div class="my-2"><strong>'.__('Koordinat').':</strong><br>'.$this->coordinate.'</div>';

        return $cardAttribute;
    }
}
