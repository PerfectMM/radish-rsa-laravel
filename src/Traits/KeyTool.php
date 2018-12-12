<?php

namespace Radish\Rsa\Larave\Traits;

/**
 * @author Radish
 */

trait KeyTool
{
    private function _initKey()
    {
        $this->_setPrivateKey();
        $this->_setPublicKey();
    }

    private function _setPrivateKey()
    {
        if ($this->type == 'file') {
            $keyContent = $this->_readFile($this->_privateKey);
        } else {
            $keyContent = $this->_privateKey;
        }
        
        $this->_privateKey = openssl_get_privatekey($keyContent);
    }

    private function _setPublicKey()
    {
        if ($this->type == 'file') {
            $keyContent = $this->_readFile($this->_publicKey);
        } else {
            $keyContent = $this->_publicKey;
        }
        
        $this->_publicKey = openssl_get_publickey($keyContent);
    }

    private function _readFile($path)
    {
        $content = false;
        if (file_exists($path)) {
            $content = file_get_contents($path);
        }

        return $content;
    }
}