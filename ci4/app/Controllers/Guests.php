<?php

namespace App\Controllers;

use App\Models\GuestModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Guests extends BaseController
{
    public function index()
    {
        $model = model(GuestModel::class);

        $data['guest'] = $model->getGuest();
        $data = [
            'guest'  => $model->getGuest(),
            'title' => 'Guest List',
        ];

        return view('templates/guestheader', $data)
            . view('guests/index')
            . view('templates/guestfooter');		


    }

    public function show($email = null)
    {
        $model = model(GuestModel::class);

        $data['guest'] = $model->getGuest($email);

        if (empty($data['guest'])) {
            throw new PageNotFoundException('Cannot find the guest item: ' . $email);
        }

        $data['title'] = $data['guest']['title'];

        return view('templates/guestheader', $data)
            . view('guest/view')
            . view('templates/guestfooter');
    }		


}