<?php
    class Nonprofit {
        private int $id;
        private String $name;
        private String $type;
        private String $description;
        private String $address;
        private String $city;
        private String $state;
        private String $country;
        private String $email;
        private String $phone;
        private String $website;
        private String $logo_url;

        public function __construct ($id, String $name, String $type, String $description, String $address,
            String $city, String $state, String $email, String $phone, String $website, String $logo_url) {
                //echo 'passed in ' . $logo_url;
                $this->id = $id;
                $this->name = $name;
                $this->type = $type;                 
                $this->description = $description;
                $this->address = $address;
                $this->city = $city; 
                $this->state = $state;
                $this->email = $email;
                $this->phone = $phone;
                $this->website = $website;
                $this->logo_url = $logo_url;
                $this->country = 'United States';
        } // close constructor 

        public function get_id () { return $this->id; }
        public function get_name () { return $this->name; }
        public function get_type () { return $this->type; }
        public function get_description () { return $this->description; }
        public function get_address () { return $this->address; }
        public function get_city () { return $this->city; }
        public function get_state () { return $this->state; }
        public function get_country () { return $this->country; }
        public function get_email () { return $this->email; }
        public function get_phone () { return $this->phone; }
        public function get_website () { return $this->website; }
        public function get_logo_url () { return $this->logo_url; }

        public function set_id (int $id) { $this->id = $id; }
        public function set_name (String $name) { $this->name = $name; }
        public function set_type (String $type) { $this->type = $type; }
        public function set_description (String $description) { $this->description = $description; }
        public function set_address (String $address) { $this->address = $address; }
        public function set_city (String $city) { $this->city = $city; }
        public function set_state (String $address) { return $this->state = $address; }
        public function set_country (String $country) { $this->country = $country; }
        public function set_email (String $email) { $this->email = $email; }
        public function set_phone (String $phone) { $this->phone = $phone; }
        public function set_website (String $website) { $this->website = $website; }
        public function set_logo_url (String $logo_url) { $this->logo_url = $logo_url; }

        public function print_address () { return $this->address . ' ' . $this->city. ' ' . $this->state; }
        public function clickable_logo () { return '<a href="' . $this->website . '"><img src="' . $this->logo_url . '" width="500" height=="600"></a>';}

        public function __toString() {
            $string = 'id:' . $this->id . ' name:' . $this->name . ' type:' . $this->type . ' description:' . $this->description
                . ' address:' . $this->address . ' city:' . $this->city. ' state:' . $this->state . ' country:' . $this->country . ' email:' . $this->email
                . ' phone:' . $this->phone . ' website:' . $this->website . ' logo url:' . $this->logo_url;
            return $string; 
        } // close toString
    } // end class NonProfit
?>