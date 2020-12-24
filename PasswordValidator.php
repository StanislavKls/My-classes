<?php
namespace App;

class PasswordValidator
{
    private const OPTIONS = ['containNumbers' => null, 'minLength' => 8];
    private $password;
    private $options;
    public function __construct($options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }
    public function validate($pass)
    {
        $errors = [];
        if (strlen($pass) < $this->options['minLength']) {
            $errors['minLength'] = 'too small';
        }
        if ($this->options['containNumbers']) {
            if ($this->hasNumber($pass) === false) {
                $errors['containNumbers'] = 'should contain at least one number';
            }
        }
        return $errors;
    }
    private function hasNumber(string $subject): bool
    {
        return strpbrk($subject, '1234567890') !== false;
    }
}