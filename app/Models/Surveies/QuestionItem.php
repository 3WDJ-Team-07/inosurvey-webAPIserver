<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;
/**
 * 클래스명:                       QuestionItem
 * @package                       App\Http\Models\Surveies\QuestionItem
 * 클래스 설명:                    question_item테이블 쿼리 및 관계 정의
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1701037 김민영
 * 만든날:                        2019년 3월 26일
 *
 * 함수 목록
 * register(회원정보) :           회원정보 요청을 받아 유저 지갑 생성 및 회원등록
 */
class QuestionItem extends Model
{
    use ModelScopes;
    
    public $timestamps = false;
    protected $fillable = [

        'content',
        'content_number',
        'content_image',
        'question_id',
    
    ];

    //questions테이블 questionItems테이블 1-N
    public function question(){
        return $this->belongsTo('App\Models\Surveies\Question');
    } 


    //response테이블 questionItems테이블 N-N(중간 테이블 item_response)
    public function responses(){
        return $this->belongsToMany('App\Models\Surveies\Response','item_response','item_id','response_id');
    }  
    
    public function updateImg($itemId, $img){
        return $this->find($itemId)->update(['content_image' => $img]);
    }
   
}
