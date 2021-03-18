<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyApiController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// POST /api/companies

// GET /api/companies
/*
 * Implement the pagination into the response
 * If a client user access this api,they should only get their associated company only,
 * but for admin it should return all the companies.
 */



// GET /api/companies/{company}/clients
// Admin only && implement pagination

// POST /api/companies/{company}
Route::group(['middleware' => 'auth:api'], function() {
    Route::prefix('/companies')->group(function () {
        Route::get('/company', [CompanyApiController::class, 'index']);
        Route::get('/company/{company}', [CompanyApiController::class, 'show']);
        Route::post('/company', [CompanyApiController::class, 'store']);
        Route::put('/company/{company}', [CompanyApiController::class, 'update']);
        Route::delete('/company/{company}', [CompanyApiController::class, 'delete']);

        Route::get('/company/{company}/clients', [CompanyApiController::class, 'clients']);
        // Route::get('/{company}/clients', [CompanyApiController::class, 'clients']);
        // Incase of more admin api routes..
       /* Route::middleware([IsAdmin::class])->group(function () {
            Route::get('/{company}/clients', [CompanyApiController::class, 'clients']);
        });*/
    });
});



/*
curl -X GET http://doorhub.test/api/companies/company/company1/clients \
-H "Accept: application/json" \
-H "Authorization: Bearer THN7FPugH66L4qQr6kKLHTgJwyyFhmEsomMqbJIiNiKfSq4jd2RJJIhDyUVw" \
-H "Content-Type: application/json"
*/


Route::post('register', [RegisterController::class, 'register']);
/*
 *
curl -X POST http://doorhub.test/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"firstName": "John", "lastName": "Larsen", "username": "Larstheman", "email": "aazz@doe.com", "password": "password", "password_confirmation": "password"}'
 *
 */

Route::post('login', [LoginController::class, 'login']);
/*
curl -X POST http://doorhub.test/api/login \
-H "Accept: application/json" \
-H "Content-type: application/json" \
-d "{\"email\": \"doorhub@io.com\", \"password\": \"password\" }"
*/



Route::post('logout', [LoginController::class, 'logout']);
