<?php 
namespace Radish\Rsa\Larave;

/**
 * @author Radish
 */

class RsaTool
{
    use Radish\Rsa\Larave\Traits\DataFormat;
    use Radish\Rsa\Larave\Traits\KeyTool;

    const PADDING = OPENSSL_PKCS1_PADDING;
    public static $key_type_array = ['file', 'string'];
    public static $rsa_type_array = ['data', 'sign'];
    public static $padding_array = [OPENSSL_PKCS1_PADDING, OPENSSL_SSLV23_PADDING, OPENSSL_PKCS1_OAEP_PADDING, OPENSSL_NO_PADDING];
    protected $type;
    protected $rsa_type;
    protected $except_key;
    private $_privateKey;
    private $_publicKey;

    public function __construct()
    {
        $config = config('rsa');
        $this->type =  in_array($config['key_type'], self::$key_type_array) ? $config['key_type'] : 'string';
        $this->rsa_type = in_array($config['rsa_type'], self::$rsa_type_array) ? $config['rsa_type'] : 'data';
        $this->except_key = $config['except_key'];
        $this->_privateKey = $config[$this->rsa_type]['private_key'];
        $this->_publicKey = $config[$this->rsa_type]['public_key'];
    }

    public static function __callStatic($name, $arguments)
    {
        if (method_exists(self, $name)) {
            $rsaTool = new self;
            $this->_initKey();
            return $rsaTool->$name();
        }

        self::errorException();
    }

    public static function errorException($msg = 'not find method!')
    {
        throw new \Exception($msg);
    }

    public function encryption($data)
    {
        $ciphertext = false;
        $data = $this->_formatEncryption($data);
        if (openssl_public_encrypt($data, $result, $this->_publicKey, self::PADDING))) {
            $ciphertext = $this->_encode($result, 'base64');
        }

        return $ciphertext;
    }

    public function decrypt(string $ciphertext)
    {
        $plaintext = false;
        $ciphertext = $this->_decode($ciphertext, 'base64');
        if (openssl_private_decrypt($ciphertext, $result, $this->_privateKey, self::PADDING)) {
            $plaintext = $this->_formatDecrypt($result);
        }

        return $plaintext;
    }

    public function sign(string $data)
    {
        $sign = false;
        if (openssl_sign($data, $resule, $this->_privateKey)) {
            $sign = $this->_encode($resule, 'base64');
        }

        return $sign;
    }

    public function verify(string $data, $sign)
    {
        $bool = false;
        $sign = $this->_decode($sign, 'base64');
        if (openssl_verify($data, $sign, $this->_publicKey)) {
            $bool = true;
        }

        return $bool;
    }

}