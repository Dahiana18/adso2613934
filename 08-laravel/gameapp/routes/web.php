<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;

Route::get('/', function () {
    $sliders = App\Models\Game::where('slider', 1)->get();
    // dd($sliders->toArray());
    return view('welcome')->with('sliders', $sliders);
});

Route::get('/myprofile', function(){
    return view('myprofile');
});

Route::get('/games/', function(){
    $games = App\Models\Game::all();
    return view('listgames')->with('games', $games);
});

Route::get('/dashboard', function(){
    $games = App\Models\Game::all();
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
/* Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */
    Route::resources([
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'games' => GameController::class
    ]);
});

Route::get('catalogue', function(){
    $categories = App\Models\Category::all(); 
    $games = App\Models\Game::all();  
    return view('catalogue')->with('categories' , $categories)->with('games', $games);
});

Route::get('catalogue/{id}', function(){
    $game =  App\Models\Game::find(request()->id);
    //dd($game->toArray());
    return view('view-game')->with('game', $game);
});


Route::get('catalogue/add{id}', function(){
    $game =  App\Models\Game::find(request()->id);
    dd($game->toArray());   
});


Route::post('gamesbycat', function(Request $request) {
    if ($request->fcat == 'All') {
        // All Categories
        $categories = App\Models\Category::all();
        $games      = App\Models\Game::all();
        return view('gamesbycat')->with('categories', $categories)->with('games', $games);
    } else {
        // By Category
        $idcat    = App\Models\Category::where('name', $request->fcat)->first();
        $category = App\Models\Category::where('id', $idcat->id)->first();
        $games    = App\Models\Game::where('category_id', $idcat->id)->get();
        return view('gamesbycat')->with('category', $category)->with('games', $games);
    }
});

Route::get('/games/list', function() {
    $games = App\Models\Game::all();
    dd($games->toArray());
});


Route::get('/game/show/{id}', function($id){
    $game = App\Models\Game::find($id);
    dd($game->toArray());
});

Route::get('/game/show/{id}', function(){
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});

Route::get('/viewusers', function(){
    $viewusers = App\Models\User::limit(20)->get();
    $code = "<table style='border-collapse: collapse;margin-inline: auto;font-family: Arial'>
                <tr>
                    <th style='background: gray; color: white; padding: 0.4rem'>Id</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Fullname</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Age</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Created At</th>
                </tr>";
    foreach ($viewusers as $user){
        $code .= "<tr>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->id."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->fullname."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".Carbon\Carbon::parse($user->birthdate)->age."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->created_at->diffForHumans()."</td>";
    }
    return $code . "</table>";
});

//Buscar
Route::post('users/search', [UserController::class, 'search']);
Route::post('categories/search', [CategoryController::class, 'search']);
Route::post('games/search', [GameController::class, 'search']);

//Exports
Route::get('export/users/pdf', [UserController::class, 'pdf']);
Route::get('export/users/excel', [UserController::class, 'excel']);
Route::get('export/games/pdf', [GameController::class, 'pdf']);
Route::get('export/games/excel', [GameController::class, 'excel']);

//import
Route::post('import/users', [UserController::class, 'import']);

require __DIR__.'/auth.php';