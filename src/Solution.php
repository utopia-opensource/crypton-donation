<?php
    namespace App;

    class Solution {
        protected $util = null;
        protected $db = null;

        public function __construct() {
            $this->loadENV();
            $this->db = new DataBase();
            $this->util = new \Crypton\Utility();
        }

        public function loadENV() {
			$dotenv = \Dotenv\Dotenv::create(__DIR__ . "/../");
			$dotenv->load();
		}

        public function addressEncode($cryptonAddress = ''): string {
            return $this->util->ShortenAddress($cryptonAddress);
        }

        public function addressDecode($cryptonAddress = ''): string {
            return $this->util->UnShortenAddress($cryptonAddress);
        }

        public static function dataFilter($string = ""): string {
			$string = strip_tags($string);
			$string = stripslashes($string);
			$string = htmlspecialchars($string);
			$string = trim($string);
			return $string;
        }
        
        public static function verifyHEXstr($hex = '', $str_len = 64): bool {
			if(strlen($hex) != $str_len || !ctype_xdigit($hex)) {
				return false;
			} else {
				return true;
			}
		}

        public function parseLink(): string {
            $emptyErr = "empty address given";
            if(!isset($_GET['address'])) {
                return $emptyErr;
            }
            $address = self::dataFilter($_GET['address']);
            if($address == '') {
                return $emptyErr;
            }
            $addressResult = $this->addressEncode($addressResult);
            if(! self::verifyHEXstr($address)) {
                return "invalid address given";
            }
            // check alias
            if(isset($_GET['alias'])) {
                $alias = self::dataFilter($_GET['alias']);
                if($alias == "") {
                    return "empty or invalid alias given";
                }
                // check alias length
                if(strlen($alias) < 3) {
                    return "alias minimum length is 3 characters";
                }
                // check alias used
                $sqlQuery = "SELECT addr FROM addresses WHERE alias='" . $address . "' LIMIT 1";
                if($this->db->checkRowExists($sqlQuery)) {
                    return "this Alias has already been used";
                }
                // save addr & alias
                if(! $this->db->tryQuery("INSERT IGNORE INTO addresses SET alias='$alias',addr='$address'")) {
                    return "failed to save address in db :(";
                }
                $addressResult = $alias;
            }
            return 'https://crypton.life/CRP/' . $addressResult;
        }

        public function parseDataForQR(): string {
            if(!isset($_GET['address'])) {
                return 'address is empty';
            }
            $addressShort = self::dataFilter($_GET['address']);
            if(strlen($addressShort) == 44) {
                // shortened address given
                return $this->addressDecode($addressShort);
            }
            // find alias for address
            $sqlQuery = "SELECT addr FROM addresses WHERE alias='" . $address . "' LIMIT 1";
            $result = $this->db->query2arr($sqlQuery);
            if($result == []) {
                // alias not found
                return 'address not found';
            }
            return $result['addr'];
        }
    }
