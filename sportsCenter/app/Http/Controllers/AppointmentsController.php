<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use DateTime;

use function PHPSTORM_META\type;

class AppointmentsController extends Controller
{
    /* use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     *@var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME; */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCourts = array_unique(\App\Court::get()->map(function ($item, $key) {
            return $item['kind'];
        })->toArray());

        return view('reservation', compact('allCourts'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //kada je potrebno kreirati vremenski interval: [$begining-$end]
    public function appointmentInterval($begining, $end)
    {
        $interval = array($begining, $end);
        return $interval;
    }
    //Naredne tri funkcije su za jedan od nacina realizacije rezervacije termina koji je zahtjevao sortiranje intervala.
    // ovaj nacin nije iskorišten
    function sortFunc($interval1, $interval2)
    {
        $dt1 = Carbon::create($interval1[0]);
        $dt2 = Carbon::create($interval2[0]);

        if ($dt1->equalTo($dt2)) {
            return 0;
        }
        return ($dt2->lessThan($dt1)) ? 1 : -1;
    }

    public function availableTerminsByHall($termins)
    {
        $result = array();
        array_push($result, [explode(' ', $termins[0][0])[0] . " 08:00:00"]);
        return $result;
    }
    function deleteDuplicate(&$value)
    {
        for ($i = 0; $i < sizeof($value); $i++) {
            $dt1 = Carbon::create($value[$i][0]);
            $dt2 = Carbon::create($value[$i][1]);
            if ($dt1->equalTo($dt2)) {
                unset($value[$i][0]);
                unset($value[$i][1]);
            }
        }
    }
    // vraca listu listi oblika: kljucevi liste su jedinstveni id-jevi sala(halls), a vrijednosti kljuceva su liste vremenskih intervala
    // Primjer: [1=>[[20-02-2021 08:00:00, 20-02-2021 09:00:00], [20-02-2021 10:00:00, 20-02-2021 10:30:00]],
    //           3=>[[23-02-2021 08:00:00, 23-02-2021 10:00:00], [20-02-2021 10:00:00, 20-02-2021 11:30:00]]]
    public function availableTermins($arrayOfHallsAndTheirAppointments, $hallsId, $date)
    {
        $appoint = new AppointmentsController();
        $available = array_fill_keys($hallsId, []);

        foreach ($arrayOfHallsAndTheirAppointments as $key => $value) {
            foreach ($available as $k => $v) {
                if ($k == $key) {
                    foreach ($value as $i => $interval) {
                        if ($i == 0) {
                            $dt1 = Carbon::create($date." 08:00:00");
                            $dt2 = Carbon::create($interval[0]);
                            if (!$dt1->equalTo($dt2)) {
                                array_push($available[$k], [$date." 08:00:00", $interval[0]]);
                            }
                            if (sizeof($value) == 1) {
                                $dt3 = Carbon::create($interval[1]);
                                $dt4 = Carbon::create($date." 23:00:00");
                                if (!$dt3->equalTo($dt4)) {
                                    array_push($available[$k], [$interval[1], $date." 23:00:00"]);
                                }
                            }
                        } elseif ($i == sizeof($value) - 1) {
                            $dt5 = Carbon::create($value[$i - 1][1]);
                            $dt6 = Carbon::create($value[$i][0]);
                            if (!$dt5->equalTo($dt6)) {
                                array_push($available[$k], [$value[$i - 1][1], $value[$i][0]]);
                            }
                            $dt7 = Carbon::create($interval[1]);
                            $dt8 = Carbon::create($date." 23:00:00");
                            if (!$dt7->equalTo($dt8)) {
                                array_push($available[$k], [$interval[1], $date." 23:00:00"]);
                            }
                        } else {
                            $dt9 = Carbon::create($value[$i - 1][1]);
                            $dt10 = Carbon::create($value[$i][0]);
                            if (!$dt9->equalTo($dt10)) {
                                array_push($available[$k], [$value[$i - 1][1], $value[$i][0]]);
                            }
                        }
                    }
                }
            }
        }

        foreach ($available as $key => $value) {
            if(empty($value))
            {
                array_push($available[$key], [$date." 08:00:00", $date." 23:00:00"]);
            }
        }
        return $available;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAvailableAppointmentsForDateAndHall(Request $request)
    {
        $sport = $request->input('sport');
        $date = $request->input('datum');
        $sportDate = $sport."|".$date;

        $fillteredCourts = \App\Court::get()->where('kind', $sport)->toArray();
        $tempCourts = array();
        $fillteredHalls = array();
        foreach ($fillteredCourts as $fillteredCourt) {
            array_push($tempCourts, $fillteredCourt['id']);
            array_push($fillteredHalls, $fillteredCourt['hall_id']);
        }

        $allAppointments = array();
        foreach ($tempCourts as $courtId) {
            $app = \App\Appointment::get()->where('court_id', $courtId)->where('date', $date)->sortBy('begining')->toArray();
            $allAppointments = array_merge($allAppointments, $app);
        }
        $appoint = new AppointmentsController();

        foreach ($allAppointments as $appointment) {
            array_push($fillteredHalls, $appointment['hall_id']);
        }

        $capacityOfHalls = array();
        foreach (array_unique($fillteredHalls) as $hall) {
            array_push($capacityOfHalls, [$hall => array()]);
        }
        $available = array_fill_keys(array_unique($fillteredHalls), []);

        foreach (array_unique($fillteredHalls) as $hallId) {
            for ($i = 0; $i < sizeof($capacityOfHalls); $i++) {
                if ($hallId == key($capacityOfHalls[$i])) {
                    array_push($capacityOfHalls[$i][$hallId], (\App\Hall::find($hallId))['capacity']);
                }
            }
        }
        $availableApp = $appoint->availableApp($sport, $date);
        return view('availableAppointments', compact('availableApp'), compact('capacityOfHalls'))->with('sportDate', $sportDate);

    }
    // izvlacenje svih zauzetih termina iz baze i primjenjivanje funkcije availableTermins da bi se dobili obrnuti termini,
    // tj svi oni termini koji su slobodni, po svakoj sali(hall).
    public function availableApp($sport, $date)
    {

       $fillteredCourts = \App\Court::get()->where('kind', $sport)->toArray();
       $tempCourts = array();
       $fillteredHalls = array();
       foreach ($fillteredCourts as $fillteredCourt) {
           array_push($tempCourts, $fillteredCourt['id']);
           array_push($fillteredHalls, $fillteredCourt['hall_id']);
       }

       $allAppointments = array();
       foreach ($tempCourts as $courtId) {
           $app = \App\Appointment::get()->where('court_id', $courtId)->where('date', $date)->sortBy('begining')->toArray();
           $allAppointments = array_merge($allAppointments, $app);
       }
       $appoint = new AppointmentsController();

       foreach ($allAppointments as $appointment) {
           array_push($fillteredHalls, $appointment['hall_id']);
       }

       $arrayOfHallsAndTheirAppointments = array();
       $capacityOfHalls = array();
       foreach (array_unique($fillteredHalls) as $hall) {

           array_push($capacityOfHalls, [$hall => array()]);
       }
       $available = array_fill_keys(array_unique($fillteredHalls), []);

       foreach (array_unique($fillteredHalls) as $hallId) {
           for ($i = 0; $i < sizeof($capacityOfHalls); $i++) {
               if ($hallId == key($capacityOfHalls[$i])) {
                   array_push($capacityOfHalls[$i][$hallId], (\App\Hall::find($hallId))['capacity']);
               }
           }
       }
       foreach ($allAppointments as $oneApp) {
           foreach ($available as $key => $value) {
               if ($oneApp['hall_id'] == $key) {

                   array_push($available[$key], $appoint->appointmentInterval($date . " " . $oneApp['begining'], $date . " " . $oneApp['end']));
               }
           }
       }
       $availableAppoint = $appoint->availableTermins($available, array_unique($fillteredHalls), $date);
       return $availableAppoint;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = auth()->user()->id;
        $appointmentForTrash =  \App\Appointment::find($request->id)->delete();
        return response()->json(['status' => "Deleted!"]);
    }
    // prilikom rezervacije termina je potrebno provjeriti da korisnik ne pokusava rezervisati termin koji se preklapa
    // sa vec postojecim terminom ili koji je van radnog vremena sportskog centra.
    public function overlap($hall, $begining, $end, $unavailableApp)
    {
        $leng = count($unavailableApp[$hall]);
        $startTime = Carbon::create($unavailableApp[$hall][0][0]);
        $closingTime = Carbon::create($unavailableApp[$hall][$leng-1][1]);

        foreach($unavailableApp[$hall] as $interval)
        {
            $beginingOfAppointment = Carbon::create($interval[0]);
            $endOfAppointment = Carbon::create($interval[1]);
            if($begining->between($beginingOfAppointment, $endOfAppointment) && $end->between($beginingOfAppointment, $endOfAppointment))
            {
                return true;
            }

        }
        return false;
    }

    public function store(Request $request)
    {
        $success = "";

        $id = auth()->user()->id;
        $chosenHall = $request->hall;
        $sport = explode('|', $request->date)[0];
        $date = explode('|', $request->date)[1];
        $court = \App\Court::get()->where('hall_id', $chosenHall)->where('kind', $sport)->first()->id;

        $beginingOfAppointment = Carbon::create($date." ".$request->begining);
        $endOfAppointment = Carbon::create($date." ".$request->end);

        $durationMin = $beginingOfAppointment->diffInMinutes($endOfAppointment);

        $appoint = new AppointmentsController();
        $unavailableApp = $appoint->availableApp($sport, $date);

        if($request->begining > $request->end){
            $success = "Početak termina ne može biti poslije kraja termina. Izaberite ponovo!";

        }
        elseif(!$appoint->overlap($chosenHall, $beginingOfAppointment, $endOfAppointment, $unavailableApp))
        {
            $success = "Pokušavate rezervisati termin koji se preklapa sa već postojećim terminom ili ste unijeli termin koji ne pripada radnom vremenu sportskog centra. Pogledajte prikazane slobodne termine za salu koju ste odabrali.";
        }
        elseif($durationMin < 30)
        {
            $success = "Rezervacija ne može biti kraća od 30 min.";
        }
    else{
            $newApp = new \App\Appointment;
            $newApp->hall_id = $chosenHall;
            $newApp->court_id = $court;
            $newApp->user_id = $id;
            $newApp->date = $date;
            $newApp->begining = $beginingOfAppointment;
            $newApp->end = $endOfAppointment;
            $newApp->save();

            $success = "Uspjesno ste rezervisali termin.";
         }
         return response()->json(['success'=>$success]);
}
public function showUserAppointments()
{
    $id = auth()->user()->id;
    $appointmentsOfId = \App\Appointment::get()->where('user_id', $id);
    return view('user-appointments', compact('appointmentsOfId'));
}

// prilikom editovanja termina potrebno je provjeriti da se novi termin ne preklapa sa nekim vec postojecim ili
// da se nije pokusao rezervisati novi termin koji nije u okviru radnog vremena sportskog centra.
// Razlika u odnosu na funkciju overlap: kada korisnik pokusava da edituje odredjeni termin, potrebno je i taj termin
// posmatrati kao slobodan i ukljuciti ga medju ostale slobodne termine, jer korisnik moze da npr samo skrati svoj postojeci termin,
// produzi ga ili unesi potpuno isti termin kao sto je bio i prije editovanja.
public function editAvailable($sport, $date, $oldBegining)
{
    $appoint = new AppointmentsController();

    $fillteredCourts = \App\Court::get()->where('kind', $sport)->toArray();
    $tempCourts = array();
    $fillteredHalls = array();
    foreach ($fillteredCourts as $fillteredCourt) {
        array_push($tempCourts, $fillteredCourt['id']);
        array_push($fillteredHalls, $fillteredCourt['hall_id']);
    }

    $allAppointments = array();
    foreach ($tempCourts as $courtId) {
        $app = \App\Appointment::get()->where('court_id', $courtId)->where('date', $date)->sortBy('begining')->toArray();
        $allAppointments = array_merge($allAppointments, $app);
    }
    foreach ($allAppointments as $appointment) {
     array_push($fillteredHalls, $appointment['hall_id']);
 }
 $available = array_fill_keys(array_unique($fillteredHalls), []);

 foreach ($allAppointments as $oneApp) {
     foreach ($available as $key => $value) {
         if ($oneApp['hall_id'] == $key) {
             $oneAppBeg = Carbon::create($date . " " . $oneApp['begining']);
             $oneAppEnd = Carbon::create($date . " " . $oneApp['end']);
             if(!$oldBegining->equalTo($oneAppBeg))
             {
             array_push($available[$key], $appoint->appointmentInterval($date . " " . $oneApp['begining'], $date . " " . $oneApp['end']));
             }
         }
     }
 }

 $availableAppoint = $appoint->availableTermins($available, array_unique($fillteredHalls), $date);
 return $availableAppoint;

}

public function update(Request $request)
{
    $appointment = \App\Appointment::find($request->input('hiddenid'));

    $court = \App\Court::find($appointment->court_id);

    $date = $appointment->date;

    $hall = $appointment->hall_id;

    $appoint = new AppointmentsController();
    $beginingOfAppointment = Carbon::create($date." ".$request->input('editbeg'));
    $endOfAppointment = Carbon::create($date." ".$request->input('editend'));

    $oldBegining = Carbon::create($date." ".$request->input('hiddenbeg'));
    $oldEnd = Carbon::create($date." ".$request->input('hiddenend'));

    $durationMin = $beginingOfAppointment->diffInMinutes($endOfAppointment);

    $availableAppoint = $appoint->editAvailable($court->kind, $date, $oldBegining);

        if($request->input('editbeg') > $request->input('editend')){
            $success = "Početak termina ne može biti poslije kraja termina. Izaberite ponovo!";

        }
        elseif(!$appoint->overlap($hall, $beginingOfAppointment, $endOfAppointment, $availableAppoint))
        {
            $success = "Pokušavate rezervisati termin koji se preklapa sa već postojećim terminom ili ste unijeli termin koji ne pripada radnom vremenu sportskog centra.
            Pokušajte jedan od ovih slobodnih termina: ";
            foreach ($availableAppoint[$hall] as $interval) {
                $success = $success.explode(" ",$interval[0])[1]."-".explode(" ",$interval[1])[1]."    ";
            }
        }
        elseif($durationMin < 30)
        {
            $success = "Rezervacija ne može biti kraća od 30 min.";
        }
    else{
            $appointment->begining = $request->input('editbeg');
            $appointment->end = $request->input('editend');

            $appointment->save();
            $success = "Uspješno ste izvršili izmjenu termina.";
         }

       return response()->json(['success'=>$success]);
}
}
