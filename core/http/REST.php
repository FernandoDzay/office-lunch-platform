<?php

    namespace App\core\http;
    use App\core\Config;

    class REST {

        private $handle;
        private $base_url;

        public function __construct() {
            $this->handle = curl_init();
            $this->base_url = $this->getBaseUrl();

            curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
        }


        public function get($rel_url, $params = []) {
            $url = $this->base_url . $rel_url;

            if(!empty($params)) {
                $url .= "?".http_build_query($params);
            }

            // Set the url
            curl_setopt($this->handle, CURLOPT_URL, $url);

            // set get method
            curl_setopt($this->handle, CURLOPT_HTTPGET, true);

            // Execute the session and store the contents in $result
            $result = curl_exec($this->handle);

            // Closing the session
            curl_close($this->handle);

            return $result;
        }

        public function post($rel_url, $params = []) {
            $url = $this->base_url . $rel_url;
            
            curl_setopt($this->handle, CURLOPT_URL, $url);

            curl_setopt($this->handle, CURLOPT_POST, true);

            curl_setopt($this->handle, CURLOPT_POSTFIELDS, $params);

            $result = curl_exec($this->handle);

            curl_close($this->handle);

            return $result;
        }

        public function put($rel_url, $params = []) {
            $url = $this->base_url . $rel_url;

            if(!empty($params)) {
                $url .= "?".http_build_query($params);
            }


            curl_setopt($this->handle, CURLOPT_URL, $url);

            curl_setopt($this->handle, CURLOPT_PUT, true);

            $result = curl_exec($this->handle);

            curl_close($this->handle);

            return $result;

        }

        public function delete($rel_url, $params = []) {
            $url = $this->base_url . $rel_url;

            if(!empty($params)) {
                $url .= "?".http_build_query($params);
            }

            curl_setopt($this->handle, CURLOPT_URL, $url);

            curl_setopt($this->handle, CURLOPT_CUSTOMREQUEST, "DELETE");

            $result = curl_exec($this->handle);

            curl_close($this->handle);

            return $result;
        }


        //---------------- private

        public function getBaseUrl() {
            return Config::getBaseUrl();
        }


    }






?>