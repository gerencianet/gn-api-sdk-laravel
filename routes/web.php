<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Examples dos Endpoints Cobranças ("resource/views/examples/charge")
Route::get('/payChargeBillet',             function () {return view("examples/charge/billet");});
Route::get('/cancelCharge',                function () {return view("examples/charge/cancel");});
Route::get('/payChargeCard',               function () {return view("examples/charge/card");});
Route::get('/createCharge',                function () {return view("examples/charge/create");});
Route::get('/createChargeBalanceSheet',    function () {return view("examples/charge/createChargeBalanceSheet");});
Route::get('/createChargeHistory',         function () {return view("examples/charge/createChargeHistory");});
Route::get('/detailCharge',                function () {return view("examples/charge/detail");});
Route::get('/linkCharge',                  function () {return view("examples/charge/link");});
Route::get('/oneStepBillet',               function () {return view("examples/charge/oneStepBillet");});
Route::get('/oneStepBilletMarketplace',    function () {return view("examples/charge/oneStepBilletMarketplace");});
Route::get('/oneStepCard',                 function () {return view("examples/charge/oneStepCard");});
Route::get('/oneStepBilletCardMarketplace',function () {return view("examples/charge/oneStepBilletCardMarketplace");});
Route::get('/resendChargeBillet',          function () {return view("examples/charge/resendBillet");});
Route::get('/settleCharge',                function () {return view("examples/charge/settleCharge");});
Route::get('/shipping',                    function () {return view("examples/charge/shipping");});
Route::get('/updateBillet',                function () {return view("examples/charge/updateBillet");});
Route::get('/updateChargeLink',            function () {return view("examples/charge/updateLink");});
Route::get('/updateChargeMetadata',        function () {return view("examples/charge/updateMetadata");});

//Examples dos Endpoints Carnês ("resource/views/examples/carnet")
Route::get('/cancelCarnet',                function () {return view("examples/carnet/cancelCarnet");});
Route::get('/cancelParcel',                function () {return view("examples/carnet/cancelParcel");});
Route::get('/createCarnet',                function () {return view("examples/carnet/create");});
Route::get('/createCarnetHistory',         function () {return view("examples/carnet/createCarnetHistory");});
Route::get('/detailCarnet',                function () {return view("examples/carnet/detail");});
Route::get('/resendCarnet',                function () {return view("examples/carnet/resendCarnet");});
Route::get('/resendParcel',                function () {return view("examples/carnet/resendParcel");});
Route::get('/settleCarnetParcel',          function () {return view("examples/carnet/settleCarnetParcel");});
Route::get('/updateCarnetMetadata',        function () {return view("examples/carnet/updateMetadata");});
Route::get('/updateParcel',                function () {return view("examples/carnet/updateParcel");});

//Examples dos Endpoints Outros ("resource/views/examples/extra")
//Examples dos Endpoints Outros ("resource/views/examples/notification")
Route::get('/getInstallments',             function () {return view("examples/extra/getInstallments");});
Route::get('/getNotification',             function () {return view("examples/notification/detail");});

//Examples dos Endpoints Assinatura ("resource/views/examples/subscriptions")
Route::get('/cancelSubscription',          function () {return view("examples/subscription/cancelSubscription");});
Route::get('/createPlan',                  function () {return view("examples/subscription/createPlan");});
Route::get('/createSubscription',          function () {return view("examples/subscription/createSubscription");});
Route::get('/createSubscriptionHistory',   function () {return view("examples/subscription/createSubscriptionHistory");});
Route::get('/deletePlan',                  function () {return view("examples/subscription/deletePlan");});
Route::get('/detailSubscription',          function () {return view("examples/subscription/detailSubscription");});
Route::get('/getPlans',                    function () {return view("examples/subscription/listPlans");});
Route::get('/paySubscription',             function () {return view("examples/subscription/paySubscription");});
Route::get('/updatePlan',                  function () {return view("examples/subscription/updatePlan");});
Route::get('/updateSubscriptionMetadata',  function () {return view("examples/subscription/updateSubscriptionMetadata");});

//Examples dos Endpoints Pix ("resource/views/examples/pix")
Route::get('/authorize',                   function () {return view("examples/pix/oauth/generateAuth");});
//Endpoints de Cobranças ("resource/views/examples/pix/charge")
Route::get('/pixCreateImmediateCharge',    function () {return view("examples/pix/charge/create");});
Route::get('/pixListCharges',              function () {return view("examples/pix/charge/list");});
Route::get('/pixDetailCharge',             function () {return view("examples/pix/charge/detail");});
Route::get('/pixUpdateCharge',             function () {return view("examples/pix/charge/update");});
//Endpoints da Conta ("resource/views/examples/pix/Account")
Route::get('/pixListBalance',              function () {return view("examples/pix/account/balance");});
Route::get('/pixListSettings',             function () {return view("examples/pix/account/listSettings");});
Route::get('/pixUpdateSettings',           function () {return view("examples/pix/account/updateSettings");});
//Endpoints das chaves ("resource/views/examples/pix/key")
Route::get('/pixCreateEvp',                function () {return view("examples/pix/key/create");});
Route::get('/pixDeleteEvp',                function () {return view("examples/pix/key/delete");});
Route::get('/pixListEvp',                  function () {return view("examples/pix/key/list");});
//Endpoints Location ("resource/views/examples/pix/location")
Route::get('/pixLocationCreate',           function () {return view("examples/pix/location/create");});
Route::get('/pixLocationDeleteTxid',       function () {return view("examples/pix/location/deleteTxid");});
Route::get('/pixLocationGet',              function () {return view("examples/pix/location/getLoc");});
Route::get('/pixLocationList',             function () {return view("examples/pix/location/list");});
//Endpoints dos dados do Pix ("resource/views/examples/pix/pix")
Route::get('/pixDevolution',               function () {return view("examples/pix/pix/createDevolution");});
Route::get('/pixDevolutionGet',            function () {return view("examples/pix/pix/devolutionList");});
Route::get('/pixSendList',                 function () {return view("examples/pix/pix/pixList");});
Route::get('/pixReceivedList',             function () {return view("examples/pix/pix/pixListReceived");});
Route::get('/pixSend',                     function () {return view("examples/pix/pix/pixSend");});
//Endpoints do WebHook ("resource/views/examples/pix/webhooks")
Route::get('/pixConfigWebhook',            function () {return view("examples/pix/webhooks/update");});
Route::get('/pixGetWebhook',               function () {return view("examples/pix/webhooks/detail");});
Route::get('/pixListWebhook',              function () {return view("examples/pix/webhooks/list");});
Route::get('/pixDeleteWebhook',            function () {return view("examples/pix/webhooks/delete");});
