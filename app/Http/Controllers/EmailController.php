<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\sendEmail;
use App\Models\Passtoken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionDefaultParametersMatcher;

class EmailController extends Controller
{
    public function index()
    {
        return view('auth.email');
    }

    public function sendEmail(Request $request)
    {

        $email = $request->email;
        $token = Crypt::encryptString(rand(100000, 999999));

        if (User::where('email', $email)->doesntExist()) {
            Alert::error('Error!', 'Email tidak terdaftar');
            return redirect()->back();
        }

        Passtoken::updateOrCreate(
            ['email' => $email],
            ['token' => $token]
        );

        $data = Passtoken::where('email', $email)->first();
        $show_token = $data->token;

        $message = "
        <p>Ini adalah token ganti password anda</p>
        <h2><b>". (int)Crypt::decryptString($show_token) . "</b></h2>
        <p>note: jangan beritahu orang lain</p>
        ";

        $data_email = [
            'message' => $message
        ];

        Mail::to($email)->send(new sendEmail($data_email));

        Alert::success('Sukses!', 'Email telah dikirim ke ' . $email);
        return redirect()->to('/token-view/?email=' . Crypt::encryptString($email));

    }

    public function tokenView(Request $request)
    {
        if (!$request->input('email')) {
            abort(404);
        }

        try {
            if (User::where('email', Crypt::decryptString($request->input('email')))->doesntExist()) {
                abort(404);
            } else {
                return view('auth.token', ['email' => $request->input('email')]);
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function tokenValidate(Request $request)
    {

        $email = Crypt::decryptString($request->email);
        $token = (int)Crypt::decryptString(Passtoken::where('email', $email)->first()->token);
        
        // dd($email, $token, (int)$request->token_validate);

        if($token == (int)$request->token_validate){
            return view('auth.changepass', ['token' => Passtoken::where('email', $email)->first()->token]);
        } else{
            Alert::error('Error!', 'Token salah');
            return redirect()->back();
        }

    }
}
