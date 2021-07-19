<?php

namespace Data\Photo\PHPThumb;

interface PluginInterface
{
    /**
     * @param  Data\Photo\PHPThumb $phpthumb
     * @return PHPThumb
     */
    public function execute($phpthumb);
}
