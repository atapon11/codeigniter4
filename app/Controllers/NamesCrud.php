<?php namespace App\Controllers;
use App\Models\NameModel;
use CodeIgniter\Controller;

class NamesCrud extends Controller {
       //Show name list
    public function index() {
        $NameModel = new NameModel();
        $data['users'] = $NameModel->orderBy('id', 'ASC')->findAll();
        return view('namelist', $data);
    }

    //add name form
    public function create(){
        return view('addname');
    }

    public function store(){
        $NameModel = new NameModel();
        $data = [
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'email' => $this->request->getVar('email'),
            'time' => $this->request->getVar('time'),
            'in' => $this->request->getVar('in'),
            'out' => $this->request->getVar('out')
        ];
        $NameModel->insert($data);
        return $this->response->redirect(site_url('/namelist'));
    }

    //show single name
    public function singleUser($id = null) {
        $NameModel = new NameModel();
        $data['user_obj'] = $NameModel->where('id', $id)->first();
        return view('/editnames', $data);
    }
    
    // update name data
    public function update(){
        $NameModel = new NameModel();
        $id = $this->request->getVar('id');
        $data = [
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'email' => $this->request->getVar('email'),
            'time' => $this->request->getVar('time'),
            'in' => $this->request->getVar('in'),
            'out' => $this->request->getVar('out')
        ];
        $NameModel->update($id, $data);
        return $this->response->redirect(site_url('/namelist')); 
    }

    //delete name
    public function delete($id = null) {
        $NameModel = new NameModel();
        $data['user'] = $NameModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/namelist'));
    }
}