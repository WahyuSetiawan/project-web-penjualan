<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raja_ongkir extends CI_Controller {

	function get_kota($province){		

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 68581a285abb094d9176a1b2afa2d979"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
			$data = json_decode($response, true);
			echo "<option value='' selected=''>Pilih Nama Kota</option>"; 
			for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
				echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."' data-kota='".$data['rajaongkir']['results'][$j]['city_name']."'>".$data['rajaongkir']['results'][$j]['city_name']."</option>"; 
			}
		}
	}

	function get_pengiriman(){	

		$destination = $this->input->post('destination');
		$berat	 = $this->input->post('berat');
		$courier = $this->input->post('courier');

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=419&destination=$destination&weight=200&courier=$courier",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 68581a285abb094d9176a1b2afa2d979"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
				  //echo $response;
			$data = json_decode($response, true);
		}

		// var_dump($data);die(); 


		for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
			// var_dump($data['rajaongkir']['results'][$k]['costs']);die();
			if ($data['rajaongkir']['results'][$k]['costs']==null) {
				echo "<option value='' selected disabled>Expedisi ini Tidak Tersedia. Ganti expedisi Yang lain.</option>"; 
			}else{
				echo "<option value='' selected disabled>Pilih Service pengiriman</option>"; 
				for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {

					?>
					<option value="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?>" ongkir="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];?>"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?> - <?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></option>
					<?php 
				}
			}
		}
	}
}

/* End of file Raja_ongkir.php */
/* Location: ./application/controllers/Raja_ongkir.php */