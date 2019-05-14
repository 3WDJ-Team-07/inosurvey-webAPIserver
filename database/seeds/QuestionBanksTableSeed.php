<?php

use Illuminate\Database\Seeder;
use App\Models\Surveies\QuestionBank;

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
                'survey_title' => "()는 귀하의 질병을 치료할 때에 얼마나 도움이 됩니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '매우 도움이 된다.'),
                        array('value' => '도움이 된다.'),
                        array('value' => '도움이 되지 않는다.'),
                        array('value' => '매우 도움이 되지 않는다.'),
                        ),
                    ),

                    
            $questions = array(
                'survey_title' => "지난 12개월 동안 의료와 관계된 질문으로 정상 진료 시간 이후에 ()에게 전화하신적이 있습니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '네.'),
                        array('value' => '아니오.'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "귀하를 위한 최선의 의료 결정을 내리는 데 있어 ()을/를 얼마나 신뢰하십니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '매우 신뢰한다.'),
                        array('value' => '신뢰한다.'),
                        array('value' => '신뢰하지 않는다.'),
                        array('value' => '매우 신뢰하지 않는다.'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "귀하는 보통 ()간 보건의료에 얼마를 지출하십니까? (건강보험료, 공제액, 병원비, 기타 의료비, 치과비, 안과비, 약품 등 모든 보건의료 관련 비용을 계산하세요.)",
                    'values' =>array( 
                        '1년',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '100만원 이하'),
                        array('value' => '100만원 ~ 300만원'),
                        array('value' => '300만원 ~ 600만원'),
                        array('value' => '600만원 ~ 1000만원'),
                        array('value' => '1000만원 이상'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "귀하는 ()를 친지나 친구들에게 추천하십니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '매우 추천한다.'),
                        array('value' => '추천한다.'),
                        array('value' => '추천하지 않는다.'),
                        array('value' => '매우 추천하지 않는다.'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "지난 12개월 동안 ()에 몇 번이나 방문하셨습니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '방문한 적이 없다.'),
                        array('value' => '1회'),
                        array('value' => '2회~5회'),
                        array('value' => '5회~10회'),
                        array('value' => '10회 이상'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "마지막으로 ()를 방문한지 얼마나 오래 되셨습니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '1주 이내'),
                        array('value' => '1주~1개월'),
                        array('value' => '1개월~3개월'),
                        array('value' => '3개월~6개월'),
                        array('value' => '6개월~1년'),
                        array('value' => '1년 이상'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "()는 귀하가 필요로 하는 바를 얼마나 잘 경청했습니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '매우 경청했다.'),
                        array('value' => '경청했다.'),
                        array('value' => '경청하지 않았다.'),
                        array('value' => '매우 경청하지 않았다.'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "()는 사후 관리로 향후 내원 절차에 대해 얼마나 잘 설명해 드렸습니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '네.'),
                        array('value' => '아니오.'),
                        ),
                    ),


            $questions = array(
                'survey_title' => "지난 12개월 동안 검강 검진을 받은 적이 있습니까?",
                    'values' =>array( 
                        '귀하의 의료 제공자',
                        '직접입력',
                        ),
                    'items' =>array(
                        array('value' => '네.'),
                        array('value' => '아니오.'),
                        ),
                    ),
                );
            


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
