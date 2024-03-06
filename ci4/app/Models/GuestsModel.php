<?php

namespace App\Controllers;

use App\Models\GuestsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Guests extends BaseController
{
    public function index()
    {
        $model = model(GuestsModel::class);

        
        $data = [
            'guests'  => $model->getGuests(),
            'title' => 'Guest List',
        ];

        return view('templates/guestheader', $data)
            . view('guests/index')
            . view('templates/guestfooter');		


    }

    public function show($email = null)
    {
        $model = model(GuestsModel::class);

        $data['guests'] = $model->getGuests($email);

        if (empty($data['guests'])) {
            throw new PageNotFoundException('Cannot find the guest item: ' . $email);
        }

        $data['title'] = $data['guests']['name'];

        return view('templates/guestheader', $data)
            . view('guests/view')
            . view('templates/guestfooter');
    }

public function guest()
    {
        helper('form');

        return view('templates/guestheader', ['title' => 'Create a guest item'])
            . view('guests/create')
            . view('templates/guestfooter');
    }

    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['name', 'email', 'website', 'comment', 'gender']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'name' => 'required|max_length[255]|min_length[3]',
            'email'  => 'required|max_length[255]|min_length[5]',
            'website'  => 'required|max_length[500]|min_length[10]',
            'comment'  => 'required|max_length[5500]|min_length[10]',
            'gender'  => 'required|in_list[male,female,other]',

        ])) {
            // The validation fails, so returns the form.
            return $this->guest();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(GuestsModel::class);

        $model->save([
            'name' => $post['name'],
            'email'  => url_title($post['name'], '-', true),
            'website'  => $post['website'],
            'comment'  => $post['comment'],
            'gender'  => $post['gender'],


        ]);

        return view('templates/guestheader', ['title' => 'Create a guest item'])
            . view('guests/success')
            . view('templates/guestfooter');
    }    




}