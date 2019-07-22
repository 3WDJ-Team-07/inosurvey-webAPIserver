<?php

use Illuminate\Database\Seeder;
use App\Models\Surveys\QuestionBank;

class QuestionBanksTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\Surveies\QuestionBank::class,10)->create();
    

        $data = array(

            $questions = array(
                'survey_title' => "()は貴下の疾病を治療する時にいくら役に立ちますか?",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => '非常に役立つ。'),
                        array('value' => '役に立つ。'),
                        array('value' => '役に立たない'),
                        array('value' => 'あまり役に立たない'),
                        ),
                    ),

                    
            $questions = array(
                'survey_title' => "この12ヵ月間、医療と関係された質問として首脳診療時間以降に()に電話したことがありますか?",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => 'はい。'),
                        array('value' => 'いいえ。'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "貴下のための最善の医療決定を下すにあたって,()をどれほど信頼されますか。",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => '非常に信頼する。'),
                        array('value' => '信頼する。'),
                        array('value' => '信頼しない。'),
                        array('value' => '非常に信頼しない。'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "貴下は普通()間の保健医療にいくらをお支払いですか。 (健康保険料,控除額,病院費,その他の医療費,歯科費,眼科費,薬品などすべての保健医療関連費用を計算してください。)",
                    'values' =>array( 
                        '1年',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => '10万円以下'),
                        array('value' => '10万円 ~ 30万円'),
                        array('value' => '30万円 ~ 60万円'),
                        array('value' => '60万円 ~ 100万円'),
                        array('value' => '100만원 이상'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "あなたは()を親戚か友人に推薦しますか?",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => '非常に推薦する。'),
                        array('value' => '推薦する。'),
                        array('value' => '推薦しない。'),
                        array('value' => 'あまりお勧めしない。'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "この12ヶ月間()に何度も訪問しましたか?",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => '訪れたことがない。'),
                        array('value' => '1回'),
                        array('value' => '2回~5回'),
                        array('value' => '5回~10回'),
                        array('value' => '10回以上'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "最後に()を訪問してからどのぐらい経ちましたか。",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => '1週間以内'),
                        array('value' => '1週間~1ヵ月'),
                        array('value' => '1ヵ月~3ヵ月'),
                        array('value' => '3ヵ月~6ヵ月'),
                        array('value' => '6ヵ月~1年'),
                        array('value' => '1年以上'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "は貴下が必要とすることをどんなによく聴きましたか。",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => '非常に傾聴した。'),
                        array('value' => '傾聴した.'),
                        array('value' => '傾聴しなかった。'),
                        array('value' => '傾聴はしなかった。'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "は事後管理で,今後の来院手続きについてどのくらいよく説明しましたか。",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => 'はい。'),
                        array('value' => 'いいえ。'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "この12ヵ月間、ゴムカン検診を受けたことがありますか?",
                    'values' =>array( 
                        '貴下の医療提供者',
                        '直接入力',
                        ),
                    'items' =>array(
                        array('value' => 'はい。'),
                        array('value' => 'いいえ。'),
                        ),
                    ),
                );



        // $data = array(

        //     $questions = array(
        //         'survey_title' => "()는 귀하의 질병을 치료할 때에 얼마나 도움이 됩니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '매우 도움이 된다.'),
        //                 array('value' => '도움이 된다.'),
        //                 array('value' => '도움이 되지 않는다.'),
        //                 array('value' => '매우 도움이 되지 않는다.'),
        //                 ),
        //             ),

                    
        //     $questions = array(
        //         'survey_title' => "지난 12개월 동안 의료와 관계된 질문으로 정상 진료 시간 이후에 ()에게 전화하신적이 있습니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '네.'),
        //                 array('value' => '아니오.'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "귀하를 위한 최선의 의료 결정을 내리는 데 있어 ()을/를 얼마나 신뢰하십니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '매우 신뢰한다.'),
        //                 array('value' => '신뢰한다.'),
        //                 array('value' => '신뢰하지 않는다.'),
        //                 array('value' => '매우 신뢰하지 않는다.'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "귀하는 보통 ()간 보건의료에 얼마를 지출하십니까? (건강보험료, 공제액, 병원비, 기타 의료비, 치과비, 안과비, 약품 등 모든 보건의료 관련 비용을 계산하세요.)",
        //             'values' =>array( 
        //                 '1년',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '100만원 이하'),
        //                 array('value' => '100만원 ~ 300만원'),
        //                 array('value' => '300만원 ~ 600만원'),
        //                 array('value' => '600만원 ~ 1000만원'),
        //                 array('value' => '1000만원 이상'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "귀하는 ()를 친지나 친구들에게 추천하십니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '매우 추천한다.'),
        //                 array('value' => '추천한다.'),
        //                 array('value' => '추천하지 않는다.'),
        //                 array('value' => '매우 추천하지 않는다.'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "지난 12개월 동안 ()에 몇 번이나 방문하셨습니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '방문한 적이 없다.'),
        //                 array('value' => '1회'),
        //                 array('value' => '2회~5회'),
        //                 array('value' => '5회~10회'),
        //                 array('value' => '10회 이상'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "마지막으로 ()를 방문한지 얼마나 오래 되셨습니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '1주 이내'),
        //                 array('value' => '1주~1개월'),
        //                 array('value' => '1개월~3개월'),
        //                 array('value' => '3개월~6개월'),
        //                 array('value' => '6개월~1년'),
        //                 array('value' => '1년 이상'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "()는 귀하가 필요로 하는 바를 얼마나 잘 경청했습니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '매우 경청했다.'),
        //                 array('value' => '경청했다.'),
        //                 array('value' => '경청하지 않았다.'),
        //                 array('value' => '매우 경청하지 않았다.'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "()는 사후 관리로 향후 내원 절차에 대해 얼마나 잘 설명해 드렸습니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '네.'),
        //                 array('value' => '아니오.'),
        //                 ),
        //             ),


        //     $questions = array(
        //         'survey_title' => "지난 12개월 동안 검강 검진을 받은 적이 있습니까?",
        //             'values' =>array( 
        //                 '귀하의 의료 제공자',
        //                 '직접입력',
        //                 ),
        //             'items' =>array(
        //                 array('value' => '네.'),
        //                 array('value' => '아니오.'),
        //                 ),
        //             ),
        //         );
            


            // $questions = array(
            //     'survey_title' => "지난 12개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),
        

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

                    
            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),
            
            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),
                            
                            
            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),
                    

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),
                    

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),


            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),
                    

            // $questions = array(
            //     'survey_title' => "지난 26개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            //         'values' =>array( 
            //             '귀하의 의료 제공자',
            //             '직접입력',
            //             ),
            //         'items' =>array(
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             array('value' => '귀하의 의료 제공자'),
            //             ),
            //         ),

    
            foreach($data as $rs){ 
                QuestionBank::create(['questions' => $rs]);
             } 
    }
}
