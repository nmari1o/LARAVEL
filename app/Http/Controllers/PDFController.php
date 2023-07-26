<?php

  

namespace App\Http\Controllers;

  

use PDF;

use Mail;

use App\Models\Student;  

class PDFController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

     public function index()
     {
         $smjer = Student::join('smjers', 'students.student_smjer', '=', 'smjers.id')
    ->select('students.ime', 'students.prezime', 'smjers.smjer')
    ->get();
     
         $pdf = PDF::loadView('pdf.studentsdetails', ['smjer' => $smjer])
             ->setPaper('a4', 'portrait');
     
         Mail::send('message', [], function ($message) use ($pdf) {
             $message->to('mario@gmail.com')
                 ->subject('From FIDIT')
                 ->attachData($pdf->output(), 'StudentDetails.pdf');
         });
     
         dd('Mail sent successfully');
     }

}


