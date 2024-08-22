<?php

namespace ProductFeederSystem;

class RequestHandler
{
    public function getFormatName(): ?string
    {
        return filter_input(INPUT_GET, 'format', FILTER_SANITIZE_STRING);
    }
}