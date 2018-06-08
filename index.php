<?php

require_once __DIR__ . '/bootstrap.php';

$validatorFactory = new ValidatorFactory;

$validator = $validatorFactory->make($_POST, [
    'name'     => 'required|string|max:255',
    'email'    => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:6|confirmed',
]);

if ($validator->fails()) {
    $errors = $validator->errors();
    $errorName = $errors->first('name');
    $errorAll = $errors->all();
}

print '<pre>';print_r($errorName);print '</pre>';
print '<pre>';print_r($errorAll);print '</pre>';
