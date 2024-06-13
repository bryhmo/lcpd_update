<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeBoardMessageModel extends Model
{
    protected $table = 'notice_board_message';
    use HasFactory;

    static public function DeleteRecord($id)
    {
        NoticeBoardMessageModel::where('notice_board_id', '=',$id)->delete();
    }
}
