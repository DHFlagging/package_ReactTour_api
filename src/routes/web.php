<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use dhflagging\ReactTour\Models\trainingstep;
use dhflagging\AzureAuth\Http\Middleware\AzureAuth;
use dhflagging\ReactTour\Models\userfinishedtraining;

Route::prefix('api/reacttour')->group(function () {
    Route::get('trainingsteps',function (Request $request) {
        $trainingsteps = trainingstep::all();
        return response()->json(["message"=>"Training Steps","trainingsteps" => $trainingsteps]);
    });
    Route::post('trainingsteps',function (Request $request){
        $request->validate(['name' => 'string|required|unique:trainingsteps|max:255','importance' => 'required|integer|max:2147483647']);
        trainingstep::updateOrCreate(['name' => $request->input('name')],['importance' => $request->input('importance')]);
        return response()->json(["message"=>"Added Training Steps"]);
    });
    Route::get('usercompletedtrainingsteps',function (Request $request) {
        $userprofile = new AzureAuth;
        $trainingsteps = userfinishedtraining::with('trainingstep')->where('user_id', $userprofile->Get_User_Oid($request))->get();
        return response()->json(["message"=>"User Completed These Training Steps","usercompletedtrainingsteps" => $trainingsteps]);
    });
    Route::post('usercompletedtrainingsteps',function (Request $request) {
        $userprofile = new AzureAuth;
        userfinishedtraining::updateOrCreate(['user_id' => $userprofile->Get_User_Oid($request),'training_id' => trainingstep::where('name',$request->input('name'))->firstOrFail()->id]);
        return response()->json(["message"=>"User Training Step Complete"]);
    });
    Route::get('userpreferences', function () {
        $id = new AzureAuth;
        $user_pref = user_preference::where('oid',$id->Get_User_Oid(request()))->get();
        return response()->json(['message' => 'current user preferences', 'userpreferences' => $user_pref]);
    });
    Route::post('userpreferences', function () {
        request()->validate(['preference' => 'required|string|max:255','value' => 'required|string|max:255']);
        $id = new AzureAuth;
        $user_pref = new user_preference;
        $user_pref->preference = request()->input('preference');
        $user_pref->oid = $id->Get_User_Oid(request());
        $user_pref->value = request()->input('value');
        $user_pref->save();
        return response()->json(['message' => 'current user preferences', 'userpreferences' => $user_pref]);
    });
    Route::put('userpreferences/{user_preference}', function (App\Models\user_preference $user_preference) {
        request()->validate(['value' => 'required|string|max:255']);
        $user_preference->value = request()->input('value');
        return response()->json(['message' => 'current user preferences', 'userpreferences' => $user_preference]);
    });
});