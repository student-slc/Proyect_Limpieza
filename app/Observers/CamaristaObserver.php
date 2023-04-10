<?php

namespace App\Observers;

use App\Models\Camarista;
use App\Models\Log;
use Illuminate\Http\Request;



class CamaristaObserver
{
    /**
     * Handle the Camarista "created" event.
     *
     * @param  \App\Models\Camarista  $camarista
     * @return void
     */
    public function created(Camarista $camarista)
    {
        $log= new Log();
        $log->event='Camarista created';
        $log->camarista=request('camarista');
        $log->save();
    }

    /**
     * Handle the Camarista "updated" event.
     *
     * @param  \App\Models\Camarista  $camarista
     * @return void
     */
    public function updated(Camarista $camarista)
    {
        $log= new Log();
        $log->event='Camarista updated';
        $log->camarista=request('camarista');
        $log->save();
    }

    /**
     * Handle the Camarista "deleted" event.
     *
     * @param  \App\Models\Camarista  $camarista
     * @return void
     */
    public function deleted(Camarista $camarista)
    {
        $log= new Log();
        $log->event='Camarista deleted';
        $log->camarista=$camarista->camarista;
        $log->save();
    }

    /**
     * Handle the Camarista "restored" event.
     *
     * @param  \App\Models\Camarista  $camarista
     * @return void
     */
    public function restored(Camarista $camarista)
    {
        //
    }

    /**
     * Handle the Camarista "force deleted" event.
     *
     * @param  \App\Models\Camarista  $camarista
     * @return void
     */
    public function forceDeleted(Camarista $camarista)
    {
        //
    }
}
