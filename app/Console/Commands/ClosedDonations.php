<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Surveys\Form;
class ClosedDonations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'completed:donation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If the donation deadline is the same as the current time, we will end the donation.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        //현재시간과 마감시간이 같은 기부단체 추출
        $now = date('Y-m-d');
        $this->formModel->whereDate('closed_at',$now)->update(['is_achieved' => 1]);
    }
}
