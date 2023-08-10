<?php

namespace App\Console\Commands;

use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon as SupportCarbon;

class updateEntriesStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update_entries_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $stores = Store::all();
        foreach($stores as $store){
            $currentdate = Carbon::today()->format('Y-m-d');
            $formattedDate = Carbon::parse($store->stock_date)->format('Y-m-d');
            if($formattedDate  == $currentdate){
                $store->is_in_stock="in_stock";
                $store->update();
            }else {
                $store->is_in_stock="out_of_stock";
             $store->update();
            }

        }
    }
}
