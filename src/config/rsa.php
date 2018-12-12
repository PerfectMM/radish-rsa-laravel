<?php 

return [
    'key_type' => 'string', //'string'字符串类型  'file'文件类型

    'string' => [
        'private_key' => "-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDIGmoSltM1tuBmP+7T4rWd39Q2Ncsy5m3mt74LohX/wFCtA8FI
gA6aSBhXX1F/6LmqWWfN2bbXqElLuCSZdqGaMrAMjg8OddLzQ4xDq6Xme1OxF0xS
q4EGkTVQp0pQKE54zk4AQBORQp2R9mbrGi2ZrXuTs3s9HLBYAkCWuLKC/QIDAQAB
AoGBAMWoUd7K3RbR7hcST/c8mem4jwZ9XJqKw0SDe1ZCZTib3xUIAIR8+e+sB19G
6FpQqBV8+ux7ggDEWqJQ4tY0OKs3CwfJe9hNxH7OnDml2Ay0e9tn/hfCecLxdrVS
9vPmVKzs86CRZfBgPOh68BwJaZtXAeO5TKAiryRqj5yYwfiBAkEA+JXQwXbSko/A
RGeWqcl8fvYUEv/q87GRgrLv0Lsr/8jk9p4mZYdKEbUKZARPYh3CV2UXcBil8WLh
M214nT/newJBAM4SZHcpoHPqcQ33+Q1u4SQxg1Af3MUHPfcfpYN/S8cMZeZ9jywk
weo+a0IO/3Y8fh6sFQWRDvJMC0UQlw0G+ecCQQC4v4dlsWywdlvbuu0zhMadCUBE
GqVAtlDBxUEMbX8229SnIUTCIjk/TcDKMpXZAusDzuMLcZYq/2UFtq90lyDvAkAJ
lk94P8aIPgr+dF/w4Qy2a1tJmgHiZMDcQ2um34A+BXSkMYk8q4UeCcNhsmLuNEhF
0wmzVZlVanZHw0rTv1RXAkBJbm4waSOqYmlzkbqvO6XMjuUuDVJSZzXXwcXQgf1t
6rusf8UkrbQ5erW/AMaNxHk+ZeCQiZGaA8dHFTwzg2pd
-----END RSA PRIVATE KEY-----",
        'public_key' => "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIGmoSltM1tuBmP+7T4rWd39Q2
Ncsy5m3mt74LohX/wFCtA8FIgA6aSBhXX1F/6LmqWWfN2bbXqElLuCSZdqGaMrAM
jg8OddLzQ4xDq6Xme1OxF0xSq4EGkTVQp0pQKE54zk4AQBORQp2R9mbrGi2ZrXuT
s3s9HLBYAkCWuLKC/QIDAQAB
-----END PUBLIC KEY-----"
    ],

    'file' => [
        'private_key' => storage_path('key/private.pem'),
        'public_key' => storage_path('key/public.pem')
    ],

    'rsa_type' => 'data', //'data'数据加密 'sign'生成签名字段

    'except_key' => [], //不参与验签的字段
];