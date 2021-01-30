<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$json_data = $this->cURLRequest('https://jsonplaceholder.typicode.com/posts');
		$array_data = json_decode($json_data,true);
		$data['Data'] = $array_data;
		$this->load->view('welcome_message',$data);
	}

	public function cURLRequest($request_url, $methodPOST = false)
	{
		if($methodPOST)
		{
			$url_string = explode('?', $request_url);
			$request_url = $url_string[0];
			$params = $url_string[1];

			$ch = curl_init($request_url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch, CURLOPT_TIMEOUT, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    // to stop verifying the SSL Certificate
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Content-Length: '.strlen($params)));
            $response = curl_exec($ch);
            curl_close($ch);
        }
        else
        {
        	$ch = curl_init();
        	curl_setopt($ch, CURLOPT_URL, $request_url);
        	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    // to stop verifying the SSL Certificate
            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }
        return $response;
    }
}
