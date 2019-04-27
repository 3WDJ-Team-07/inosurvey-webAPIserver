<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Surveies\Form;

class ClosedSurveys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'completed:survey';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If the survey deadline expires, complete the survey.';

    /**
     * Create a new command instance.
     *
     * @return void
     */

     private $formModel = null;
    public function __construct()
    {
        $this->formModel = new Form();

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    //현재시간과 마감시간이 같은 설문폼을 추출
        $now = date('Y-m-d');
        $this->formModel->whereDate('closed_at',$now)->update(['is_completed' => 1]);
    }
}
