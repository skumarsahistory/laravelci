<?php
/**
 * This sniff prohibits the use of Perl style hash comments.
 *
 * PHP version 5
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   Your Name <you@domain.net>
 * @license  https://github.com/licence.txt BSD Licence
 * @link     http://pear.php.net/package/PHP_CodeSniffer
 */
namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all()->toArray();
        return view('forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request The current file being checked.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateFields = array(
            'coinname' => 'required',
            'coinprice'=> 'required|numeric');
        $this->validate($request, $validateFields);
        $form= new Form();
        $form->coinname=$request->get('coinname');
        $form->coinprice=$request->get('coinprice');
        $checkbox = implode(",", $request->get('option'));
        $form->dropdown=$request->get('dropdown');
        $form->radio=$request->get('radio');
        $form->checkbox = $checkbox; 
        $form->save();
        return redirect('forms')->with('success', 'Coin has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id The current file being checked.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id The current file being checked.
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::find($id);
        return view('forms.edit', compact('form', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request The current file being checked.
     * @param int                      $id      The current file being checked.
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $form = Form::find($id);
        $form->coinname=$request->get('coinname');
        $form->coinprice=$request->get('coinprice');
        $checkbox = implode(",", $request->get('option'));
        $form->dropdown=$request->get('dropdown');
        $form->radio=$request->get('radio');
        $form->checkbox = $checkbox; 
        $form->save();
        return redirect('forms');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id The current file being checked.
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect('forms')->with('success', 'Coin has been  deleted');
    }
}
