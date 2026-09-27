<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $customers     = $customerModel->findAll();

        return view('customers', ['title' => 'Customer Accounts', 'customers' => $customers]);
    }

    public function new()
    {
        return view('customer_form', [
            'title'    => 'Add New Customer',
            'customer' => null,
            'action'   => site_url('customers/new'),
        ]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return view('customer_form', [
                'title'    => 'Add New Customer',
                'customer' => $this->request->getPost(),
                'action'   => site_url('customers/new'),
                'errors'   => $this->validator->getErrors(),
            ]);
        }

        $customerModel = new CustomerModel();
        $customerModel->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))->with('message', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $customer      = $customerModel->find($id);

        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('customer_form', [
            'title'    => 'Edit Customer',
            'customer' => $customer,
            'action'   => site_url('customers/edit/' . $id),
        ]);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return view('customer_form', [
                'title'    => 'Edit Customer',
                'customer' => array_merge(['id' => $id], $this->request->getPost()),
                'action'   => site_url('customers/edit/' . $id),
                'errors'   => $this->validator->getErrors(),
            ]);
        }

        $customerModel = new CustomerModel();
        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to(site_url('customers'))->with('message', 'Customer updated successfully.');
    }
}