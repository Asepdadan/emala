<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimAkunPimpinan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama_lengkap,$email,$alamat,$data)
    {
        //
        
        $this->nama_lengkap = $nama_lengkap;
        $this->email = $email;
        $this->alamat = $alamat;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.mail.template.template_1')->with([
         "nama_lengkap" => $this->nama_lengkap,
         "email" => $this->email,
         "alamat" => $this->alamat,
         "data" => $this->data
       ]);
    }
}
