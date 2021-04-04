<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contactform;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactformMail;

class ContactformDoneController extends Controller
{
    public function done(Request $request) {
       
        $param = [
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'gender_id' => $request->gender_id,
            'kind' => $request->kind,
            'text' => $request->text,
            // 'created_at' => date("Y-m-d H:i:s"),
            // 'updated_at' => date("Y-m-d H:i:s"),
        ];

        // DB::insert('insert into contactforms 
        //             (name, tel, email, gender, kind, text, created_at, updated_at)
        //             values (:name, :tel, :email, :gender, :kind, :text, :created_at, :updated_at)', $param);

        // DB::table('contactforms')->insert($param);

        $contactform = new Contactform;
        $form = $request->all();
        unset($form['_token']);
        $contactform->fill($form)->save();


        $admin = config('mail.admin');
        Mail::to($admin)->send(new ContactformMail($form));

        $email = $request->email; //または$form['email']
        Mail::to($email)->send(new ContactformMail($form));

        return view('contactform.done');
    }
}
