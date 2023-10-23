<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            // User is not logged in, redirect to login page
            return redirect()->to('/auth/login');
        } else {
            // check url
            $uri = service('uri');
            $path = $uri->getSegment(1);
            if ($path == 'admin') {
                if (session()->get('role') != '1') {
                    return redirect()->to('/user');
                }
            } else {
                if (session()->get('role') != '2') {
                    return redirect()->to('/admin');
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
