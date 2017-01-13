<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Livre;
use App\Author;
class LivreController extends Controller
{
    public function index()
    {
      $livres = Livre::all();
      return view('livre', ['livres' => $livres]);
    }
    public function getOne($id)
    {
      $livre = Livre::find($id);
      return view('livre', ['livre' => $livre,]);
    }

    public function newLivreForm()
  	{
      $authors = Author::all();
            $authorsArray = Array();
            $authorsId = Array();

            foreach ($authors as $author) {
              $authorsId[] = $author->id;
              $authorsArray[$author->id]= $author->name;
            }
      return view('newLivre', ['authors' => $authorsArray, 'authorsId' => $authorsId]);
           }

          public function insertOne(Request $request)
          {
            $livre = new Livre;
            $livre->name = $request->name;
            $livre->save();

            foreach ($request->authors as $key => $value) {
              $existingAuthor = Author::find($value);
              $livre->authors()->attach($existingAuthor->id);
            }

            return redirect('/livres');
          }
          public function deleteOne(Request $request, $id)
          {
            Livre::destroy($id);
            return redirect('/livres');
          }
          public function updateOne(Request $request)
          {
            $livre = Livre::find($request->id);
            $livre->name = $request->name;
            $livre->save();

            if(is_array($request->authors))
            {
              $livre->authors()->sync($request->authors);
            } else {
              $livre->authors()->detach();
            }
                    return redirect ('/livres');
          }

          public function livreUpdate($id)
          {
            $livre = Livre::find($id);
            $authors = Author::all();
            $authorsArray = Array();
            $authorsId = Array();

            foreach ($authors as $author) {
              $authorsId[] = $author->id;
              $authorsArray[$author->id]= $author->name;
            }
            return view('newLivre', ['updatedLivre' => $livre, 'authors' => $authorsArray, 'authorsId' => $authorsId]);
           }
}
