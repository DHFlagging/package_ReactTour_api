<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use jbirch8865\ReactTour\Models\trainingstep;
use jbirch8865\AzureAuth\Http\Middleware\AzureAuth;
use jbirch8865\ReactTour\Models\userfinishedtraining;

Route::prefix('api/reacttour')->group(function () {
    Route::get('trainingsteps',function (Request $request) {
        $trainingsteps = trainingstep::all();
        return response()->json(["message"=>"Training Steps","trainingsteps" => $trainingsteps]);
    });
    Route::post('trainingsteps',function (Request $request){
        $request->validate(['name' => 'string|required|unique:trainingsteps|max:255']);
        trainingstep::updateOrCreate(['name' => $request->input('name')]);
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
});