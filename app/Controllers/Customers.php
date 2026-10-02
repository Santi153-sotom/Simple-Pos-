<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index(): string
    {
        return view('customers/index', [
            'title' => 'Customer Accounts',
            'customers' => (new CustomerModel())->orderBy('full_name')->findAll(),
        ]);
    }

    public function new()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email' => 'required|valid_email|max_length[150]|is_unique[customers.email]',
            'phone' => 'permit_empty|max_length[20]',
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            (new CustomerModel())->insert([
                'full_name' => trim((string) $this->request->getPost('full_name')),
                'email' => strtolower(trim((string) $this->request->getPost('email'))),
                'phone' => trim((string) $this->request->getPost('phone')),
            ]);

            return redirect()->to(site_url('customers'))->with('success', 'Customer added successfully.');
        }

        return view('customers/form', [
            'title' => 'New Customer',
            'customer' => null,
            'validation' => $this->validator,
        ]);
    }

    public function edit(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email' => "required|valid_email|max_length[150]|is_unique[customers.email,customer_id,{$id}]",
            'phone' => 'permit_empty|max_length[20]',
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $model->update($id, [
                'full_name' => trim((string) $this->request->getPost('full_name')),
                'email' => strtolower(trim((string) $this->request->getPost('email'))),
                'phone' => trim((string) $this->request->getPost('phone')),
            ]);

            return redirect()->to(site_url('customers'))->with('success', 'Customer updated successfully.');
        }

        return view('customers/form', [
            'title' => 'Edit Customer',
            'customer' => $customer,
            'validation' => $this->validator,
        ]);
    }
}
