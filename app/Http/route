/*..*/

use App\Note;

Route::get('/', function (){
	return view ('welcome');
});

Route::get('notes', function (){
	$notes = Note::all();

	return view('notes', compact('notes'));

});