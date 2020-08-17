<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['nama','bangunan_id','potensi_id','kecamatan_id','kabupaten_id','desa_id','deskripsi','latitude','longitude'];
   


    public $appends = [
       'card_asset',
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
    public function potensi(){
        return $this->belongsTo(Potensi::class);
    }


    // public function getCoordinateAttribute()
    // {
    //     if ($this->latitude && $this->longitude) {
    //         return $this->latitude.', '.$this->longitude;
    //     }
    // }

    public function getCardAssetAttribute()
    {
        $cardAttribute = '';
        $cardAttribute .= '<div class="row mb-2" onclick="showDetail()">';
        $cardAttribute .= '<div class="col-3" style="background-color: black">data</div>';
        $cardAttribute .= '<div class="col-9" style="background-color: yellow">aessefsefsefawdawdawdwadwad</div></div>';
        // $card .= '<div class="my-2"><strong>'.__('Koordinat').':</strong><br>'.$this->coordinate.'</div>';

        return $cardAttribute;
    }
}
