<?php

/**
* PHP library for Google Measurement Protocol
* 
* License GPLv3
* Author: Ricky Laishram
* Website: rickylaishram.com
*/

class MPPHP {
	private $id;
	private $url;
	private $cb;
	private $adid;

	function __construct($cache, $adword){
		$ini_array = parse_ini_file("config.ini");
		$this->id = $ini_array["id"];
		$this->url = $ini_array["url"];
		
		if($cache) {
			$this->cb = true;
		} else {
			$this->cb = false;
		}

		if($adword) {
			$this->adid = $ini_array["adid"];
		} else {
			$this->adid = false;
		}
	}

	/* Handles function calls */
	public function __call($method, $arguments) {
		if($method == "page") {
			if(count($arguments) == 4) {
				call_user_func_array(array($this, 'pageWithoutOptions'), $arguments);
			} elseif (count($arguments) == 5) {
				call_user_func_array(array($this, 'pageWithOptions'), $arguments);
			}
		} elseif ($method == "event") {
			if(count($arguments) == 5) {
				call_user_func_array(array($this, 'eventWithoutOptions'), $arguments);
			} elseif (count($arguments) == 6) {
				call_user_func_array(array($this, 'eventWithOptions'), $arguments);
			}
		} elseif ($method == "ecom_tran") {
			if(count($arguments) == 7) {
				call_user_func_array(array($this, 'ecommtWithoutOptions'), $arguments);
			} elseif (count($arguments) == 8) {
				call_user_func_array(array($this, 'ecommtWithOptions'), $arguments);
			}
		} elseif ($method == "ecom_item") {
			if(count($arguments) == 8) {
				call_user_func_array(array($this, 'ecommiWithoutOptions'), $arguments);
			} elseif (count($arguments) == 9) {
				call_user_func_array(array($this, 'ecommiWithOptions'), $arguments);
			}
		} elseif ($method == "social") {
			if(count($arguments) == 4) {
				call_user_func_array(array($this, 'socialWithoutOptions'), $arguments);
			} elseif (count($arguments) == 5) {
				call_user_func_array(array($this, 'socialWithOptions'), $arguments);
			}
		} elseif ($method == "exception") {
			if(count($arguments) == 3) {
				call_user_func_array(array($this, 'exceptionWithoutOptions'), $arguments);
			} elseif (count($arguments) == 4) {
				call_user_func_array(array($this, 'exceptionWithOptions'), $arguments);
			}
		}  elseif ($method == "timing") {
			if(count($arguments) == 5) {
				call_user_func_array(array($this, 'timingWithoutOptions'), $arguments);
			} elseif (count($arguments) == 6) {
				call_user_func_array(array($this, 'timingWithOptions'), $arguments);
			}
		}
	}

	/* Send data */
	private function send($fields) {

		$fields_string;
		foreach ($fields as $key => $value) {
			$fields_string .= $key.'='.$value.'&';
		}
		
		if($this->adid) {
			$fields_string .= 'gclid='.$this->adid.'&';
		}

		if($cache) {
			$fields_string .= 'z='.rand().'&';
		}

		rtrim($fields_string);

		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL, $this->url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);
	}

	/* Page Tracking */
	public function pageWithoutOptions($cid, $dh, $dp, $dt) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "pageview",
					'dh'	=> $dh,
					'dp'	=> $dp,
					'dt'	=> $dt
				);
		$this->send($fields);
	}

	public function pageWithOptions($cid, $dh, $dp, $dt, $options) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "pageview",
					'dh'	=> $dh,
					'dp'	=> $dp,
					'dt'	=> $dt
				);
		foreach ($options as $key => $value) {
			$fields['key'] = $value;
		}

		$this->send($fields);
	}

	/* Event Tracking */
	public function eventWithoutOptions($cid, $ec, $ea, $el, $ev) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "event",
					'ec'	=> $ec,
					'ea'	=> $ea,
					'el'	=> $el,
					'ev'	=> $ev
				);
		$this->send($fields);
	}

	public function eventWithOptions($cid, $ec, $ea, $el, $ev, $options) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "event",
					'ec'	=> $ec,
					'ea'	=> $ea,
					'el'	=> $el,
					'ev'	=> $ev
				);
		foreach ($options as $key => $value) {
			$fields['key'] = $value;
		}

		$this->send($fields);
	}

	/* Ecommerce transaction Tracking */
	public function ecommtWithoutOptions($cid, $ti, $ta, $tr, $ts, $tt, $cu) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "transaction",
					'ti'	=> $ti,
					'ta'	=> $ta,
					'tr'	=> $tr,
					'ts'	=> $ts,
					'tt'	=> $tt,
					'cu'	=> $cu
				);
		$this->send($fields);
	}

	public function ecommtWithOptions($cid, $ti, $ta, $tr, $ts, $tt, $cu, $options) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "transaction",
					'ti'	=> $ti,
					'ta'	=> $ta,
					'tr'	=> $tr,
					'ts'	=> $ts,
					'tt'	=> $tt,
					'cu'	=> $cu
				);
		foreach ($options as $key => $value) {
			$fields['key'] = $value;
		}

		$this->send($fields);
	}

	/* Ecommerce item Tracking */
	public function ecommiWithoutOptions($cid, $ti, $in, $ip, $iq, $ic, $iv, $cu) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "item",
					'ti'	=> $ti,
					'in'	=> $in,
					'ip'	=> $ip,
					'iq'	=> $iq,
					'ic'	=> $iv,
					'iv'	=> $iv,
					'cu'	=> $cu
				);
		$this->send($fields);
	}

	public function ecommiWithOptions($cid, $ti, $in, $ip, $iq, $ic, $iv, $cu, $options) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "item",
					'ti'	=> $ti,
					'in'	=> $in,
					'ip'	=> $ip,
					'iq'	=> $iq,
					'ic'	=> $iv,
					'iv'	=> $iv,
					'cu'	=> $cu
				);
		foreach ($options as $key => $value) {
			$fields['key'] = $value;
		}

		$this->send($fields);
	}

	/* Social Tracking */
	public function socialWithoutOptions($cid, $sa, $sn, $st) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "social",
					'sa'	=> $sa,
					'sn'	=> $sn,
					'st'	=> $st
				);
		$this->send($fields);
	}

	public function socialWithOptions($cid, $sa, $sn, $st, $options) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "social",
					'sa'	=> $sa,
					'sn'	=> $sn,
					'st'	=> $st
				);
		foreach ($options as $key => $value) {
			$fields['key'] = $value;
		}

		$this->send($fields);
	}

	/* Exception Tracking */
	public function exceptionWithoutOptions($cid, $exd, $exf) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "exception",
					'exd'	=> $exd,
					'exf'	=> $exf
				);
		$this->send($fields);
	}

	public function exceptionWithOptions($cid, $exd, $exf, $options) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "exception",
					'exd'	=> $exd,
					'exf'	=> $exf
				);
		foreach ($options as $key => $value) {
			$fields['key'] = $value;
		}

		$this->send($fields);
	}

	/* Timing Tracking */
	public function timingWithoutOptions($cid, $utc, $utv, $utt, $utl) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "timing",
					'utc'	=> $utc,
					'utv'	=> $utv,
					'utt'	=> $utt,
					'utl'	=> $utl,
				);
		$this->send($fields);
	}

	public function timingWithOptions($cid, $utc, $utv, $utt, $utl, $options) {
		$fields = array(
					'v' 	=> 1,
					'tid'	=> $this->id,
					'cid'	=> $cid,
					't'		=> "timing",
					'utc'	=> $utc,
					'utv'	=> $utv,
					'utt'	=> $utt,
					'utl'	=> $utl
				);
		foreach ($options as $key => $value) {
			$fields['key'] = $value;
		}

		$this->send($fields);
	}
}
?>