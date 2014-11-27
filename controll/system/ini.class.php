<?php
class Ini {
    protected $data = array(),
              $filepath,
              $file;
    
    public function __construct( $filepath) {
        $this->filepath = $filepath;
        $this->file = fopen( $filepath, "r+");
        $this->read();
    }
    
    public function __get( $name ) {
        if(array_key_exists($name, $this->data))
            return $this->data[$name];
        
        return 0;
    }
    
    public function __set( $name, $value ) {
        return $this->data[$name] = $value;
    }
    
    public function read() {
        $data = fread( $this->file, 2048 );
        if( $lines = explode("\n", $data) ) {
            foreach( $lines as $line ) {
                if( strlen( $line ) >= 3) {
                    if( $child = explode("=", $line) ) {
                        if( sizeof( $child ) == 2 && !empty($child[0]) && !empty($child[1])) {
                            $this->data[$child[0]] = $child[1];
                        }
                    }
                }
            }
        }
    }
    
    public function close() {
        $insertString = "";
        
        fclose( $this->file );
        $this->file = fopen( $this->filepath, "w+");
        $lastKey = key(array_slice($this->data, sizeof( $this->data)-1));
        
        foreach( $this->data as $k => $v ) {
            $insertString .= "{$k}={$v}";
            if($k != $lastKey)
                $insertString .= "\n";
        }
        
        fwrite($this->file, $insertString, strlen( $insertString ));
        fclose( $this->file );
    }
}
?>