<?php

namespace Writer;

class XmlWriter extends ProductWriter
{
    protected $xml;
    protected $file;

    public function write()
    {
        $str = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $str .= "<products>\n";
        foreach ($this->products as $shopProduct) {
            $str .= "\t<product title=\"{$shopProduct->getTitle()}\">\n";
            $str .= "\t\t<summary>\n";
            $str .= "\t\t{$shopProduct->getSummaryLine()}\n";
            $str .= "\t\t</summary>\n";
            $str .= "\t</product>\n";
        }
        $str .= "</products>\n";
        $this->xml = $str;
        print $this->xml;
    }

    public function XmlSave($file=''){
        if (!file_exists($file)) return false;
        if (!is_writable($file)) return false;
        $this->file = $file;
        $this->write();
        file_put_contents( $this->file, $this->xml->asXML() );
    }
}