<?php

namespace App\Controllers;

use App\Models\TodoModel;

class Home extends BaseController
{
    private TodoModel $todoModel;

    public function __construct()
    {
        $this->todoModel = new TodoModel();
    }

    public function index()
    {
        return view('welcome_message', ['todo' => $this->todoModel->findAll()]);
    }

    public function toggleSelesai($id)
    {
        $todo = $this->todoModel->find($id);

        if ($todo['selesai']) {
            $todo['selesai'] = 0;
        } else {
            $todo['selesai'] = 1;
        };

        $this->todoModel->update($id, $todo);
    }

    public function bikinTodo()
    {
        $deskripsi = $this->request->getPost('deskripsi');

        if ($deskripsi == '' || $deskripsi == null) {
            $this->response->setStatusCode(400);
            $this->response->send();

            return redirect()->back();
        }

        $this->todoModel->insert([
            'deskripsi' => $deskripsi
        ]);

        return redirect()->back();
    }

    public function hapusTodo($id)
    {
        $this->todoModel->delete($id);
    }
}
