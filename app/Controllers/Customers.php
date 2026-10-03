<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $customers = $customerModel->orderBy('id', 'ASC')->findAll();

        return view('customers', ['customers' => $customers]);
    }

    public function newForm()
    {
        return view('customer_form', ['title' => 'New Customer', 'customer' => null]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'    => 'required|valid_email|max_length[100]',
            'phone'    => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new CustomerModel())->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')) ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer account created successfully.');
    }

    public function edit(int $id)
    {
        $customer = (new CustomerModel())->find($id);
        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
        }

        return view('customer_form', ['title' => 'Edit Customer', 'customer' => $customer]);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();
        if (! $model->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'    => 'required|valid_email|max_length[100]',
            'phone'    => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')) ?: null,
        ]);

        return redirect()->to('/customers')->with('success', 'Customer account updated successfully.');
    }
}
