<?php
/**
 * Note that the salt here is randomly generated.
 * Never use a static salt or one that is not randomly generated.
 *
 * For the VAST majority of use-cases, let password_hash generate the salt randomly for you
 */
$options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$password_hashed = password_hash("yanjie", PASSWORD_BCRYPT, $options);
echo $password_hashed;
?>