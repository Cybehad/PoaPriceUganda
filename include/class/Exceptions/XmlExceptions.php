<?php


namespace Exceptions;


class XmlExceptions extends \Exception
{
    public function __construct( LibXmlError $error )
    {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, line {$error->line}, col {$error->col}] ➥ {$error->message}";
        $this->error = $error;
        parent::__construct( $msg, $error->code );
    }
    public function getLibXmlError() {
        return $this->error;
    }
}